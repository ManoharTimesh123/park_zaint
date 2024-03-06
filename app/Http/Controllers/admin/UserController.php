<?php

namespace App\Http\Controllers\admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\CreateUserRequest;
use App\Http\Requests\admin\user\UpdateUserRequest;
use App\Interfaces\AdminUserRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use DB;

class UserController extends Controller
{
    public function __construct(
        AdminUserRepositoryInterface $adminUserRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->adminUserRepository = $adminUserRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->getAllRoles();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $userDetails = $request->only([
            'name',
            'email',
            'password',
            'phone',
            'status',
        ]);
        $roleId = $request->input('role');
        try {
            DB::beginTransaction();
            $this->adminUserRepository->createUser($userDetails, $roleId);
            DB::commit();

            return redirect()->route('admin.users.index')->with('message', trans('app.user.user_created'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->adminUserRepository->getUserById($id);
        $roles = $this->roleRepository->getAllRoles();
        $userRole = $user->roles->first();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $userDetails = $request->only([
            'name',
            'email',
            'phone',
            'status',
        ]);
        $roleId = $request->input('role');
        try {
            DB::beginTransaction();
            $this->adminUserRepository->updateUser($id, $userDetails, $roleId);
            DB::commit();

            return redirect()->route('admin.users.index')->with('message', trans('app.user.user_updated'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->adminUserRepository->deleteUserById($id);
            DB::commit();

            return redirect()->route('admin.users.index')->with('message', trans('app.user.user_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
