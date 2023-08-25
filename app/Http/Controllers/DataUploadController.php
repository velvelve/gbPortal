<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataUpload\Create;
use App\Models\DataUpload;
use Illuminate\Http\Request;

class DataUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('dataupload.index', [
            'orders' => DataUpload::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('dataupload.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $order = new DataUpload($request->validated());
        if ($order->save()) {
            return redirect()->route('dataupload.index')->with('success', 'Запись успешно сохранена');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
}
