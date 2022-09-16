<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;


class UsersController extends Controller
{
    //
    private $userModel;

    public $data = [];
    

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index() {
        $this->data['users'] = $this->userModel->getItems('users');
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
            'full_name' => $request->full_name,
            'phone' => $request->phone, 
            'email' => $request->email, 
            'password' => bcrypt('123456789')
        ];
        $result = $this->userModel->insertItem('users', $dataInsert);
        if ($result > 0) {
            return redirect()->route('users.index')->with('message', 'Thêm tài khoản thành công');
        } else {
            return redirect()->route('users.index')->with('message', 'Thêm tài khoản không thành công');
        }
    }

    public function edit($id) {
        $this->data['pageTitle'] = 'Thêm mới tài khoản';
        $this->data['user'] = $this->userModel->getItem('users', '', ['id' => $id]);
        return view('admin.users.edit', $this->data);
    }

    public function postEdit(Request $request) {
        $request->validate([
            'full_name' => 'required|min:3',
            'phone' => 'required|min:8|numeric',
            'email' => 'required|email'
        ], [
            'full_name.required' => ':attribute cần phải nhập',
            'full_name.min' => ':attribute phải từ :min ký tự trở lên',
            'email.email' => 'Email không đúng định dạng'
        ]);

        $data = [
            'full_name' => $request->full_name,
            'phone' => $request->phone, 
            'email' => $request->email
        ];
        $result = $this->userModel->updateItem('users', $data, ['id' => $request->id]);
        if ($result > 0) {
            return redirect()->route('users.index')->with('message', 'Đã sửa thông tin tài khoản');
        } else {
            return redirect()->route('users.index')->with('message', 'Sửa tài khoản không thành công');
        }
    }

    public function delete($id) {
        $result = $this->userModel->deleteItem('users', ['id' => $id]);
        if ($result > 0) {
            return redirect()->route('users.index')->with('message', 'Đã xóa tài khoản');
        } else {
            return redirect()->route('users.index')->with('message', 'Xóa tài khoản không thành công');
        }
    }

    public function ajaxSearch(Request $request) {
        $search = '';
        if (isset($request->search)) {
            $search = $request->search;
        }
        $this->data['users'] = $this->userModel->search($search);
        return view('admin.users.ajaxSearch', $this->data);
    }

    public function test(Request $request) {
        //$posts = UserModel::find(1)->PostModel;
        //print_r($posts);
        // $count = $request->session()->get('count');
        // if (empty($count)) {
        //     $count = 0;
        // }
        // $count++;
        // $request->session()->put('count', $count);
        // echo $count;

        $request->session()->flash('message', 'Thêm sản phẩm thành công');
        echo $request->session()->get('message');
    }
}
