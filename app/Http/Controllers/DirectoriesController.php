<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Models\Directory;
use Illuminate\View\View;

class DirectoriesController extends Controller
{

    private $viewsPath = 'pages.admin.directories';
    private $indexRoute = 'admin.directories.index';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view("{$this->viewsPath}.index", ['models' => Directory::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view("{$this->viewsPath}.create", ['parents' => Directory::all()->pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DirectoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DirectoryRequest $request)
    {
        $directory = new Directory();
        $directory->fill($request->all())
            ->save();
        return redirect()->route($this->indexRoute)
            ->with('status', "Directory '{$directory->name}'(id:{$directory->id}) Created!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Directory $directory)
    {
        return view("{$this->viewsPath}.edit", [
            'model'   => $directory,
            'parents' => Directory::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DirectoryRequest $request
     * @param  \App\Models\Directory $directory
     * @return \Illuminate\Http\Response
     */
    public function update(DirectoryRequest $request, Directory $directory)
    {
        $directory->fill($request->all())
            ->save();

        return redirect()->route($this->indexRoute)
            ->with('status', "Directory '{$directory->name}' Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directory $directory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Directory $directory)
    {
        if ($directory->pages->isEmpty() && $directory->childs->isEmpty()) {
            $directory->delete();
            return redirect()->route($this->indexRoute)
                ->with('status', "Directory '{$directory->name}' deleted!");
        }
        return redirect()->route($this->indexRoute)
            ->with('error', 'Cant delete directory with child`s elements');
    }
}
