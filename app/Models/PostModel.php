<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostModel extends MyModel
{
    use HasFactory;

    protected $table = 'users';

    function UserModel() {
        return $this->belongsTo('App\Models\UserModel', 'user_id');
    }

    public function search($value) {

    }
}
