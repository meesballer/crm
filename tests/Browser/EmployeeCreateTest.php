<?php

namespace Tests\Browser;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class EmployeeCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group employee
     */
    public function Can_Admin_Create_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company =  factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($company) {
            $browser->LoginAs(User::find(5))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Submit')
                ->assertSee('Medewerker toegevoegd.');
        });

    }

    public function Can_Employee_Create_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company =  factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($company) {
            $browser->LoginAs(User::find(6))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Submit')
                ->assertSee('Medewerker toegevoegd.');
        });

    }

    public function Can_Company_Create_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company = factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($company) {
            $browser->LoginAs(User::find(1))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Submit')
                ->assertSee('Medewerker toegevoegd.');
        });
    }

        public function Can_EmployeeRole_Create_Employee()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company =  factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($company) {
            $browser->LoginAs(User::find(1))
                ->visit('/employees')
                ->pause(1000)
                ->click('@add-button')
                ->pause(1000)
                ->type('firstname', 'Casey')
                ->pause(1000)
                ->type('lastname', 'Neistat')
                ->pause(1000)
                ->type('email', 'google@google.com')
                ->pause(1000)
                ->type('phone', '0675382391')
                ->pause(1000)
                ->select('company_id', '1')
                ->pause(1000)
                ->screenshot('ingevuld')
                ->press('Submit')
                ->assertSee('Medewerker toegevoegd.');
        });
    }
}
