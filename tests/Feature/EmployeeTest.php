<?php

namespace Tests\Feature;

use App\Company;
use App\Employee;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function only_logged_in_users_can_see_employees_list()
    {
      $response = $this->get('/employees')
          ->assertRedirect('/login');
    }
    /** @test */
    public function authenthicated_users_can_see_employees_list()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/employees')
        ->assertOk();
    }

    /** @test */
    public function authenthicated_users_can_see_company_list()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/employees')
            ->assertOk();
    }

    /** @test */
    public function authenthicated_users_can_see_create_form()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/employees/create')
            ->assertOk();
    }

    /** @test */
    public function authenthicated_users_can_see_update_form()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/employees/1/update')
            ->assertOk();
    }

    /** @test */
    public function authenthicated_users_can_see_show()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/employees/1/show')
            ->assertOk();
    }


    /** @test */
    public function employee_can_be_added_through_form()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/employees', $this->data());

            $this->assertCount(1, Employee::all());

    }

    private function data()
    {
        return [
            'firstname' => 'Test',
            'lastname' => 'Employee',
            'email' => 'test@employee.com',
            'phone' => '0675382391',
            'company_id' => '1',
            'user_id' => '1',
            'role_id' => '1',
        ];
    }

//    /** @test */
//public function a_firstname_is_required()
//{
//
//}

}
