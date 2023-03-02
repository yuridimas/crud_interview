@extends('layouts.begin_back')

@section('title', 'Swap Variable')

@section('menu_swap', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Swap Variable</b></h1>
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
                            <textarea id="codeMirrorDemo" class="p-3">
function swap($a, $b) {
    echo "Awal variable.<br>";
    echo "a = $a <br>";
    echo "b = $b <br>";

    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;

    echo "Hasil Swap.<br>";
    echo "a = $a <br>";
    echo "b = $b <br>";
}

swap(5, 3);
                        </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('footer-script')
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('back/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('back/plugins/codemirror/theme/monokai.css') }}">
@endpush

@prepend('footer-script')
    <!-- CodeMirror -->
    <script src="{{ asset('back/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('back/plugins/codemirror/mode/php/php.js') }}"></script>
    <script>
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "php",
            theme: "monokai"
        });
    </script>
@endprepend
