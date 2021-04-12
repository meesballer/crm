<?php

namespace Tests\Browser;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SoftDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
         $this->browse(function (Browser $browser)  {
         $browser->LoginAs(User::find(1))
         ->visit('/companies')
         ->press('verwijderde')
         ->assertSee('Laravel');
        });

        $this->assertSoftDeleted('users', [
            'id' => $deletedCompany->id,
            'name' => $deletedCompany->name,
            'email' => $deletedCompany->email,
        ]);
    }
}
