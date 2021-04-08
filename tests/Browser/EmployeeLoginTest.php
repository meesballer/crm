<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EmployeeLoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group authentication
     */
    public function Login_As_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'employee@employee.com',
            'password' => 'employee',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->pause(1000)
                ->typeSlowly('email', $user->email)
                ->typeSlowly('password', 'employee')
                ->press('Login')
                ->assertSee('You are logged in!');
        });
    }
}
