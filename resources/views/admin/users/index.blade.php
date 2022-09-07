@extends('layouts.admin')
@section('page-title')
{{$pageTitle}}
@endsection
@section('main-content')
    <div class="section-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col p-3">
                    <h2>Danh sách tài khoản</h2>
                    <div><a href="{{route('users.add')}}">Thêm tài khoản</a></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($users))
                            @php
                            $i = 1;    
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{route('users.edit', ['id' => $user->user_id])}}" class="btn btn-sm btn-info">Sửa</a></td>
                                </tr>
                                @php
                                $i++;    
                                @endphp
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection