<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\PostModel;

class UserModel extends MyModel
{
    use HasFactory;

    protected $table = 'users';

    function PostModel() {
        return $this->hasMany('App\Models\PostModel', 'id');
    }

    public function search($value) {
        $db = DB::table($this->table);
        $db->where('full_name', 'like', '%' . $value . '%');
        $db->orWhere('email', 'like', '%' . $value . '%');
        $db->orWhere('phone', 'like', '%' . $value . '%');
        $result = $db->get();
        return $result;
    }
}
