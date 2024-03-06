<?php

namespace App\Http\Controllers\admin;

use App\DataTables\AirportDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\airport\CreateAirportRequest;
use App\Http\Requests\admin\airport\UpdateAirportRequest;
use App\Interfaces\AirportRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AirportController extends Controller
{
    public $airportRepositoryInterface;
    private $imageRepositoryInterface;
    protected $storageBaseUrl;

    public function __construct(
        AirportRepositoryInterface $airportRepositoryInterface,
        ImageRepositoryInterface $imageRepositoryInterface
    ) {
        $this->middleware('auth');
        $this->airportRepositoryInterface = $airportRepositoryInterface;
        $this->imageRepositoryInterface = $imageRepositoryInterface;
        $this->storageBaseUrl = env('STORAGE_BASE_URL');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AirportDataTable $dataTable)
    {
        return $dataTable->render('admin.airport.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.airport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAirportRequest $request)
    {
        $airportDetails = $request->only([
            'airport_name',
            'slug',
            'cc_email',
            'description',
            'airport_status',
            'new_items',
        ]);

        $imageUrlsArray = [];
        if ($request->imageUrls != null) {
            $imageUrlsArray = explode(',', $request->imageUrls);
        }
        $description = $request->description;

        $filenames = getFileNames($description);

        try {
            DB::beginTransaction();
            $airportDetails['description'] = imgUrlAdapter($this->storageBaseUrl, 'storage_base_url', $airportDetails['description']);
            $this->airportRepositoryInterface->createAirport($airportDetails);
            if ($imageUrlsArray != null) {
                $this->imageRepositoryInterface->deleteImages($imageUrlsArray, $filenames);
            }
            DB::commit();

            return redirect()
                ->route('admin.airport.index')
                ->with('message', trans('app.airport.airport_created'));
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
        $airport = $this->airportRepositoryInterface->getAirportById($id);
        $updatedDescription = imgUrlAdapter('storage_base_url', $this->storageBaseUrl, $airport->description);
        $airport->description = $updatedDescription;

        return view('admin.airport.read', compact('airport'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchTerminals($id)
    {
        $terminals = $this->airportRepositoryInterface->getTerminalsByAirportId($id);

        return $terminals;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airport = $this->airportRepositoryInterface->getAirportById($id);

        $updatedDescription = imgUrlAdapter('storage_base_url', $this->storageBaseUrl, $airport->description);
        $airport->description = $updatedDescription;

        $filenames = getFileNames($airport->description);
        $files = null;
        foreach ($filenames as $index => $file) {
            if ($index == 0) {
                $files = $file;
            } else {
                $files = $files . ',' . $file;
            }
        }

        return view('admin.airport.edit', compact('airport', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAirportRequest $request, $id)
    {
        $airportDetails = $request->only([
            'airport_name',
            'slug',
            'cc_email',
            'description',
            'airport_status',
            'new_items',
            'update_items',
        ]);

        $imageUrlsArray = [];
        if ($request->imageUrls != null) {
            $imageUrlsArray = explode(',', $request->imageUrls);
        }
        $description = $request->description;

        $filenames = getFileNames($description);

        try {
            DB::beginTransaction();
            $airportDetails['description'] = imgUrlAdapter($this->storageBaseUrl, 'storage_base_url', $airportDetails['description']);
            $this->airportRepositoryInterface->updateAirport($id, $airportDetails);
            if ($imageUrlsArray != null) {
                $this->imageRepositoryInterface->deleteImages($imageUrlsArray, $filenames);
            }
            DB::commit();

            return redirect()
                ->route('admin.airport.index')
                ->with('message', trans('app.airport.airport_updated'));
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
            $this->airportRepositoryInterface->deleteAirportById($id);
            DB::commit();

            return redirect()
                ->route('admin.airport.index')
                ->with('message', trans('app.airport.airport_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
