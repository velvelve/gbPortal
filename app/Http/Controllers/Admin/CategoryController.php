<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = $request->only(['title', 'description']);
        $category = new Category($data);
        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно сохранена');
        }
        return back()->with('error', 'Не удалось добавить запись');
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
    public function edit(Category $category)
    {
        return \view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = $request->only(['title', 'description']);
        $category = $category->fill($data);
        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
