<?php

namespace Tests\Feature;

use App\Company;
use App\Employee;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;

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
    public function authenthicated_users_can_see_create_form()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/companies/create')
            ->assertOk();
    }

    /** @test */
    public function authenthicated_users_can_see_update_form()
    {
        $this->actingAs(factory(Company::class)->create());
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/companies/1/edit')
            ->assertOk();
    }

    /** @test */
    public function authenthicated_users_can_see_show()
    {
        $this->actingAs(factory(Company::class)->create());
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/companies/1')
            ->assertOk();
    }


    /** @test */
    public function company_can_be_added_through_create_form()
    {

        Event::fake();

        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/companies', $this->data());

        $this->assertCount(1, Company::all());

    }

    /** @test */
    public function company_can_be_updated_through_update_form()
    {

        Event::fake();

        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/companies/1/edit', $this->data());

        $this->assertCount(1, Company::all());

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

}
