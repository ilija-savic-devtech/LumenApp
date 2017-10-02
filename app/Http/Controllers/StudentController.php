<?php
/**
 * Created by PhpStorm.
 * User: ilija.savic
 * Date: 10/2/2017
 * Time: 2:21 PM
 */

namespace App\Http\Controllers;


use App\Student;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class StudentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $student = Student::create($request->all());

        return response()->json($student);
    }


}