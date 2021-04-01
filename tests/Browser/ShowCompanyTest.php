<?php

namespace Tests\Browser;


use App\Company;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ShowCompanyTest extends DuskTestCase
{
    /**
     * @test
     * @group company
     */
    public function Can_Admin_Show_Company()
    {
        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                ->visit('/companies/1')
                ->pause(1000)
                ->assertSee('google');
        });

    }

    /**
     * @test
     * @group company
     */
    public function Can_Company_Show_Company()
    {

        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(5))
                ->visit('/companies/1')
                ->pause(1000)
                ->assertSee('google');
        });

    }

    /**
     * @test
     * @group company
     */
    public function Can_Employee_Show_Company()
    {

        $this->browse(function (Browser $browser)  {
            $browser->LoginAs(User::find(6))
                ->visit('/companies/1')
                ->pause(1000)
                ->assertSee('permission');
        });

    }

}
