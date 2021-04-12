<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
        $this->middleware('permission:company-show', ['only' => ['show']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(10);
        return view('companies.index', compact('company'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        $company = Company::onlyTrashed()->paginate(10);
//        dd($company);
        return view('companies.archive', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $user = Auth::user();
        $company = Company::find($id);
        $data = [
            'userid' => $user->id,
            'company' => $company,
        ];

        return view('companies.add')->with($data);
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
       $company = Company::create($request->all());
        //
        return redirect()->route('companies.show', $company->id)->with('success', 'Bedrijf toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $company = Company::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('companies.show', $company)->with('success', 'Bedrijf teruggezet.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', compact('company'));
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
        return redirect()->route('companies.show', [$company])->with('success', 'Bedrijf bewerkt.');

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       Company::withTrashed()
            ->where('id', $id)
            ->forcedelete();
        return redirect()->back()->with('success', 'Bedrijf verwijderd.');;
    }
}
