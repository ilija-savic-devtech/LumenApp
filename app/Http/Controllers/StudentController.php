<?php
/**
 * Created by PhpStorm.
 * User: ilija.savic
 * Date: 10/2/2017
 * Time: 2:21 PM
 */

namespace App\Http\Controllers;


use App\Student;
use Laravel\Lumen\Routing\Controller;

class StudentController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $student = Student::all();

        return response()->json($student);
    }


}