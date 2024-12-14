<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload/index');
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
     */
    public function store(Request $request)
    {
        try {
            $filePath = $request->file('file_csv')->store('temp');
            
            return view('upload.view', ['data' => $this->getModelResponse($filePath)]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getModelResponse($file) {
        $modelPath = base_path('processing_data_model.py');

        $output = [];
        $returnVar = 0;
        $command = "python " . $modelPath . " " . storage_path('app/private/'. $file);
        exec($command, $output, $returnVar);

        $processedData = json_decode(implode('', $output), true);
        return $processedData;
    }
}