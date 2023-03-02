@extends('layouts.begin_back')

@section('title', 'Pengguna')

@section('menu_users', 'active')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><b>Lihat</b> - Pengguna</h1>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">Nama</div>
                            <div class="col-sm-10">{{ $data->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">Email</div>
                            <div class="col-sm-10">{{ $data->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">Dibuat pada</div>
                            <div class="col-sm-10">{{ $data->created_at->isoFormat('LLLL') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">Diperbarui pada</div>
                            <div class="col-sm-10">{{ $data->updated_at->isoFormat('LLLL') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection