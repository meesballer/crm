<?php

namespace Tests\Browser;


use App\Company;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class ShowCompanyTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group company
     */
    public function Can_Admin_Show_Company()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company =  factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->LoginAs(User::find(1))
                ->visit('/companies/1')
                ->pause(1000)
                ->assertSee('xaris');
        });

    }

    public function Can_Company_Show_Company()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company =  factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->LoginAs(User::find(1))
                ->visit('/companies/1')
                ->pause(1000)
                ->assertSee('xaris');
        });

    }

    public function Can_Employee_Show_Company()
    {
        $user = factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]);

        $company =  factory(Company::class)->create([
            'name' => 'xaris',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->LoginAs(User::find(5))
                ->visit('/companies/1')
                ->pause(1000)
                ->assertSee('xaris');
        });

    }

}
