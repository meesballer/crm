<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteCompanyTest extends DuskTestCase
{

use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function CanAdminDeleteCompany()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->LoginAs(User::find(1))
                ->visit('companies/1')
                ->press(Delete)
                ->assertSee('Bedrijf Verwijderd');
        });
    }
 }
