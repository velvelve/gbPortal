<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $newsList = News::query()->status()->with('category')->with('source')->paginate(15);
        $statusSelected = "none";
        if ($request->has('f')) {
            $statusSelected = $request->query('f', 'all');
        }
        return view('admin.news.index', [
            'newsList' => $newsList,
            'status' => $statusSelected,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        return \view('admin.news.create', [
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $news = new News($request->validated());
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', __('News was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->getNews(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, News $news)
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', __('News was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
