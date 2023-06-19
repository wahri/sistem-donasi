@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail User</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Institusi</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    Username
                                                </td>
                                                <td width="10px">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $user->username }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nama
                                                </td>
                                                <td width="10px">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nama Institusi
                                                </td>
                                                <td width="10px">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $user->profile->company }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Alamat
                                                </td>
                                                <td width="10px">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $user->profile->address }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Nomor Narahubung
                                                </td>
                                                <td width="10px">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $user->profile->phone }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid gap-2">
                                            <a target="_blank" href="{{ asset('document/' . $user->profile->document) }}"
                                                class="btn btn-info">
                                                Unduh Berkas
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @if ($user->status == 0)
                                    <div class="row mt-3">
                                        <div class="col-12 d-flex">
                                            <a href="{{ route('dashboard.user.index') }}" class="btn btn-secondary">
                                                Batal
                                            </a>
                                            <form action="{{ route('accountConfirmation', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success ml-3">
                                                    Konfirmasi Akun
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#dataUser').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
