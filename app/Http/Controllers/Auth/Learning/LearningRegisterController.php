<?php

namespace App\Http\Controllers\Auth\Learning;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LearningLoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\Auth\RegisterService;
use App\Services\Base\BaseService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LearningRegisterController extends Controller
{
    protected RegisterService $register;
    public function __construct(RegisterService $register){
        $this->register = $register;
    }

    public function index(){
        return view('auth.learning.register', ['url' => 'learning/register']);
    }

    public function register(RegisterUserRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->register->createUser(
                $request,
            );
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
