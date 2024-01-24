<?php

//Create an eloquent model class
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employer extends Model
{
    protected $table = 'employers';
    //Define attributes that can be batch assigned
    protected $fillable = ['user', 'pass'];
}
/**
 * 在使用 create 方法之前，你需要在模型类上指定 fillable 或 guarded 属性。
 * 这些属性是必需的，因为默认情况下，所有 Eloquent 模型都受到保护，免受批量赋值漏洞的影响。
 */

