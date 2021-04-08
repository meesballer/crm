<?php

namespace Tests\Browser;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CompanyCreateTest extends DuskTestCase
{


    use DatabaseMigrations;

    public function setUp() :void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /**
     * @test
     * @group companycreate
     */
    public function Can_Admin_Create_Company()
    {
        $this->browse(function (Browser $browser)  {
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
                ->pause(1000)
                ->assertPathIs('/companies');
            });
        }

    /**
     * @test
     * @group companycreate
     */
        public function Can_Employee_Create_Company()
        {
            $this->browse(function (Browser $browser)  {
                $browser->LoginAs(User::find(2))
                    ->pause(1000)
                    ->visit('/companies')
                    ->pause(1000)
                    ->assertSee('User does not have the right permissions.');
            });
        }

    /**
     * @test
     * @group companycreate
     */
    public function Can_Company_Create_Company()
    {
        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(4))
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
                ->assertPathIs('/companies');
        });
    }
}

