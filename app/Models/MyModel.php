<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyModel extends Model
{
    use HasFactory;

    // Lấy 1 bản ghi trong bảng 
    // $select có thể là chuỗi các trường cần lấy ngăn cách nhau bởi dấu phảy ,
    // $select mặc định là mảng các trường cần lấy 
    // $where là mảng các cặp trường, giá trị 
    public function getItem($table, $select = NULL, $where = NULL) {
        $db = DB::table($table);
        if (!empty($select)) {
            // Nếu $select là chuỗi thì chuyển thành mảng các trường cần lấy thông tin 
            if (is_string($select)) {
                $select = explode(',', $select);
                $select = array_map('trim', $select);
            }
            $db->select($select);
        }
        if (!empty($where)) {
            $db->where($where);
        }        
        $result = $db->get()->first();
        return $result;
    }

    // Lấy n bản ghi trong bảng 
    // $select có thể là chuỗi các trường cần lấy ngăn cách nhau bởi dấu phảy ,
    // $select mặc định là mảng các trường cần lấy 
    // $where là mảng các cặp trường, giá trị 
    public function getItems($table, $select = NULL, $where = NULL, $orderBy = NULL, $direction = 'asc', $offset = 0, $limit = 50) {
        $db = DB::table($table);
        if (!empty($select)) {
            // Nếu $select là chuỗi thì chuyển thành mảng các trường cần lấy thông tin 
            if (is_string($select)) {
                $select = explode(',', $select);
                $select = array_map('trim', $select);
            }
            $db->select($select);
        }
        if (!empty($where)) {
            $db->where($where);
        }
        if (!empty($orderBy)) {
            $db->orderBy($orderBy, $direction);
        }
        $db->offset($offset)->limit($limit);
        $result = $db->get();
        return $result;
    }

    public function insertItem($table, $dataInsert, $returnKey = TRUE) {
        if ($returnKey == TRUE) {
            $result = DB::table($table)->insertGetId($dataInsert);    
        } else {
            $result = DB::table($table)->insert($dataInsert);    
        }
        return $result;
    }

    public function updateItem($table, $dataUpdate, $where) {
        $result = DB::table($table)->where($where)->update($dataUpdate);
        return $result;
    }

    public function deleteItem($table, $where) {
        $result = DB::table($table)->where($where)->delete();
        return $result;
    }


}
