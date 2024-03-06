<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PromotionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\promotions\CreatePromotionsRequest;
use App\Interfaces\PromotionsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    public $promotionsRepository;

    public function __construct(
        PromotionsRepositoryInterface $promotionsRepository,
    ) {
        $this->promotionsRepository = $promotionsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PromotionsDataTable $dataTable)
    {
        return $dataTable->render('admin.promotions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allAddonsAndProducts = $this->promotionsRepository->getAllAddonsAndProducts();

        return view('admin.promotions.create', $allAddonsAndProducts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePromotionsRequest $request)
    {
        $promotionsDetails = $request->all();
        try {
            DB::beginTransaction();
            $this->promotionsRepository->createPromotion($promotionsDetails);
            DB::commit();

            return redirect()->route('admin.promotions.index')->with('message', trans('app.promotions.promotions_created'));
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
        $promotions = $this->promotionsRepository->getPromotionById($id);
        $emails = $this->promotionsRepository->getAllEmails($id);
        $getAllPromotionsAddonsAndProducts = $this->promotionsRepository->getAllPromotionsAddonsAndProducts($id);
        $getAllExcludePromotionsAddonsAndProducts = $this->promotionsRepository->getAllExcludePromotionsAddonsAndProducts($id);

        return view('admin.promotions.view', compact('promotions', 'emails', 'getAllPromotionsAddonsAndProducts', 'getAllExcludePromotionsAddonsAndProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotions = $this->promotionsRepository->getPromotionById($id);
        $emails = $this->promotionsRepository->getAllEmails($id);

        $commaSepratedEmails = implode(', ', array_map(function ($innerArray) {
            return $innerArray['email']; // Accessing the first (and only) element of each inner array
        }, $emails['emails']->ToArray()));
        $getAllPromotionsAddonsAndProducts = $this->promotionsRepository->getAllPromotionsAddonsAndProducts($id);
        $getAllExcludePromotionsAddonsAndProducts = $this->promotionsRepository->getAllExcludePromotionsAddonsAndProducts($id);

        $promotions = $this->promotionsRepository->getPromotionById($id);

        return view('admin.promotions.edit', compact('promotions', 'commaSepratedEmails', 'getAllPromotionsAddonsAndProducts', 'getAllExcludePromotionsAddonsAndProducts', ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePromotionsRequest $request, $id)
    {
        $promotionsDetails = $request->only([
            'description',
        ]);
        try {
            DB::beginTransaction();
            $this->promotionsRepository->updatePromotion($id, $promotionsDetails);
            DB::commit();

            return redirect()->route('admin.promotions.index')->with('message', trans('app.promotions.promotions_updated'));
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
            $this->promotionsRepository->deletePromotionById($id);
            DB::commit();

            return redirect()->route('admin.promotions.index')->with('message', trans('app.promotions.promotions_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
