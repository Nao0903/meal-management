<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //使用できるカラムを絞る
    protected $fillable = ['date','kind','content','calorie'];

    //一(users)対多(meals)の関係
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}

