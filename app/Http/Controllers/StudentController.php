<?php
/**
 * Created by PhpStorm.
 * User: ilija.savic
 * Date: 10/2/2017
 * Time: 2:21 PM
 */

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class StudentController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $student = Student::all();

        return response()->json(JsonResponse::response(true, 'Get all resources successful', $student));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function find($id){
        try {
            $student = Student::findOrFail($id);

            return response()->json(JsonResponse::response(true, "Get resource by id: $id successful", $student));
        } catch(ModelNotFoundException $e){
            return response()->json(JsonResponse::response(false, "Id doesn't exist"));
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'indexno' => 'unique:student,indexno'
        ]);

        $student = Student::create($request->all());

        return response()->json(JsonResponse::response(true, 'Creation of resource successful', $student));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){

        $this->validate($request, [
           'name' => 'required',
            'surname' => 'required',
            'indexno' => 'unique:student,indexno'
        ]);
        try {
            $student = Student::findOrFail($id);

            $student->update($request->all());

            return response()->json(JsonResponse::response(true, "Updated resource with id: $id"));
        } catch(ModelNotFoundException $e){
            return response()->json(JsonResponse::response(false, "Id doesn't exist"));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function delete($id){
        try {
            $count = Student::findOrFail($id);
            $count->destroy($id);

            return response()->json(JsonResponse::response(true, "Deleted resource with id: $id"));
        } catch (ModelNotFoundException $e){
            return response()->json(JsonResponse::response(false, "Id doesn't exist"));
        }
    }


}