<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
//
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        /*
         * browser testing: https://laravel.com/docs/7.x/dusk
        $this->visit('/');
        $this->click("Click me");
        $this->see("You've been clicked, punk.");
        $this->seePageIs("/feedback");
        */

        $response->assertStatus(200);

    }

    //epsi 14
    /**@Test*/
    function it_normalizes_a_string_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());


        $cache->has('cache-key')->shouldBeCalled();


        $directive->setUp('cache-key');

    }

    /**@Test*/
    function it_normalizes_a_cacheable_model_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());


        $cache->has('stub-cache-key')->shouldBeCalled();


        $directive->setUp(new ModelStub);

    }


    /**@Test*/
    function it_normalizes_an_array_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());


        $cache->has(md5('foobar'))->shouldBeCalled();


        $directive->setUp(['foo', 'bar']);
    }
}

class ModelStub
{
    public function getCacheKey()
    {
        return 'stub-cache-key';
    }
}

