<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function only_logged_in_users_can_see_employees_list()
    {
      $response = $this->get('/employees')
          ->assertRedirect('/login');
    }

}
