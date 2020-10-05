<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $viewsPath = 'pages.admin.users';
    private $indexRoute = 'admin.users.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("{$this->viewsPath}.index", ['models' => User::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->viewsPath}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->get('password'));
        $user->markEmailAsVerified();
        $user->save();
        return redirect()->route($this->indexRoute)
            ->with('status', "User '{$user->name}'(id:{$user->id}) Created!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("{$this->viewsPath}.edit", [
            'model' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all())->save();
        return redirect()->route($this->indexRoute)
            ->with('status', "User '{$user->name}'(id:{$user->id}) Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route($this->indexRoute)
            ->with('status', "User '{$user->name}' deactivated!");
    }
}
