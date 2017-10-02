<?php
/**
 * Created by PhpStorm.
 * User: ilija.savic
 * Date: 9/29/2017
 * Time: 11:47 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = ['name', 'surname', 'indexno', 'address'];

}