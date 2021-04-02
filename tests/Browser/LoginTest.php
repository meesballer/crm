<?php

namespace Tests\Browser;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * @test
     * @group authentication
     */
    public function Login()
    {
        $this->browse(function (Browser $browser)  {
            $browser->visit('/login')
                ->type('email', 'admin@admin.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }

}
