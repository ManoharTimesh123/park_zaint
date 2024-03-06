<?php

namespace App\Http\Controllers\admin;

use App\DataTables\AddonsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\addons\CreateAddonsRequest;
use App\Repositories\AddonsRepository;
use Illuminate\Support\Facades\DB;

class AddonsController extends Controller
{
    public $addonsRepository;

    public function __construct(
        AddonsRepository $AddonsRepository,
    ) {
        $this->addonsRepository = $AddonsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AddonsDataTable $dataTable)
    {
        return $dataTable->render('admin.addons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAddonsRequest $request)
    {
        $AddonsDetails = $request->only([
            'name',
            'code',
            'description',
            'option_name',
            'option_price',
            'status',
        ]);
        try {
            DB::beginTransaction();
            $this->addonsRepository->createAddons($AddonsDetails);
            DB::commit();

            return redirect()->route('admin.addons.index')->with('message', trans('app.addons.addons_created'));
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
        $Addon = $this->addonsRepository->getAddonsById($id);
        $AddonOption = $this->addonsRepository->getAddonsoptionById($id);

        return view('admin.addons.view', ['addons' => compact('Addon'), 'addons_options' => compact('AddonOption')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Addon = $this->addonsRepository->getAddonsById($id);
        $AddonOption = $this->addonsRepository->getAddonsoptionById($id);

        return view('admin.addons.edit', ['addons' => compact('Addon'), 'addons_options' => compact('AddonOption')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAddonsRequest $request, $id)
    {
        $addonsDetails = $request->only([
            'name',
            'code',
            'description',
            'option_name',
            'option_price',
            'status',
        ]);
        try {
            DB::beginTransaction();
            $this->addonsRepository->updateAddons($id, $addonsDetails);
            DB::commit();

            return redirect()->route('admin.addons.index')->with('message', trans('app.addons.addons_updated'));
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
            $this->addonsRepository->deleteAddonsById($id);
            DB::commit();

            return redirect()->route('admin.addons.index')->with('message', trans('app.addons.addons_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
