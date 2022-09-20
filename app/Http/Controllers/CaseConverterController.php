<?php

namespace App\Http\Controllers;

use App\Constants\CaseConverterTypes;
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
        return Inertia::render('CaseConverter', [
            'types' => CaseConverterTypes::getAll(),
        ]);
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
            'types' => CaseConverterTypes::getAll(),
            'result' => [
                'value' => $caseConverterFactory->make($DTO->getType())->convert($DTO->getString()),
            ],
        ]);
    }
}
