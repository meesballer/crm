<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateEmployeeTest extends DuskTestCase
{

    /**
     * @test
     * @group employee
     */
    public function Can_Admin_Update_Employee()
    {

        $this->browse(function (Browser $browser) {
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
                ->press('Bewerken')
                ->assertPathIs('companies/1/');

    });

    }

    public function Can_Company_Update_Employee()
    {

        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(5))
                ->visit('/companies/1/edit')
                ->pause(1000)
                ->assertSee('permission');
        });
    }

    public function Can_Employee_Update_Employee()
    {

        $this->browse(function (Browser $browser)  {
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
                ->press('Bewerken')
                ->assertPathIs('/companies/1');
        });
    }
}
