<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class UpdateCompanyTest extends DuskTestCase
{
    /**
     * @test
     * @group company
     */
    public function Can_Admin_UpdateCompany()
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
                    ->assertSee('Bedrijf bewerkt.');
        });
    }

    /**
     * @test
     * @group company
     */
    public function Can_Company_UpdateCompany()
    {

        $this->browse(function (Browser $browser) {
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
                ->press('Bewerken')
                ->assertPathis('/companies/1');
        });
    }

    /**
     * @test
     * @group companyupdate
     */
    public function Can_Employee_Update_Company()
    {

        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(6))
                ->visit('/companies/1/edit')
                ->pause(1000)
                ->assertSee('User does not have the right permissions.');
        });
    }
}
