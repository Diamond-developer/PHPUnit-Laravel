<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        //1.visit the home page
        //$this ->visit('/');

        //2.Press a"Click Me" link
        //$this ->click('Click me');

        //3. See "You've been clicked, punk."
        //$this->see("You've been clicked, punk.");

        //4. Assert that the current is /feedback
        //$this->seePageIs('/feedback');
    }
}
