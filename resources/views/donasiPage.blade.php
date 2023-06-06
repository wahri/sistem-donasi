@extends('layouts.app')

@section('content')
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                {{-- <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Donation</h2>
            </div> --}}


                @forelse ($donations as $donation)
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="custom-block-wrap">
                            <img src="{{ asset('storage/' . $donation->image) }}" class="custom-block-image img-fluid"
                                alt="" style="height: 150px; object-fit: cover">

                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <h5 class="mb-1">{{ $donation->name }}</h5>

                                    <div class="d-flex align-items-center my-1">
                                        <p class="mb-0">
                                            <strong>Stok:</strong>
                                            {{ $donation->stock . ' ' . $donation->unit }}
                                        </p>
                                    </div>
                                </div>

                                <a href="{{ route('detailDonasi', $donation->id) }}" class="custom-btn btn">Dapatkan
                                    Donasi</a>
                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h2>Belum Ada Donasi</h2>
                    </div>
                @endforelse


            </div>
        </div>
    </section>

    <!-- sponsor section -->
@endsection
