<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Company;

use App\User;

use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('companies.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('companies.create')->with('user_id', $user->id);
//        dd($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Store Company Form data
    public function store(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'website'=>'required',
            'user_id' => 'required'
        ]);

        //  Store data in database
        Company::create($request->all());

        //
        return back()->with('success', 'Bedrijf toegevoegd.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $company = Company::with('employees')->find($id)->get();
//        dd($company->employees);

//        return view('companies.show', compact('company'));
        $employees = Employee::where('company_id', '=', $id )->get();
        $company = Company::find($id);
        return view('companies.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $company = Company::find($id);

        $data = [
            'userid' => $user->id,
            'company' => $company,
        ];

        return view('companies.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->user_id = $request->user_id;

        $company->save();
        //
        return back()->with('success', 'Bedrijf bewerkt.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('companies')->with('success', 'Bedrijf verwijderd.');;
    }
}
