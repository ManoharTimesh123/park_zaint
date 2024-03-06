<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PermissionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\permission\CreatePermissionRequest;
use App\Http\Requests\admin\permission\UpdatePermissionRequest;
use App\Interfaces\PermissionRepositoryInterface;
use DB;

class PermissionController extends Controller
{
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionsDataTable $dataTable)
    {
        return $dataTable->render('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $permissionDetails = $request->only([
            'name',
        ]);
        try {
            DB::beginTransaction();
            $this->permissionRepository->createPermission($permissionDetails);
            DB::commit();

            return redirect()
                ->route('admin.permission.index')
                ->with('message', trans('app.permission.permission_created'));
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
        $permission = $this->permissionRepository->getPermissionById($id);

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        $permissionDetails = $request->only([
            'name',
        ]);
        try {
            DB::beginTransaction();
            $this->permissionRepository->updatePermission($id, $permissionDetails);
            DB::commit();

            return redirect()
                ->route('admin.permission.index')
                ->with('message', trans('app.permission.permission_updated'));
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
            $this->permissionRepository->deletePermissionById($id);
            DB::commit();

            return redirect()
                ->route('admin.permission.index')
                ->with('message', trans('app.permission.permission_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
