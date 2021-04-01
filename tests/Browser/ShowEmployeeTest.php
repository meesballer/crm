<?php

namespace Tests\Browser;


use App\Company;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ShowEmployeeTest extends DuskTestCase
{
    /**
     * @testph
     * @group employee
     */
    public function Can_admin_show_employee()
    {
        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                ->visit('/employees/1')
                ->pause(1000)
                ->assertSee('patron');
        });

    }

    public function Can_Company_show_employee()
    {

        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(5))
                ->visit('/employees/1')
                ->pause(1000)
                ->assertSee('patron');
        });

    }

    public function Can_Employee_show_employee()
    {

        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(6))
                ->visit('/employees/1')
                ->pause(1000)
                ->assertSee('patron');
        });

    }

}
