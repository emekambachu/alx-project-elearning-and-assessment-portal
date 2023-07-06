<?php

namespace App\Http\Controllers\Auth\Learning;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LearningLoginRequest;
use App\Http\Requests\Auth\LearningPasswordResetRequest;
use App\Http\Requests\Auth\LearningPasswordUpdateRequest;
use App\Services\Auth\LoginService;
use App\Services\Base\BaseService;
use App\Services\User\UserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LearningLoginController extends Controller
{
    private LoginService $login;
    private UserService $user;
    public function __construct(
        LoginService $login,
        UserService $user){

        $this->middleware('guest:web')
            ->except(['logout', 'authenticate']);
        $this->login = $login;
        $this->user = $user;
    }

    use AuthenticatesUsers;
    public function loginPage(){
        return view('auth.learning.login', ['url' => 'learning/login']);
    }
    public function passwordResetPage(){
        return view('auth.learning.password-reset', ['url' => 'learning/password/reset']);
    }
    public function passwordUpdatePage($token){
        try {
            $tokenExists = $this->user->braceUser()
                ->where('verification_token', $token)->first();
            if(!$tokenExists){
                return view('error.404');
            }
            return view('auth.learning.password-reset-update',
                ['url' => 'learning/password/reset/'.$token], compact('token'));

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

     public function login(LearningLoginRequest $request): \Illuminate\Http\JsonResponse
     {
          try {
              $data = $this->login->loginWithToken(
                  $request,
                  'web',
                  'api',
                  $this->user->braceUser()
              );
              return response()->json($data, Response::HTTP_OK);

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

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->login->LogoutAndDeleteAccessTokens('web', $request->token);
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function submitPasswordReset(LearningPasswordResetRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->login->sendPasswordReset($request, $this->user->braceUser());
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

    public function updatePasswordReset(LearningPasswordUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->login->updatePassword($request, $this->user->braceUser());
            return response()->json($data, Response::HTTP_OK);

        } catch (\Exception $e) {
            return BaseService::tryCatchException($e);
        }
    }

}
