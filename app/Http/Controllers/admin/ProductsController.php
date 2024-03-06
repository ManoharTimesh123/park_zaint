<?php

namespace App\Http\Controllers\admin;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\products\CreateProductsRequest;
use App\Interfaces\ProductsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public $productsRepository;

    public function __construct(
        ProductsRepositoryInterface $ProductsRepository,
    ) {
        $this->productsRepository = $ProductsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
        $productsDetails = $request->only([
            'name',
            'code',
            'description',
            'status',
        ]);
        try {
            DB::beginTransaction();
            $this->productsRepository->createProducts($productsDetails);
            DB::commit();

            return redirect()->route('admin.products.index')->with('message', trans('app.products.products_created'));
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
        return view('admin.products.view', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = $this->productsRepository->getProductsById($id);

        return view('admin.products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductsRequest $request, $id)
    {
        $ProductsDetails = $request->only([
            'name',
            'code',
            'description',
            'status',
        ]);
        try {
            DB::beginTransaction();
            $this->productsRepository->updateProducts($id, $ProductsDetails);
            DB::commit();

            return redirect()->route('admin.products.index')->with('message', trans('app.products.products_updated'));
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
            $this->productsRepository->deleteProductsById($id);
            DB::commit();

            return redirect()->route('admin.products.index')->with('message', trans('app.products.products_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
