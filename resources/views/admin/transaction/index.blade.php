@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Transaksi</h1>
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
                                <h3 class="card-title">List transaksi donasi perusahaan</h3>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table id="dataUser" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Jumlah Donasi</th>
                                            <th>Jumlah Transaksi</th>
                                            {{-- <th width="15%" class="text-center">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTransaction as $i => $data)
                                            <tr>
                                                <td>
                                                    {{ $i + 1 }}
                                                </td>
                                                <td>
                                                    {{ $data['user']->profile->company }}
                                                </td>
                                                <td>
                                                    {{ $data['jumlah_donasi'] }}
                                                </td>
                                                <td>
                                                    {{ $data['jumlah_transaksi'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
