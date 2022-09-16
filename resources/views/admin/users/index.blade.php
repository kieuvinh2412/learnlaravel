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
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <div><a href="{{route('users.add')}}">Thêm tài khoản</a></div>
                    <form id="form-search" action="" method="POST">
                        <div class="mb-3">
                            <input type="text" name="search" id="input-search" class="form-control">
                            <input type="button" value="Tìm kiếm" onclick="ajaxSearchUsers()" />
                          </div>
                        @csrf
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="ajax-result">
                            @if (!empty($users))
                            @php
                            $i = 1;    
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{route('users.edit', ['id' => $user->id])}}" class="btn btn-sm btn-info">Sửa</a></td>
                                    <td><a href="{{route('users.delete', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Xóa</a></td>
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
    <script>
        function ajaxSearchUsers() {
            $.ajax({
                type: 'POST',
                url: '{{route('users.ajaxSearch')}}',
                data: $("#form-search").serializeArray(),
                success: function(result) {
                    $("#ajax-result").html(result);
                }
            });
        }
    </script>
@endsection