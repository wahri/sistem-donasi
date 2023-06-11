@extends('layouts.app')

@section('content')
    <section class="news-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="custom-form donate-form" action="{{ route('updateProfile') }}"
                                method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 col-12 text-center">
                                        <h5 class="mt-1">Profil Akun</h5>
                                    </div>

                                    <div class="col-lg-12 col-12 mt-3">
                                        <label for="company" class="form-label">Nama Institusi</label>
                                        <input type="text" name="company" id="company" class="form-control"
                                            placeholder="Nama Institusi" value="{{ old('company', $user->profile->company) }}">
                                    </div>
                                    <div class="col-lg-12 col-12 mt-3">
                                        <label for="address" class="form-label">Alamat Institusi</label>
                                        <textarea class="form-control" name="address" id="address" rows="2" placeholder="Alamat Institusi">{{ old('address',$user->profile->address) }}</textarea>
                                    </div>

                                    <div class="col-lg-6 col-12 mt-3">
                                        <label for="name" class="form-label">Nama CP/Narahubung</label>
                                        <input type="text" name="name" id="name" value="{{ old('name',$user->name) }}" class="form-control"
                                            placeholder="Nama CP/Narahubung">
                                    </div>

                                    <div class="col-lg-6 col-12 mt-3">
                                        <label for="phone" class="form-label">Nomor HP / Whatsapp</label>
                                        <input type="text" name="phone" id="phone" value="{{ old('phone',$user->profile->phone) }}" class="form-control"
                                            placeholder="Nomor HP / Whatsapp">
                                    </div>

                                    <div class="col-lg-12 col-12 mt-2">
                                        <button type="submit" class="btn btn-info mt-4">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
