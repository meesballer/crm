<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateEmployeeTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @test
     * @group employee
     */
    public function Can_Admin_Update_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->LoginAs(User::find(1))
                ->visit('/companies/1/edit')
                ->pause(1000)
                ->type('name', 'facebook')
                ->pause(1000)
                ->type('email', 'facebook@facebook.com')
                ->pause(1000)
                ->type('address', 'San Francisco')
                ->pause(1000)
                ->type('website', 'facebook.com')
                ->pause(1000)
                ->press('Submit')
                ->assertSee('Medewerker bewerkt.');
        });
    }

    public function Can_Company_Update_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->LoginAs(User::find(5))
                ->visit('/companies/1/edit')
                ->pause(1000)
                ->type('name', 'facebook')
                ->pause(1000)
                ->type('email', 'facebook@facebook.com')
                ->pause(1000)
                ->type('address', 'San Francisco')
                ->pause(1000)
                ->type('website', 'facebook.com')
                ->pause(1000)
                ->press('Submit')
                ->assertSee('Medewerker bewerkt.');
        });
    }

    public function Can_Employee_Update_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->LoginAs(User::find(6))
                ->visit('/companies/1/edit')
                ->pause(1000)
                ->type('name', 'facebook')
                ->pause(1000)
                ->type('email', 'facebook@facebook.com')
                ->pause(1000)
                ->type('address', 'San Francisco')
                ->pause(1000)
                ->type('website', 'facebook.com')
                ->pause(1000)
                ->press('Submit')
                ->assertSee('Medewerker bewerkt.');
        });
    }
}
