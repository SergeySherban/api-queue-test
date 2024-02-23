<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    /**
     * Test submission endpoint with valid data.
     *
     * @return void
     */
    public function testSubmissionWithValidData()
    {
        $data = [
            'name'    => 'John Doe',
            'email'   => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->json('POST', '/api/submit', $data);

        $response->assertStatus(200)
                 ->assertJson(
                     [
                         'message' => 'Submission successful',
                     ]
                 );
    }

    /**
     * Test submission endpoint with missing required fields.
     *
     * @return void
     */
    public function testSubmissionWithMissingFields()
    {
        $data = [
            // Missing 'name' field intentionally
            'email'   => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->json('POST', '/api/submit', $data);

        $response->assertStatus(422)
                 ->assertJson(
                     [
                         'error' => 'The name field is required.',
                     ]
                 );
    }
}
