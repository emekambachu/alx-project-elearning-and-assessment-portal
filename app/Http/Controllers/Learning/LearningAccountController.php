<?php

namespace App\Http\Controllers\Learning;

use App\Http\Controllers\Controller;
use App\Http\Requests\Learning\UpdateAccountRequest;
use App\Services\Base\BaseService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningAccountController extends Controller
{
    protected UserService $user;
    public function __construct(UserService $user){
        $this->user = $user;
    }

    public function updateAccount(UpdateAccountRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->user->updateAnyField($request, Auth::user()->id);
            return response()->json($data);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
