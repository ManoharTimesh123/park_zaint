<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PriceCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\pricecategory\CreatePriceCategoryRequest;
use App\Repositories\PriceCategoryRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PriceCategoryController extends Controller
{
    public $priceCategoryRepository;
    public function __construct(
        PriceCategoryRepository $priceCategoryRepository,
    ) {
        $this->priceCategoryRepository = $priceCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PriceCategoryDataTable $dataTable)
    {
        $allAddonsAndProducts = $this->priceCategoryRepository->getAllProductsandAirport();
        $productid = $allAddonsAndProducts['products'][0]->id;
        $categories = $this->priceCategoryRepository->getAllCategory($productid);
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create(null, $i, 1)->monthName;
            $months[$i] = $monthName;
        }
        $allAddonsAndProducts['categories'] = $categories;
        $allAddonsAndProducts['months'] = $months;
        return $dataTable->render('admin.priceCategory.index', $allAddonsAndProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.priceCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePriceCategoryRequest $request)
    {
        $newcategory = $request->only([
            'newcategory',
            'prices'
        ]);

        try {
            DB::beginTransaction();
            $this->priceCategoryRepository->createpriceCategory($newcategory);
            DB::commit();

            return redirect()->route('admin.pricecategory.index')->with('message', trans('app.pricecategory.pricecategory_created'));
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
        $pricecategory = $this->priceCategoryRepository->getNoOfDaysByCategoryId($id);
        return view('admin.priceCategory.read', compact('pricecategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricecategory = $this->priceCategoryRepository->getNoOfDaysByCategoryId($id);
        return view('admin.priceCategory.edit', compact('pricecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePriceCategoryRequest $request, $id)
    {
        $pricecategoryDetails = $request->only([
            'newcategory',
            'prices'
        ]);
        try {
            DB::beginTransaction();
            $this->priceCategoryRepository->updatePriceCategory($id, $pricecategoryDetails);
            DB::commit();

            return redirect()->route('admin.pricecategory.index')->with('message', trans('app.pricecategory.pricecategory_updated'));
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
            $this->priceCategoryRepository->deletePriceCategoryById($id);
            DB::commit();

            return redirect()->route('admin.pricecategory.index')->with('message', trans('app.pricecategory.pricecategory_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function fetchnoofdays($categoryid)
    {
        $categories = $this->priceCategoryRepository->getNoOfDaysByCategoryId($categoryid);
        return $categories;
    }
    
}
