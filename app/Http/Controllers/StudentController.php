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
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller;
use App\Http\Controllers\JsonResponse;

class StudentController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        Log::info("Inside get all resources method");
        $student = Student::all();
        Log::info("Successfully finished get all resources method");
        return response()->json(JsonResponse::response(true, 'Get all resources successful', $student));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function find($id)
    {
        Log::info("Inside get one resource method");
        try {
            $student = Student::findOrFail($id);
            Log::info("Successfully finished get one resource method by ID: $id");
            return response()->json(JsonResponse::response(true, "Get resource by id: $id successful", $student));
        } catch (ModelNotFoundException $e) {
            Log::warning("Invalid ID: $id in get one resource method");
            return response()->json(JsonResponse::response(false, "ID: $id doesn't exist", $e->getMessage()), 404);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        Log::info("Inside create resource method");
        try {
            $this->validate($request, [
                'name' => 'required',
                'surname' => 'required',
                'indexno' => 'digits:6|required|unique:student,indexno'
            ]);

            $student = Student::create($request->all());
            Log::info("Creation of resource successful");
            return response()->json(JsonResponse::response(true, 'Creation of resource successful', $student));
        } catch (ValidationException $e) {
            Log::warning('Validation error in create resource method');
            return response()->json(JsonResponse::response(false, 'Validation error', json_decode($e->getResponse()->getContent())), 400);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Log::info("Inside update resource method");
        try {
            $this->validate($request, [
                'name' => 'required',
                'surname' => 'required',
                'indexno' => 'digits:6|required|unique:student,indexno'
            ]);

            $student = Student::findOrFail($id);

            $student->update($request->all());
            Log::info("Updated resource with ID: $id");
            return response()->json(JsonResponse::response(true, "Updated resource with ID: $id", $student));
        } catch (ModelNotFoundException $e) {
            Log::warning("Invalid ID: $id in update resource method");
            return response()->json(JsonResponse::response(false, "ID: $id doesn't exist", $e->getMessage()), 404);
        } catch (ValidationException $e) {
            Log::warning("Validation error in update resource method");
            return response()->json(JsonResponse::response(false, 'Validation error', json_decode($e->getResponse()->getContent())), 400);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function delete($id)
    {
        Log::info("Inside delete resource method");
        try {
            $count = Student::findOrFail($id);
            $count->destroy($id);
            Log::info("Deleted resource with ID: $id");
            return response()->json(JsonResponse::response(true, "Deleted resource with ID: $id", $count));
        } catch (ModelNotFoundException $e) {
            Log::warning("Invalid ID: $id in delete resource method");
            return response()->json(JsonResponse::response(false, "ID: $id doesn't exist", $e->getMessage()), 404);
        }
    }


}