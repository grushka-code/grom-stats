<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PagesController extends Controller
{

    private $viewsPath = 'pages.admin.pages';
    private $indexRoute = 'admin.pages.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("{$this->viewsPath}.index", ['models' => Page::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directories = Directory::all()->pluck('name', 'id');
        if ($directories->isEmpty()) {
            return redirect(route($this->indexRoute))
                ->with('error', 'Before creating pages you must create a directory!');
        }

        return view("{$this->viewsPath}.create", ['directories' => $directories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = (new Page())->fill(
            array_merge(
                $request->all(),
                [
                    'slug'      => Str::slug($request->get('title'), '-'),
                    'author_id' => 1
                ]
            ));
        $page->save();
        return redirect()->route('admin.pages.index')
            ->with('status', "Page created (title:{$page->title}) Created!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view("{$this->viewsPath}.edit", [
            'model'       => $page,
            'directories' => Directory::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->fill(
            array_merge(
                $request->all(),
                [
                    'slug'      => Str::slug($request->get('title'), '-')
                ]
            ))->save();

        return redirect()->route($this->indexRoute)
            ->with('status', "Page created (title:{$page->title}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route($this->indexRoute)
            ->with('status', "Page '{$page->title}' deleted!");
    }
}
