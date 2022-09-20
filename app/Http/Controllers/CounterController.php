<?php

namespace App\Http\Controllers;

use App\Constants\CounterTypes;
use App\Factories\Counter\CounterFactory;
use App\Http\Requests\CounterRequest;
use Illuminate\Http\Request;
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
        return Inertia::render('Counter', [
            'types' => CounterTypes::getAll(),
        ]);
    }

    /**
     * @param CounterRequest $request
     * @param CounterFactory $counterFactory
     *
     * @return Response
     */
    public function store(CounterRequest $request, CounterFactory $counterFactory): Response
    {
        $DTO = $request->getDTO();

        return Inertia::render('Counter', [
            'types' => CounterTypes::getAll(),
            'result' => [
                'value' => $counterFactory->make($DTO->getType())->count($DTO->getString()),
            ],
        ]);
    }
}
