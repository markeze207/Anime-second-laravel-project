<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Service\Admin\Users\Service;
use App\Models\User;

class UserController extends Controller
{

    protected $adminUsersService;

    /**
     * Get service
     */
    public function __construct(Service $adminUsersService)
    {
        $this->adminUsersService = $adminUsersService;
    }

    /**
     * Show the users list
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = User::getRoles();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['role'] = (int) $data['role'];
        $this->adminUsersService->update($data, $user);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
