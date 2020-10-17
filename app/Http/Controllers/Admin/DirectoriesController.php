<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectoryRequest;
use App\Models\Directory;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class DirectoriesController extends Controller
{

    private $viewsPath = 'pages.admin.directories';
    private $indexRoute = 'admin.directories.index';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        return view("{$this->viewsPath}.index", ['models' => Directory::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function create()
    {
        return view("{$this->viewsPath}.create", ['parents' => Directory::all()->pluck('title', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DirectoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(DirectoryRequest $request)
    {
        $directory = new Directory();
        $directory->fill($request->all())
            ->save();
        return redirect()->route($this->indexRoute)
            ->with('status', "Directory '{$directory->title}'(id:{$directory->id}) Created!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Directory $directory)
    {
        return view("{$this->viewsPath}.edit", [
            'model'   => $directory,
            'parents' => Directory::all()->pluck('title', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DirectoryRequest $request
     * @param Directory $directory
     * @return Response
     */
    public function update(DirectoryRequest $request, Directory $directory)
    {
        $directory->fill($request->all())
            ->save();

        return redirect()->route($this->indexRoute)
            ->with('status', "Directory '{$directory->title}' Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Directory $directory
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(Directory $directory)
    {
        if ($directory->pages->isEmpty() && $directory->childs->isEmpty()) {
            $directory->delete();
            return redirect()->route($this->indexRoute)
                ->with('status', "Directory '{$directory->title}' deleted!");
        }
        return redirect()->route($this->indexRoute)
            ->with('error', 'Cant delete directory with child`s elements');
    }
}
