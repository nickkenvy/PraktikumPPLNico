<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser):void {
            $browser->visit(url:'/')
                    ->assertSee(text: 'Enterprise')
                    ->clickLink('Register')
                    ->assertPathIs(path: '/register')
                    ->type(field: 'name', value: 'admin@gmail.com')
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: 'password') 
                    ->type(field: 'Confirm Password', value: 'Confirm Password') 
                    ->press(button:'REGISTER')
                    ->assertPathIs(path: 'http://127.0.0.1:8000/dashboard');
        });
    }
}
