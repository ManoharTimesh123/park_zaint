<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PricesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\prices\CreatePricesRequest;
use App\Http\Requests\admin\prices\CreateCategoryRequest;
use App\Http\Requests\admin\prices\CreateMonthCategorysRequest;
use App\Http\Requests\admin\prices\CreateNoOfDaysRequest;
use App\Http\Requests\admin\prices\GetMonthCategorysRequest;
use App\Http\Requests\admin\prices\GetProductCategory;
use App\Repositories\AirportRepository;
use App\Repositories\PricesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PricesController extends Controller
{
    public $pricesRepository, $productRepository, $airportRepository;
    public function __construct(
        PricesRepository $pricesRepository,
        ProductsRepository $productRepository,
        AirportRepository $airportRepository
    ) {
        $this->pricesRepository = $pricesRepository;
        $this->productRepository = $productRepository;
        $this->airportRepository = $airportRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PricesDataTable $dataTable)
    {
        $allCategoryMonthProduct = [];
        $allCategoryMonthProduct['products'] = $this->productRepository->getAllProducts();
        $allCategoryMonthProduct['airport'] = $this->airportRepository->getAllAirports();
        $categories = $this->pricesRepository->getAllCategory();
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create(null, $i, 1)->monthName;
            $months[$i] = $monthName;
        }
        $allCategoryMonthProduct['categories'] = $categories;
        $allCategoryMonthProduct['months'] = $months;
        return $dataTable->render('admin.prices.index', $allCategoryMonthProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePricesRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePricesRequest $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function createmonthcategorys(CreateMonthCategorysRequest $request)
    {
        $monthdetails = $request->only([
            'month',
            'monthcategories',
            'airport_id',
            'product_id'
        ]);
        try {
            DB::beginTransaction();
            $new =  $this->pricesRepository->createMonthCategorys($monthdetails);
            DB::commit();
            return $new->id;
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }


    public function fetchmonthcategories(GetMonthCategorysRequest $categorydetails)
    {
        $categorymonthdetails = $categorydetails->only([
            'month',
            'airport_id',
            'product_id'
        ]);
        $categories = $this->pricesRepository->getMonthCategoryByAirportAndProductId($categorymonthdetails);
        return $categories;
    }
    
}
