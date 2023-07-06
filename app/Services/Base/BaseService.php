<?php

namespace App\Services\Base;

use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * Class BaseService.
 * This class contains commonly used methods
 */
class BaseService
{
    public static function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    public static function tryCatchException($e): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'error_message' => "Line ".$e->getLine()." of ".$e->getFile().", ".$e->getMessage(),
        ]);
    }

    public function generalApiParams($request, $query){
        if($request->per_page){
            $data = $query->paginate($request->per_page);
        }else if($request->limit){
            $data = $query->limit($request->limit)->get();
        }else{
            $data = $query->get();
        }
        return $data;
    }

    public static function sendEmailGeneral(
        Array $data, String $emailContent, String $subject, $mailTo, $mailToName, $recipients = null): void
    {
        Mail::send($emailContent, $data, static function ($message) use (
            $data, $subject, $mailTo, $mailToName, $recipients) {
            $message->from(config('app.mail_from'), config('app.name'));
            $message->to($mailTo, $mailToName);
            if(is_array($recipients) && count($recipients) > 0){
                $message->cc($recipients);
            }
            $message->replyTo(config('app.mail_from'), config('app.name'));
            $message->subject($subject);
        });
    }

    public static function randomCharacters(int $length, string $characters): string
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function noImageUser(): string
    {
        return config('app.app_url').'/images/no-image-user.png';
    }

    public static function getUserFromToken($token): array
    {
        $data = PersonalAccessToken::findToken($token)->tokenable;
        return [
            'success' => true,
            'user' => $data,
        ];
    }

}
