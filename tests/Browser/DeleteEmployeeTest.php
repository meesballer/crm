<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteEmployeeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function Can_Admin_Delete_Employee()
    {
        $$this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                ->visit('employees/1')
                ->pause(1000)
                ->press(Delete)
                ->pause(1000)
                ->assertSee('Medewerker .');
        });
    }

    public function Can_Employee_Delete_Employee()
    {
        $$this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(6))
                ->visit('employees/1')
                ->press(Delete)
                ->assertSee('Medewerker Verwijderd');
        });
    }

    public function Can_Company_Delete_Employee()
    {
        $$this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(5))
                ->visit('employees/1')
                ->press(Delete)
                ->assertSee('Medewerker Verwijderd');
        });
    }
}
