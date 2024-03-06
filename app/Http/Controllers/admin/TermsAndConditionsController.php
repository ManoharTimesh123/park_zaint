<?php

namespace App\Http\Controllers\admin;

use App\DataTables\TermsAndConditionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\termsAndConditions\CreateTermsAndConditionsRequest;
use App\Http\Requests\admin\termsAndConditions\UpdateTermsAndConditionsRequest;
use App\Interfaces\ImageRepositoryInterface;
use App\Interfaces\TermsAndConditionsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TermsAndConditionsController extends Controller
{
    public $tAndCRepositoryInterface;
    private $imageRepositoryInterface;
    protected $storageBaseUrl;

    public function __construct(
        TermsAndConditionsRepositoryInterface $tAndCRepositoryInterface,
        ImageRepositoryInterface $imageRepositoryInterface
    ) {
        $this->middleware('auth');
        $this->tAndCRepositoryInterface = $tAndCRepositoryInterface;
        $this->imageRepositoryInterface = $imageRepositoryInterface;
        $this->storageBaseUrl = env('STORAGE_BASE_URL');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TermsAndConditionsDataTable $dataTable)
    {
        return $dataTable->render('admin.terms-and-conditions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.terms-and-conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTermsAndConditionsRequest $request)
    {
        $tAndCDetails = $request->only([
            'description',
        ]);

        $imageUrlsArray = [];
        if ($request->imageUrls != null) {
            $imageUrlsArray = explode(',', $request->imageUrls);
        }
        $description = $request->description;

        $filenames = fileNames($description);

        try {
            DB::beginTransaction();
            $tAndCDetails['description'] = str_replace($this->storageBaseUrl, 'storage_base_url', $tAndCDetails['description']);
            $this->tAndCRepositoryInterface->createTermsAndConditions($tAndCDetails);
            if ($imageUrlsArray != null) {
                $this->imageRepositoryInterface->deleteImages($imageUrlsArray, $filenames);
            }
            DB::commit();

            return redirect()
                ->route('admin.terms-and-conditions.index')
                ->with('message', trans('app.terms_and_conditions.terms_and_conditions_created'));
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
        $tAndC = $this->tAndCRepositoryInterface->getTermsAndConditionsById($id);
        $updatedDescription = str_replace('storage_base_url', $this->storageBaseUrl, $tAndC->description);
        $tAndC->description = $updatedDescription;

        return view('admin.terms-and-conditions.read', compact('tAndC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tAndC = $this->tAndCRepositoryInterface->getTermsAndConditionsById($id);

        $updatedDescription = str_replace('storage_base_url', $this->storageBaseUrl, $tAndC->description);
        $tAndC->description = $updatedDescription;

        $filenames = fileNames($tAndC->description);
        $files = null;
        foreach ($filenames as $index => $file) {
            if ($index == 0) {
                $files = $file;
            } else {
                $files = $files . ',' . $file;
            }
        }

        return view('admin.terms-and-conditions.edit', compact('tAndC', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermsAndConditionsRequest $request, $id)
    {
        $tAndCDetails = $request->only([
            'description',
        ]);

        $imageUrlsArray = [];
        if ($request->imageUrls != null) {
            $imageUrlsArray = explode(',', $request->imageUrls);
        }
        $description = $request->description;

        $filenames = fileNames($description);

        try {
            DB::beginTransaction();
            $tAndCDetails['description'] = str_replace($this->storageBaseUrl, 'storage_base_url', $tAndCDetails['description']);
            $this->tAndCRepositoryInterface->updateTermsAndConditions($id, $tAndCDetails);
            if ($imageUrlsArray != null) {
                $this->imageRepositoryInterface->deleteImages($imageUrlsArray, $filenames);
            }
            DB::commit();

            return redirect()
                ->route('admin.terms-and-conditions.index')
                ->with('message', trans('app.terms_and_conditions.terms_and_conditions_updated'));
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
            $this->tAndCRepositoryInterface->deleteTermsAndConditionsById($id);
            DB::commit();

            return redirect()
                ->route('admin.terms-and-conditions.index')
                ->with('message', trans('app.terms_and_conditions.terms_and_conditions_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
