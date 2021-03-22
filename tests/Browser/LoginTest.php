<?php

namespace Tests\Browser;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
    @test
     */
    public function Login()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->screenshot('home-page')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

}
