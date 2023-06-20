@extends('layouts.app')

@section('content')
    <section class="news-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="custom-form donate-form" action="{{ route('updateProfile') }}" method="POST"
                                role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 col-12 text-center">
                                        <h5 class="mt-1">Profil Akun</h5>
                                    </div>

                                    <div class="col-lg-12 col-12 mt-3">
                                        <label for="company" class="form-label">Username</label>
                                        <input type="text" class="form-control" placeholder="Nama Institusi" readonly
                                            value="{{ $user->username }}">
                                    </div>
                                    <div class="col-lg-12 col-12 mt-3">
                                        <label for="company" class="form-label">Nama Institusi</label>
                                        <input type="text" name="company" id="company" class="form-control"
                                            placeholder="Nama Institusi"
                                            value="{{ old('company', $user->profile->company) }}">
                                    </div>
                                    <div class="col-lg-12 col-12 mt-3">
                                        <label for="address" class="form-label">Alamat Institusi</label>
                                        <textarea class="form-control" name="address" id="address" rows="2" placeholder="Alamat Institusi">{{ old('address', $user->profile->address) }}</textarea>
                                    </div>

                                    <div class="col-lg-6 col-12 mt-3">
                                        <label for="name" class="form-label">Nama CP/Narahubung</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $user->name) }}" class="form-control"
                                            placeholder="Nama CP/Narahubung">
                                    </div>

                                    <div class="col-lg-6 col-12 mt-3">
                                        <label for="phone" class="form-label">Nomor HP / Whatsapp</label>
                                        <input type="text" name="phone" id="phone"
                                            value="{{ old('phone', $user->profile->phone) }}" class="form-control"
                                            placeholder="Nomor HP / Whatsapp">
                                    </div>

                                    <div class="col-lg-12 col-12 mt-2">
                                        <button type="submit" class="btn btn-info mt-4">Update Profile</button>
                                    </div>
                                </div>
                            </form>

                            <hr>

                            <form class="custom-form donate-form" action="{{ route('changePassword') }}" method="post">
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
                                @csrf
                                <div class="col-lg-12 col-12 mt-3">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control">
                                </div>
                                <div class="col-lg-12 col-12 mt-3">
                                    <label for="new_password" class="form-label">Password Baru</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                </div>
                                <div class="col-lg-12 col-12 mt-2">
                                    <button type="submit" class="btn btn-info mt-4">Ubah Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
