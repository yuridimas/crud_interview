@extends('layouts.begin_back')

@section('title', 'Pengguna')

@section('menu_users', 'active')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><b>Daftar</b> - Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('users.create') }}" class="btn btn-success">Buat baru</a></li>
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
                        <div class="table-responsive">
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="40%">Nama</th>
                                        <th width="40%">Email</th>
                                        <th width="15%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@push('footer-script')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('back/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@prepend('footer-script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('back/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
            var datatable = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "email",
                        name: 'email',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ]
            });

            datatable.on('click', '.delete-users', function(e) {
                var id = $(this).data('id');

                swal.fire({
                    title: 'Hapus Pengguna',
                    text: 'Apakah Anda yakin ingin menghapus Pengguna ini ?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal!',
                    confirmButtonClass: 'btn btn-danger',
                    cancelButtonClass: 'btn btn-link',
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                                method: 'POST',
                                dataType: 'json',
                                url: "{{ route('users.destroy', '') }}" + "/" + id,
                                data: {
                                    _method: "DELETE",
                                    _token: "{{ csrf_token() }}",
                                },
                            })
                            .done(function(response) {
                                if (response.status == true) {
                                    swal.fire({
                                        title: 'Yeay!',
                                        text: response.message,
                                        icon: 'success',
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                    datatable.ajax.reload();
                                } else if (response.status == false) {
                                    swal.fire({
                                        title: 'Auch!',
                                        text: response.message,
                                        icon: 'error',
                                        showConfirmButton: false
                                    });
                                    location.reload();
                                }
                            })
                    }
                });
            });
        })
</script>
@endprepend