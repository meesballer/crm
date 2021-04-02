<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteCompanyTest extends DuskTestCase
{
    /**
     * @test
     * @group company
     */
    public function Can_Admin_Delete_Company()
    {
        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                ->visit('companies/1')
                ->press(Delete)
                ->assertSee('Bedrijf Verwijderd');
        });
    }

    /**
     * @test
     * @group company
     */
    public function Can_Employee_Delete_Company()
    {


        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(6))
                ->visit('companies/1')
                ->pause(1000)
                ->press(Delete)
                ->assertSee('User does not have the right permissions.');
        });
    }

    /**
     * @test
     * @group company
     */
    public function Can_Company_Delete_Company()
    {
        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(5))
                ->visit('companies/1')
                ->press(Delete)
                ->assertPathIs('/companies');
        });
    }
 }
