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
                    <form action="{{route('users.postAdd')}}" class="form" method="POST">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Họ tên</label>
                            <input type="text" name="full_name" class="form-control" id="inputName" required value="{{old('full_name')}}" />
                            @error('full_name')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="inputPhone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="inputPhone" required value="{{old('phone')}}" />
                            @error('phone')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>                            
                            <input type="email" name="email" class="form-control" id="inputEmail" required value="{{old('email')}}" />
                            @error('email')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <input type="submit" name="create" value="Thêm tài khoản" class="btn btn-primary btn-sm" />
                            <a href="{{route('users.index')}}" class="btn btn-sm btn-warning">Quay lại</a>
                          </div>
                          @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection