<?php
/**
 * Created by PhpStorm.
 * User: ilija.savic
 * Date: 10/3/2017
 * Time: 4:28 PM
 */

namespace App\Http\Controllers;


class JsonResponse
{
    public static function response($success, $message, $data = []){

            $customData = [
                'success' => $success,
                'message' => $message,
                'data' => $data
            ];
            return $customData;
    }
}