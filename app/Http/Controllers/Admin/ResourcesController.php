<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resources\Create;
use App\Http\Requests\Admin\Resources\Edit;
use App\Models\News;
use App\Models\Resource;
use App\Services\Contracts\RssParser;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        $resources = Resource::all();
        return view('admin.resources.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.resources.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $resource = new Resource($request->validated());
        if ($resource->save()) {
            return redirect()->route('admin.resources.index')->with('success', __('News was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource, RssParser $rssParser)
    {
        $newsArray = $rssParser->setRssUrl($resource->url)->getParsedData();
        return \view('admin.resources.show', [
            'newsList' => $newsArray
        ]);
    }

    public function addnews(Request $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->author = $request->input('author');
        $news->description = $request->input('description');
        $news->status = Status::DRAFT->value;
        $news->created_at = $request->input('created_at');
        $news->category_id = 1;
        $news->source_id = News::$RSS_SOURCE_ID;
        if ($news->save()){
            return redirect()->route('admin.news.index')->with('success', __('News was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        return \view('admin.resources.edit', [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, Resource $resource)
    {
        $validated = $request->validated();
        $resource = $resource->fill($validated);
        if ($resource->save()) {
            return redirect()->route('admin.resource.index')->with('success', __('News was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
