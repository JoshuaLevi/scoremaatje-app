<?php
//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//
//class Exercise extends Model
//{
//    use HasFactory;
//
//    protected $fillable = [
//        'name',
//        'username',
//        'muscle',
//        'description'
//    ];
//
//    public static function create(array $data)
//    {
//    }
//}


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'muscle',
        'description'
    ];
}
