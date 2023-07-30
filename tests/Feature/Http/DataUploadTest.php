<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class DataUploadTest extends TestCase
{
     /**
     * A basic feature test example.
     */
    public function testDataUploadCreateSuccess(): void
    {
        $response = $this->get(route('dataupload.create'));

        $response->assertStatus(200);
    }

    public function testDataUploadSuccess(): void
    {
        $postData = [
            'name' => fake()->jobTitle(),
            'phone' => '89994446633',
            'email' => 'fake@mail.com',
            'info' => fake()->text(100),
        ];

        $response = $this->post(route('dataupload.store'), $postData);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($postData);
    }

    public function testDatUploadError(): void
    {
        $postData = [
            'author' => fake() -> userName(),
        ];

        $response = $this->post(route('dataupload.store'), $postData);
        $response->assertStatus(Response::HTTP_FOUND);
    }
}
