<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers() {
        $users = DB::select("SELECT * FROM users");
        return $users;
    }

    public function add($data) {
        DB::insert("INSERT INTO users (full_name, phone, email, password) VALUES (?, ?, ?, ?)", $data);
    }

    
}
