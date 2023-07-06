<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Services\Admin\AdminService;
use App\Services\Auth\LoginService;
use App\Services\Base\BaseService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginController extends Controller
{
    private LoginService $login;
    private AdminService $admin;
    public function __construct(
        LoginService $login,
        AdminService $admin
    ){
        $this->middleware('guest:admin')
            ->except(['logout']);
        $this->login = $login;
        $this->admin = $admin;
    }

    use AuthenticatesUsers;

    public function loginPage(){
        return view('auth.admin.login', ['url' => 'admin/login']);
    }

    public function login(AdminLoginRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->login->adminLogin(
                $request,
                'admin',
                'admin-api'
            );
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function authenticate(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->login->authenticateUserWithToken($request->token);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        try {
            Auth::guard('admin')->logout();
            Auth::user()->tokens()->delete();
            return response()->json([
                'success' => true,
                'message' => 'Logged Out',
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

}
