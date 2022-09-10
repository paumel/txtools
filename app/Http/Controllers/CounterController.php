<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class CounterController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Counter');
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request): Response
    {
        $data = $request->validate([
            'type' => Rule::in(['characters', 'letters', 'words']),
            'string' => ['required', 'min:1'],
        ]);

        $string = $data['string'];
        $type = $data['type'];

        $result = match ($type) {
            'characters' => Str::length($string),
            'letters' => count(array_filter(str_split($string), 'ctype_alpha')),
            'words' => Str::wordCount($string)
        };

        return Inertia::render('Counter', [
            'result' => [
                'value' => $result,
            ],
        ]);
    }
}
