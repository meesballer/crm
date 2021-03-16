<?php

namespace Tests\Feature;

use App\Employee;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function only_logged_in_users_can_see_company_list()
    {
        $response = $this->get('/companies')
            ->assertRedirect('/login');
    }
    /** @test */
    public function authenthicated_users_can_see_company_list()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/companies')
            ->assertOk();
    }


    /** @test */
    public function company_can_be_added_through_form()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/companies', $this->data());

        $this->assertCount(1, Employee::all());

    }

    private function data()
    {
        return [
            'name' => 'tescompany',
            'email' => 'company@company.com',
            'address' => 'boulevard 3',
            'website'=>'test.com',
            'user_id' => '1',
        ];
    }

    /** @test */
    public function a_name_is_required()
    {

    }
}
