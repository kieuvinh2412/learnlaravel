<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;

class UsersController extends Controller
{
    //
    private $usersModel;
    public $data = [];
    

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }
    
    public function index() {
        $this->data['users'] = $this->usersModel->getAllUsers();
        $this->data['pageTitle'] = 'Quản lý tài khoản';
        return view('admin.users.index', $this->data);
    }

    public function add() {
        $this->data['pageTitle'] = 'Thêm mới tài khoản';
        return view('admin.users.add', $this->data);
    }

    public function postAdd(Request $request) {
        $request->validate([
            'full_name' => 'required|min:3',
            'phone' => 'required|min:8|numeric',
            'email' => 'required|email|unique:users'
        ], [
            'full_name.required' => ':attribute cần phải nhập',
            'full_name.min' => ':attribute phải từ :min ký tự trở lên',
            'email.email' => 'Email không đúng định dạng'
        ]);

        $dataInsert = [
            $request->full_name,
            $request->phone, 
            $request->email, 
            md5('123456987')
        ];
        $this->usersModel->add($dataInsert);
        return redirect()->route('users.index')->with('message', 'Thêm tài khoản thành công');
    }

    public function edit($id) {

    }
}
