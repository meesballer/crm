<?php

namespace Tests\Browser;

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
    public function DeleteEmployee()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('employees/1')
                ->press(Delete)
                ->assertSee('Medewerker Verwijderd');
        });
    }
}
