@extends('layouts.app')

@section('content')
    <section class="donate-section">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mx-auto">
                    <form class="custom-form donate-form" action="{{ route('institution_register_process') }}" method="POST"
                        role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12 col-12 text-center">
                                <h5 class="mt-1">Daftar untuk mendapatkan donasi</h5>
                            </div>

                            <div class="col-lg-12 col-12 mt-3">
                                <input type="text" name="company" id="company" class="form-control"
                                    placeholder="Nama Institusi" required>
                            </div>
                            <div class="col-lg-12 col-12 mt-3">
                                <textarea class="form-control" name="address" id="address" rows="2"
                                    placeholder="Alamat Institusi" required></textarea>
                            </div>

                            <div class="col-lg-6 col-12 mt-3">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Nama CP/Narahubung" required>
                            </div>

                            <div class="col-lg-6 col-12 mt-3">
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Nomor HP / Whatsapp" required>
                            </div>

                            <div class="col-lg-12 col-12 mt-3">
                                <input type="username" name="username" id="username"
                                    class="form-control" placeholder="Username untuk login akun" required>
                            </div>

                            <div class="col-lg-12 col-12 mt-3">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                            <hr class="mt-3">
                            <div class="col-12 mt-3 text-center">
                                <label for="syaratDaftar" class="form-label">Upload berkas pendaftaran</label>
                                <input class="form-control" type="file" id="syaratDaftar" name="document">
                            </div>
                            <div class="col-lg-12 col-12 mt-2">

                                <button type="submit" class="form-control mt-4">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
