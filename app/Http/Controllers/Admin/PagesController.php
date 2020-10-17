<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Models\Directory;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class PagesController extends Controller
{

    private $viewsPath = 'pages.admin.pages';
    private $indexRoute = 'admin.pages.index';
    private $model;

    public function __construct()
    {
        $this->model = new Page();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view("{$this->viewsPath}.index", ['models' => Page::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function create()
    {
        $directories = Directory::all()->pluck('title', 'id');
        if ($directories->isEmpty()) {
            return redirect(route($this->indexRoute))
                ->with('error', 'Before creating pages you must create a directory!');
        }

        return view("{$this->viewsPath}.create", [
            'directories' => $directories,
            'types' => $this->model->getTypeTitles(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return RedirectResponse
     */
    public function store(PageRequest $request)
    {
        $page = (new Page())->fill(
            array_merge(
                $request->all(),
                [
                    'slug' => Str::slug($request->get('title'), '-'),
                    'author_id' => 1,
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
     * @return Application|Factory|View|Response
     */
    public function edit(Page $page)
    {
        return view("{$this->viewsPath}.edit", [
            'model' => $page,
            'directories' => Directory::all()->pluck('title', 'id'),
            'types' => $this->model->getTypeTitles(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $page->fill(
            array_merge(
                $request->all(),
                [
                    'slug' => Str::slug($request->get('title'), '-'),
                ]
            ))->save();

        return redirect()->route($this->indexRoute)
            ->with('status', "Page created (title:{$page->title}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route($this->indexRoute)
            ->with('status', "Page '{$page->title}' deleted!");
    }
}
