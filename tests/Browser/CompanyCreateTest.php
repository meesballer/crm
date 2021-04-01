<?php

namespace Tests\Browser;

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use Faker\Generator as Faker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CompanyCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    /**
     * @test
     * @group companycreate
     */
    public function Can_Admin_Create_Company()
    {

        $this->app->make(PermissionRegistrar::class)->registerPermissions();

        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);
        $role = seed(Role::class)->create();
        $permission = factory(Permission::class)->create();

        $role->givePermissionTo($permission);
        $user->assignRole('Admin');

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

        public function Can_Employee_Create_Company()
        {
            $user = factory(User::class)->create([
                'email' => 'employee@employee.com',
            ]);

            $this->browse(function ($browser) use ($user) {
                $browser->LoginAs(User::find(6))
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

    public function Can_Company_Create_Company()
    {
        $user = factory(User::class)->create([
            'email' => 'company@company.com',
        ]);

        $this->browse(function ($browser) use ($user) {
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
                ->assertSee('Bedrijf toegevoegd.');
        });


    }
    }

