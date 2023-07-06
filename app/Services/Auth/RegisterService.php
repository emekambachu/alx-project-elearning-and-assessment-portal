<?php

namespace App\Services\Auth;

use App\Services\Base\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    protected UserService $user;
    public function __construct(UserService $user){
        $this->user = $user;
    }

    public function createUser($request): array
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->user->user()->create($input);

        // Send welcome and otp emails
        $otp = BaseService::randomCharacters(10, '0123456789ABCDEFGHIJ');

//        $this->sendWelcomeEmail($user, $emailContent);
//        $this->sendOtpEmail($user, $otp);

        // Return user
        return [
            'success' => true,
            'user' => $user,
            'message' => 'User registered successfully'
        ];
    }

    private function sendWelcomeEmail($createdUser, String $emailContent): void
    {
        $user = [
            'name' => $createdUser->name,
            'email' => $createdUser->email,
        ];

        BaseService::sendEmailGeneral(
            $user,
            $emailContent,
            'Welcome to Pet Me',
            $user['email'],
            $user['name']
        );
    }

    public function sendOtpEmail($user, $otp): void
    {
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'otp' => $otp,
        ];

        BaseService::sendEmailGeneral(
            $data,
            'emails.general.send-otp',
            'OTP | Account Activation',
            $data['email'],
            $data['name']
        );
    }

    public function submitOtpAndActivateAccount($request, $queryBuilder): array
    {
        $user = $queryBuilder->where('verification_token', $request->otp)->first();
        if($user){
            if($user->token_used === 1){
                return [
                    'success' => false,
                    'message' => 'Token used, generate another.',
                ];
            }
            $user->status = 1;
            $user->token_used = 1;
            $user->save();

            // Get Token
            $token = $user->createToken($user->email)->plainTextToken;

            return [
                'success' => true,
                'user' => $user,
                'token' => $token,
                'message' => 'Account activated',
            ];
        }
        return [
            'success' => false,
            'message' => 'Incorrect OTP, try again',
        ];
    }
}
