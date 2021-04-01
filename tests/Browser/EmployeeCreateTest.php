<?php

namespace Tests\Browser;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class EmployeeCreateTest extends DuskTestCase
{
    /**
     * @test
     * @group employee
     */
    public function Can_Admin_Create_Employee()
    {
        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(5))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Toevoegen')
                ->assertPathIs('/employees');
        });

    }

    /**
     * @test
     * @group employee
     */
    public function Can_Employee_Create_Employee()
    {

        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(6))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Toevoegen')
                ->assertPathIs('/employees');
        });

    }

    /**
     * @test
     * @group employee
     */
    public function Can_Company_Create_Employee()
    {
        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(5))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Toevoegen')
                ->assertPathIs('/employees');
        });
    }

}
