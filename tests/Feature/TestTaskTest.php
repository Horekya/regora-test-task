<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestTaskTest extends TestCase
{


    public function test_post_1_day_response(): void
    {
        $response = $this->post('/',[
            'first_name'=>'test_name1',
            'last_name'=>'test_sorname1',
            'birthdate'=> date('Y-m-d',strtotime('-1 day')),
        ]);

        $response->assertStatus(200);
    }

    public function test_post_1_month_response(): void
    {
        $response = $this->post('/',[
            'first_name'=>'test_name2',
            'last_name'=>'test_sorname2',
            'birthdate'=> date('Y-m-d',strtotime('-1 month')),
        ]);

        $response->assertStatus(200);
    }

    public function test_post_1_year_response(): void
    {
        $response = $this->post('/',[
            'first_name'=>'test_name3',
            'last_name'=>'test_sorname3',
            'birthdate'=> date('Y-m-d',strtotime('-1 year')),
        ]);

        $response->assertStatus(200);
    }

    public function test_get_response(): void
    {
        $response = $this->get('/');
        echo $response->getContent();

        $response->assertStatus(200);
    }
}
