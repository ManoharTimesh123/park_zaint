<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\auth\CreateResetLinkRequest;
use App\Http\Requests\admin\auth\UpdatePasswordRequest;
use App\Http\Requests\admin\LoginRequest;
use App\Interfaces\AdminUserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public $adminUserRepositoryInterface;

    public function __construct(
        AdminUserRepositoryInterface $adminUserRepositoryInterface
    ) {
        $this->middleware('guest');
        $this->adminUserRepositoryInterface = $adminUserRepositoryInterface;
    }

    public function loginView()
    {
        return view('admin.auth.login');
    }

    /**
     * Handling login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->attempt($credentials, $remember_me)) {
            // User is inactive
            if (auth()->user()->status == 0) {
                // Logout User
                auth()->guard('web')->logout();
                $request->session()->invalidate();

                return redirect('admin/login')->with('error', trans('app.auth.login.inactive_access'));
            }

            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->back()->with('error', trans('app.auth.login.invalid_login_detail'))->withInput();
        }
    }

    public function forgotPasswordView()
    {
        return view('admin.auth.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function sendResetLinkEmail(CreateResetLinkRequest $request)
    {
        try {
            DB::beginTransaction();
            $email = $request->email;

            $user = $this->adminUserRepositoryInterface->getUserByEmailId($email);
            // #TODO to be converted using createToken() function.
            // $token = Password::createToken($user);

            $token = Str::random(100);
            $passwordResetData = [
                'email' => $user->email,
                'token' => $token,
            ];

            $this->adminUserRepositoryInterface->storeToken($passwordResetData);
            $resetLink = url("/admin/password/reset/$token");

            $data = ['email' => $email];
            DB::commit();
            $content = [
                'title' => trans('mail.send_reset_link.title'),
                'body' => trans('mail.send_reset_link.body'),
                'link' => $resetLink,
            ];
            $this->adminUserRepositoryInterface->notifyUser($email, $content);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }

        return view('admin.auth.verify', compact('data'));
    }

    /**
     * Reset the password for the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function resetPassword(Request $request)
    {
        try {
            DB::beginTransaction();
            $token = $request->token;
            $tokenData = $this->adminUserRepositoryInterface->getTokenDataWithToken($token);
            if ($tokenData != null) {
                $expiry = Carbon::parse($tokenData->created_at)->addHour();
                $data = [
                    'token' => $request->token,
                ];
                if ($tokenData->token == $request->token && $tokenData->created_at < $expiry) {
                    DB::commit();

                    return view('admin.auth.reset', compact('data'));
                }
            }

            return view('admin.auth.invalid');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Update the password for the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            DB::beginTransaction();
            $token = $request->token;
            $email = $request->email;
            $tokenData = $this->adminUserRepositoryInterface->getTokenDataWithEmailId($email);
            if ($tokenData != null) {
                $expiry = Carbon::parse($tokenData->created_at)->addHour();
                if ($tokenData->token == $token && $tokenData->created_at < $expiry) {
                    $userDetails = [
                        ['email' => $email],
                        [
                            'password' => $request->password,
                            'updated_at' => now(),
                        ],
                    ];

                    $this->adminUserRepositoryInterface->updatePassword($userDetails);

                    $tokenData->where('email', $request->email)->delete();
                    DB::commit();

                    $content = [
                        'title' => trans('mail.updated_password.title'),
                        'body' => trans('mail.updated_password.body'),
                    ];
                    $this->adminUserRepositoryInterface->notifyUser($email, $content);

                    return redirect('admin/login')->with('message', trans('app.auth.login.password_updated'));
                }
            }

            return redirect()->back()->withInput()->with('email', false);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
