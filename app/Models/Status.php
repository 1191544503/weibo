<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Status extends Model
{
    //
    protected $table='statuses';
    protected $fillable=['content'];
    public function user(){
        return  $this->belongsTo(User::class);
    }

}
