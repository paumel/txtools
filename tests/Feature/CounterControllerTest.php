<?php

namespace Tests\Feature;

use App\Constants\CounterTypes;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class CounterControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_renders_view(): void
    {
        $response = $this->get(route('counter'));

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Counter')
        );
    }

    /**
     * @return void
     */
    public function test_it_validates_invalid_type(): void
    {
        $response = $this->post(route('counter'), [
            'type' => 'invalid',
            'string' => 'test 1234 ! $ ^ ./',
        ]);

        $response->assertSessionHasErrors('type');
    }

    /**
     * @return void
     */
    public function test_it_validates_required_string(): void
    {
        $response = $this->post(route('counter'), [
            'type' => CounterTypes::CHARACTERS,
            'string' => '',
        ]);

        $response->assertSessionHasErrors('string');
    }

    /**
     * @return void
     */
    public function test_it_counts_characters(): void
    {
        $string = 'test 1234 ! $ ^ ./';
        $response = $this->post(route('counter'), [
            'type' => CounterTypes::CHARACTERS,
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Counter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', strlen($string))
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_counts_letters(): void
    {
        $string = 'tests 1234 ! $ ^ ./';
        $response = $this->post(route('counter'), [
            'type' => CounterTypes::LETTERS,
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Counter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 5)
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_counts_utf8_letters(): void
    {
        $string = '??????????????????   ;\;/.,,,~`';
        $response = $this->post(route('counter'), [
            'type' => CounterTypes::LETTERS,
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Counter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 9)
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_counts_words(): void
    {
        $string = 'tests zodis cia ! $ ^ ./';
        $response = $this->post(route('counter'), [
            'type' => CounterTypes::WORDS,
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Counter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 3)
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_counts_utf8_words(): void
    {
        $string = 'a??i?? tau labai .,.,.,.';
        $response = $this->post(route('counter'), [
            'type' => CounterTypes::WORDS,
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Counter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 3)
                )
        );
    }
}
