<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Application\BraceApplicationResource;
use App\Http\Resources\User\UserProfileResource;
use App\Services\Base\BaseService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    protected UserService $user;
    public function __construct(UserService $user){
        $this->user = $user;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $users = $this->user->selectedUsersWithAssessments()->paginate(12);
            return response()->json([
                'success' => true,
                'users' => UserProfileResource::collection($users)->response()->getData(true),
                'total' => $users->total(),
            ]);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }
}
