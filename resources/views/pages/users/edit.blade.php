@extends('layouts.begin_back')

@section('title', 'Pengguna')

@section('menu_users', 'active')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><b>Edit</b> - Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                    </li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <form action="{{ route('users.update',['user'=> $data]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-sm-12 col-form-label" for="name">
                                    Nama <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-sm-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nama"
                                        value="{{ old('name', $data->name) }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-sm-12 col-form-label" for="email">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-sm-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        value="{{ old('email', $data->email) }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection