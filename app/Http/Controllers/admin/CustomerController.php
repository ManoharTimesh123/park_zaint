<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\customer\CreateCustomerRequest;
use App\Http\Requests\admin\customer\UpdateCustomerRequest;
use App\Interfaces\AdminUserRepositoryInterface;
use DB;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public $adminUserRepository;

    public function __construct(
        AdminUserRepositoryInterface $adminUserRepository
    ) {
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        $customerDetails = $request->only([
            'name',
            'email',
            'phone',
            'account_type',
            'status',
        ]);
        $roleId = config('constants.roles.customer_role_id');
        $customerDetails['password'] = Str::random(10);
        $password = $customerDetails['password'];
        $email = $request->email;
        try {
            DB::beginTransaction();
            $this->adminUserRepository->createUser($customerDetails, $roleId);
            DB::commit();

            $content = [
                'title' => 'Mail for account creation!',
                'body' => 'Below is your password for the account please reset as soon as possible.',
                'password' => $password,
            ];
            $this->adminUserRepository->notifyUser($email, $content);

            return redirect()->route('admin.customers.index')->with('message', trans('app.customer.customer_created'));
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
        $user = $this->adminUserRepository->getUserById($id);

        return view('admin.customers.read', compact('user'));
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

        return view('admin.customers.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $userDetails = $request->only([
            'name',
            'email',
            'phone',
            'account_type',
            'status',
        ]);

        try {
            DB::beginTransaction();
            $this->adminUserRepository->updateCustomer($id, $userDetails);
            DB::commit();

            return redirect()->route('admin.customers.index')->with('message', trans('app.customer.customer_updated'));
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

            return redirect()->route('admin.customers.index')->with('message', trans('app.customer.customer_deleted'));
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
