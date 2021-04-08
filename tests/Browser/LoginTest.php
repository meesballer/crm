<?php

namespace Tests\Browser;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group authentication
     */
    public function Login_As_Admin()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function ($browser) use ($user)  {
            $browser->visit('/login')
                ->typeSlowly('email', $user->email)
                ->typeSlowly('password', 'password')
                ->press('Login')
                ->assertSee('You are logged in!');
        });
    }
}
