@extends('layouts.app')

@section('content')
    <section class="news-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-12">
                    <div class="news-block">
                        <div class="news-block-top">
                            <img src="{{ asset('storage/' . $donation->image) }}" class="news-image img-fluid" alt="">

                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-12 mx-auto mt-4 mt-lg-0">
                    <div class="news-block-info">
                        <div class="d-flex mt-2">
                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    {{ date('d F Y', strtotime($donation->created_at)) }}
                                </p>
                            </div>

                            <div class="news-block-author mx-5">
                                <p>
                                    <i class="bi-person custom-icon me-1"></i>
                                    Oleh {{ $donation->user->profile->company }}
                                </p>

                            </div>
                        </div>

                        <div class="news-block-title mb-2">
                            <h4>{{ $donation->name }}</h4>

                        </div>

                        <div class="news-block-body">
                            {!! $donation->description !!}

                            <p>
                                <strong>Kadaluarsa pada tanggal:
                                </strong>{{ date('d F Y', strtotime($donation->expired_donation)) }}
                            </p>

                            <p>
                                <strong>Alamat: </strong><br>{{ $donation->user->profile->address }}
                            </p>
                            <p>
                                <strong>Stok: </strong>{{ $donation->stock }}
                            </p>
                        </div>
                        @guest
                            <div class="row border-top pt-3">
                                <div class="col-12">
                                    <a href="{{ route('filament.auth.login') }}" class="btn btn-sm custom-btn">
                                        Silahkan login dahulu
                                    </a>
                                </div>
                            </div>
                        @else
                            @if (!$checkRequest)
                                <form action="{{ route('requestDonation') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="donation_id" value="{{ $donation->id }}">
                                    <div class="row border-top pt-3">
                                        <div class="col-8">
                                            <label for="quantity" class="col-form-label">
                                                <p>
                                                    <strong>
                                                        Jumlah permintaan:
                                                    </strong>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="col-4">
                                            <div class="input-group input-group-sm">
                                                <input class="quantity form-control" type="number" id="quantity"
                                                    name="quantity" min="1" max="{{ $donation->stock }}" required>
                                                <span class="input-group-text custom-btn">{{ $donation->unit }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <textarea name="comment" id="comment" rows="2" class="form-control" placeholder="Tuliskan pesan jika ada"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-sm custom-btn">
                                                Dapatkan Donasi
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="row border-top pt-3">
                                    <div class="col-12">
                                        <button class="btn btn-sm custom-btn" disabled>
                                            Menunggu persetujuan
                                        </button>
                                    </div>
                                </div>
                            @endif

                        @endguest


                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.getElementsByClassName('quantity')[0].oninput = function() {
            var max = parseInt(this.max);
            var min = parseInt(this.min);

            if (parseInt(this.value) > max) {
                this.value = max;
            }
            if (parseInt(this.value) < 1) {
                this.value = min;
            }
        }
    </script>
    <!-- sponsor section -->
@endsection
