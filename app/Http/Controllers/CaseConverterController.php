<?php

namespace App\Http\Controllers;

use App\Factories\CaseConverter\CaseConverterFactory;
use App\Http\Requests\CaseConverterRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CaseConverterController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        return Inertia::render('CaseConverter');
    }

    /**
     * @param CaseConverterRequest $request
     * @param CaseConverterFactory $caseConverterFactory
     *
     * @return Response
     */
    public function store(CaseConverterRequest $request, CaseConverterFactory $caseConverterFactory): Response
    {
        $DTO = $request->getDTO();

        return Inertia::render('CaseConverter', [
            'result' => [
                'value' => $caseConverterFactory->make($DTO->getType())->convert($DTO->getString()),
            ],
        ]);
    }
}
