<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrlShortnerTest extends TestCase
{
    public function testBasicTest()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST', '/api/urlshortner', ['link' => 'www.Sally.com']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function testBasicTest2()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST', '/api/urlshortner', ['link' => 'https://www.google.com.eg/?gfe_rd=cr&dcr=0&ei=GG7LWefeKIrA8gfmjLiYAg']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function testBasicTest3()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST', '/api/urlshortner', ['name' => 'Amr']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function testBasicTest4()
    {
        //$this->assertTrue(true);
        $response = $this->json('POST', '/api/urlshortner', []);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
