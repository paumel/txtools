<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class CaseConverterControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_renders_view(): void
    {
        $response = $this->get(route('case-converter'));

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
        );
    }

    /**
     * @return void
     */
    public function test_it_validates_invalid_type(): void
    {
        $response = $this->post(route('case-converter'), [
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
        $response = $this->post(route('case-converter'), [
            'type' => 'characters',
            'string' => '',
        ]);

        $response->assertSessionHasErrors('string');
    }

    /**
     * @return void
     */
    public function test_it_converts_to_sentence_case(): void
    {
        $string = 'test test one. test test two. what? lolš!';
        $response = $this->post(route('case-converter'), [
            'type' => 'sentence',
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 'Test test one. Test test two. What? Lolš!')
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_converts_to_lower_case(): void
    {
        $string = 'TeST TEST oNe. sTep. At A TIMEŠ';
        $response = $this->post(route('case-converter'), [
            'type' => 'lower',
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 'test test one. step. at a timeš')
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_converts_to_upper_case(): void
    {
        $string = 'test test One. step. at a timeš';
        $response = $this->post(route('case-converter'), [
            'type' => 'upper',
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 'TEST TEST ONE. STEP. AT A TIMEŠ')
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_converts_to_capitalized_case(): void
    {
        $string = 'test test One. sTep. at a timeš';
        $response = $this->post(route('case-converter'), [
            'type' => 'capitalized',
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 'Test Test One. Step. At A Timeš')
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_converts_to_alternating_case(): void
    {
        $string = 'test test One. sTep. at a timeš';
        $response = $this->post(route('case-converter'), [
            'type' => 'alternating',
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 'tEsT TeSt oNe. StEp. At a tImEš')
                )
        );
    }

    /**
     * @return void
     */
    public function test_it_converts_to_inverse_case(): void
    {
        $string = 'tEsT TesT OnE. sTep. aT A timeŠ';
        $response = $this->post(route('case-converter'), [
            'type' => 'inverse',
            'string' => $string,
        ]);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('CaseConverter')
                ->has(
                    'result',
                    fn(Assert $page) => $page
                        ->where('value', 'TeSt tESt oNe. StEP. At a TIMEš')
                )
        );
    }
}
