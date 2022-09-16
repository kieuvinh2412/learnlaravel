@extends('layouts.admin')
@section('page-title')
{{$pageTitle}}
@endsection
@section('main-content')
    <div class="section-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col p-3">
                    <h2>Thêm tài khoản</h2>
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="{{route('users.postEdit')}}" class="form" method="POST">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Họ tên</label>
                            <input type="text" name="full_name" class="form-control" id="inputName" required value="{{$user ? $user->full_name : old('full_name')}}" />
                            @error('full_name')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="inputPhone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="inputPhone" required value="{{$user ? $user->phone : old('phone')}}" />
                            @error('phone')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>                            
                            <input type="email" name="email" class="form-control" id="inputEmail" required value="{{$user ? $user->email : old('email')}}" />
                            @error('email')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <input type="submit" name="update" value="Lưu tài khoản" class="btn btn-primary btn-sm" />
                            <a href="{{route('users.index')}}" class="btn btn-sm btn-warning">Quay lại</a>
                          </div>
                          <input type="hidden" name="id" value="{{$user ? $user->id : 0}}">
                          @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection