<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateCompanyTest extends DuskTestCase
{
    /**
     * @test
     * @group company
     */
    public function UpdateCompany()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/companies/1/edit')
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
                    ->assertSee('Bedrijf bijgewerkt.');
        });
    }
}
