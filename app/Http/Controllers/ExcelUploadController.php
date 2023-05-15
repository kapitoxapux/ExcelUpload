<?php

namespace App\Http\Controllers;

use App\Imports\ExcelUpload;
use App\Models\ExcelDoc;
use App\Rules\ExcelRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Excel',[
            'rows' => ExcelDoc::latest('id')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $file = $request->file('excel');

        try {
            $request->validate(
                [
                    'excel'=> [
                        'required',
                        'file',
                        'mimes:csv,xlsx,xsl,ods',
                        new ExcelRule,
                    ],
                ],
            );

            Excel::import(new ExcelUpload($request->user()), $file);

        } catch (\Exception $e){
            Log::error($e->getMessage());
        }

        return to_route('excel.index');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $groupedData = ExcelDoc::all()
            ->groupBy('date')
            ->toArray();

        $rows = [];
        foreach ($groupedData as $date => $row) {
            if (count($row) > 1) {
                foreach ($row as $item) {
                    $rows[$item['date']][] = [
                        'id' => $item['id'],
                        'name' => $item['name'],
                        'date' => $item['date'],
                    ];
                }
            } else {
                $rows[$row[0]['date']] = [
                    'id' => $row[0]['id'],
                    'name' => $row[0]['name'],
                    'date' => $row[0]['date'],
                ];
            }
        }

        return view('show')->with('rows', $rows);
    }

    /**
     * Show the form for editing the specified resource.
     * @param ExcelDoc $excelDoc
     */
    public function edit(ExcelDoc $excelDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param ExcelDoc $excelDoc
     */
    public function update(Request $request, ExcelDoc $excelDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param ExcelDoc $excelDoc
     */
    public function destroy(ExcelDoc $excelDoc)
    {
        //
    }
}
