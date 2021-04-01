<?php

namespace Tests\Browser;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RoleSeeder;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use Faker\Generator as Faker;
use Spatie\Permission\PermissionRegistrar;
use Laravel\Dusk\Browser;

class CompanyCreateTest extends DuskTestCase
{

    /**
     * @test
     * @group company
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
     * @group company
     */
        public function Can_Employee_Create_Company()
        {
            $this->browse(function (Browser $browser)  {
                $browser->LoginAs(User::find(6))
                    ->pause(1000)
                    ->visit('/companies')
                    ->pause(1000)
                    ->assertSee(403);
            });


        }

    /**
     * @test
     * @group company
     */
    public function Can_Company_Create_Company()
    {
        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(5))
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

