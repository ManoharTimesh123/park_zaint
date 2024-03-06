<?php

namespace App\Http\Controllers\admin;

use App\DataTables\BookingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\booking\CreateBookingRequest;
use App\Http\Requests\admin\booking\UpdateBookingRequest;
use App\Http\Requests\admin\note\CreateNoteRequest;
use App\Http\Requests\admin\note\UpdateNoteRequest;
use App\Interfaces\BookingRepositoryInterface;
use App\Repositories\AddonsRepository;
use App\Repositories\AirportRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class BookingController extends Controller
{
    public $bookingRepositoryInterface, $airportRepository, $productsRepository, $addonsRepository;

    public function __construct(
        BookingRepositoryInterface $bookingRepositoryInterface,
        AirportRepository $airportRepository,
        ProductsRepository $productsRepository,
        AddonsRepository $addonsRepository
    ) {
        $this->bookingRepositoryInterface = $bookingRepositoryInterface;
        $this->airportRepository = $airportRepository;
        $this->productsRepository = $productsRepository;
        $this->addonsRepository = $addonsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookingDataTable $dataTable)
    {     
        return $dataTable->render('admin.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airports = $this->airportRepository->getAllAirports();
        $products = $this->productsRepository->getAllProducts();
        $addons = $this->addonsRepository->getAllAddons();
        return view('admin.booking.create', compact('airports', 'products', 'addons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookingRequest $request)
    {
        $bookingDetails = $request->only([
            'name',
            'email',
            'phone',
            'product_id',
            'company_name',
            'outbound_flight',
            'airport',
            'outbound_terminal',
            'inbound_flight',
            'inbound_terminal',
            'addons_id',
            'travel_start_date',
            'travel_end_date',
            'no_of_passengers',
        ]); 
        $bookingDetails['vehicle_details'] = $request->new_items;
        try {
            DB::beginTransaction();
            $message = $this->bookingRepositoryInterface->createBooking($bookingDetails);
            if($message != 'true') {
                return redirect()->back()->with('error', $message);
            }
            DB::commit();

            return redirect()
                ->route('admin.booking.index')
                ->with('message', trans('app.booking.booking_created'));
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
        $booking = $this->bookingRepositoryInterface->getBookingById($id);
        $user = [
            'user_id' => $booking->user->id,
            'name' => $booking->user->name,
            'phone' => $booking->user->phone,
            'email' => $booking->user->email,
            'company_name' =>$booking->user->company_name,
        ];
        $product_ids = [];
        $addon_ids = [];
        foreach ($booking->productAndAddon as $data) {
            if ($data->product_id != null) {
                array_push($product_ids, $data->product_id);
            } else {
                array_push($addon_ids, $data->addon_id);
            }
        }
        $notes = [];
        foreach ($booking->notes as $data) {
            $note = [
                'id' => $data->id,
                'created_by' => $data->created_by,
                'description' => $data->description,
            ];
            array_push($notes, $note);
        }
        return view('admin.booking.read', compact('booking', 'user', 'product_ids', 'addon_ids', 'notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = $this->bookingRepositoryInterface->getBookingById($id);
        $user = [
            'user_id' => $booking->user->id,
            'name' => $booking->user->name,
            'phone' => $booking->user->phone,
            'email' => $booking->user->email,
            'company_name' =>$booking->user->company_name,
        ];
        $product_ids = [];
        $addon_ids = [];
        foreach ($booking->productAndAddon as $data) {
            if ($data->product_id != null) {
                array_push($product_ids, $data->product_id);
            } else {
                array_push($addon_ids, $data->addon_id);
            }
        }
        
        $terminals = $this->airportRepository->getTerminalsByAirportId($booking->airport_id);
        $airports = $this->airportRepository->getAllAirports();
        $products = $this->productsRepository->getAllProducts();
        $addons = $this->addonsRepository->getAllAddons();
        return view('admin.booking.edit', compact('booking', 'user', 'products', 'addons', 'airports', 'terminals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, $id)
    {
        $bookingDetails = $request->only([
            'name',
            'email',
            'phone',
            'company_name',
            'outbound_flight',
            'outbound_terminal',
            'inbound_flight',
            'inbound_terminal',
            'no_of_passengers',
        ]);

        try {
            DB::beginTransaction();
            $this->bookingRepositoryInterface->updateBooking($id, $bookingDetails);
            DB::commit();

            return redirect()
                ->route('admin.booking.index')
                ->with('message', trans('app.booking.booking_updated'));
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
            $this->bookingRepositoryInterface->deleteBookingById($id);
            DB::commit();

            return redirect()
                ->route('admin.booking.index')
                ->with('message', trans('app.booking.booking_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Create resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addNote(CreateNoteRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->bookingRepositoryInterface->addNote($request->description, $request->booking_id);
            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Edit resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNote(UpdateNoteRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->bookingRepositoryInterface->editNote($request->description, $request->id);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Delete resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNote(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->bookingRepositoryInterface->deleteNote($request->id);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
