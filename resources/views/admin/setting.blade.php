@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pengaturan Akun</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('changePassword') }}" method="post">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('current_password'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ $errors->first('current_password') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('new_password'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ $errors->first('new_password') }}
                                        </div>
                                    @endif
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="username"
                                                value="{{ $user->username }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="current_password" class="col-sm-2 col-form-label">Password Saat
                                            Ini</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="new_password" class="col-sm-2 col-form-label">Password Baru</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <button class="btn btn-primary ml-2" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection
