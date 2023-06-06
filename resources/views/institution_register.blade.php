@extends('layouts.app')

@section('content')
<section class="donate-section">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 mx-auto">
                <form class="custom-form donate-form" action="{{ route('contributor_register_process') }}" method="POST"
                    role="form">
                    @csrf
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h5 class="mt-1">Daftar untuk mendapatkan donasi</h5>
                        </div>

                        <div class="col-lg-12 col-12 mt-3">
                            <input type="text" name="company" id="company" class="form-control"
                                placeholder="Nama Perusahaan/Restoran/Warung/" required>
                        </div>
                        <div class="col-lg-12 col-12 mt-3">
                                <textarea class="form-control" name="address" id="address" rows="2" placeholder="Alamat Perusahaan/Restoran/Warung" required></textarea>
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Nama CP/Narahubung" required>
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Nomor HP / Whatsapp" required>
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <input type="email" name="email" id="donation-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Email" required>
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required>
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