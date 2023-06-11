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
                            @if ($donation->stock > 0)
                                @role('Institution')
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
                                    @elseif ($getRequest->status == 0)
                                        <div class="row border-top pt-3">
                                            <div class="col-12">
                                                <button class="btn btn-sm custom-btn" disabled>
                                                    Menunggu persetujuan
                                                </button>
                                            </div>
                                        </div>
                                    @elseif ($getRequest->status == 1)
                                        <div class="row border-top pt-3">
                                            <div class="col-12">
                                                <a href="https://api.whatsapp.com/send?phone={{ $donation->user->profile->phone }}&text=Hai%20saya%20dari%20{{ $loginUser->profile->company }}%20ingin%20konfirmasi%20permintaan%20donasi"
                                                    class="btn btn-success">
                                                    <i class="social-icon-item bi-whatsapp"></i>
                                                    Permintaan disetujui, silahkan konfirmasi
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endrole
                            @endif
                        @endguest


                    </div>
                </div>

            </div>
        </div>
    </section>

    @if ($checkOwner)
        <section class="news-section section-padding">
            <div class="container">
                <div class="row border-top">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Institusi</th>
                                    <th scope="col">Jumlah Permintaan</th>
                                    <th scope="col">Komen</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestDonations as $request)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $request->user->profile->company }}</td>
                                        <td>{{ $request->quantity }}</td>
                                        <td>{{ $request->comment }}</td>
                                        @if ($request->status == 0)
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('requestConfirmation', $request->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">
                                                        Konfirmasi donasi
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <button disabled="disabled" class="btn btn-secondary">
                                                    Sudah disetujui
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

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
