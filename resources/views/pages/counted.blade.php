@extends('layouts.begin_back')

@section('title', 'Angka Terbilang')

@section('menu_counted', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Angka Terbilang</b></h1>
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
                        <div class="card-header">
                            <form action="{{ route('counted.process') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="number" name="number" min="0" class="form-control" placeholder="Masukkan Angka" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-block btn-success">Proses</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            @if (session()->has('number'))
                            Angka : {{ session()->get('number') }}
                            @endif
                            <br>
                            @if (session()->has('result'))
                            Terbilang : {{ session()->get('result') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection