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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $student = Student::all();

        return response()->json($student);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function find($id){
        $student = Student::findOrFail($id);

        return response()->json($student);
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

        return response()->json($student);
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

        $student = Student::findOrFail($id);

        $updated = $student->update($request->all());

        return response()->json(['Updated: ' => $updated]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id){
        $count = Student::findOrFail($id);
        $count->destroy($id);

        return response()->json(['Deleted: ' => $count]);
    }


}