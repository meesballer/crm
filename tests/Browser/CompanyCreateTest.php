<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use Faker\Generator as Faker;

class CompanyCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group company
     */
    public function VisitIndex()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function ($browser) use ($user) {
          $browser->LoginAs(User::find(1))
              ->visit('/companies')
              ->pause(1000)
               ->click('@add-button')
              ->pause(1000)
              ->type('name', 'google')
              ->pause(1000)
              ->type('email', 'google@google.com')
              ->pause(1000)
              ->type('address', 'cupertino 1')
              ->pause(1000)
              ->type('website', 'google.com')
              ->pause(1000)
              ->press('Toevoegen')
              ->assertSee('Bedrijf toegevoegd.');
        });

    }

}
