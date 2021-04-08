<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompanyLoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group authentication
     */
    public function Login_As_Company()
{
    $user = factory(User::class)->create([
        'email' => 'company@company.com',
        'password' => 'company',
    ]);

    $this->browse(function ($browser) use ($user) {
        $browser->visit('/login')
            ->pause(1000)
            ->typeSlowly('email', $user->email)
            ->typeSlowly('password', 'company')
            ->press('Login')
            ->assertSee('You are logged in!');
        });
    }
}
