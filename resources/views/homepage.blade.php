@extends('layouts.app')

@section('content')
    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/slide/volunteer-helping-with-donation-box.jpg"
                                    class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>be a Kind Heart</h1>

                                    <p>Professional charity theme based on Bootstrap 5.2.2</p>
                                </div>
                            </div>
                        </div>

                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="section-padding section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">Selamat Datang</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="#section_3" class="d-block">
                            <img src="images/icons/food-donation.png" class="featured-block-image img-fluid" alt=""
                                style="height: 100px">

                            <p class="featured-block-text">Cari <strong>Donasi</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="{{ route('contributor_register') }}" class="d-block">
                            <img src="images/icons/receive.png" class="featured-block-image img-fluid" alt=""
                                style="height: 100px">

                            <p class="featured-block-text">Donasi <strong>Makanan</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="images/icons/hands.png" class="featured-block-image img-fluid" alt=""
                                style="height: 100px">

                            <p class="featured-block-text">Jadi <strong>Relawan</strong></p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

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

    <section class="volunteer-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="text-white mb-4">Volunteer</h2>

                    <form class="custom-form volunteer-form mb-5 mb-lg-0" action="#" method="post" role="form">
                        <h3 class="mb-4">Become a volunteer today</h3>

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-name" id="volunteer-name" class="form-control"
                                    placeholder="Jack Doe" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="email" name="volunteer-email" id="volunteer-email" pattern="[^ @]*@[^ @]*"
                                    class="form-control" placeholder="Jackdoe@gmail.com" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-subject" id="volunteer-subject" class="form-control"
                                    placeholder="Subject" required>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="input-group input-group-file">
                                    <input type="file" class="form-control" id="inputGroupFile02">

                                    <label class="input-group-text" for="inputGroupFile02">Upload your CV</label>

                                    <i class="bi-cloud-arrow-up ms-auto"></i>
                                </div>
                            </div>
                        </div>

                        <textarea name="volunteer-message" rows="3" class="form-control" id="volunteer-message"
                            placeholder="Comment (Optional)"></textarea>

                        <button type="submit" class="form-control">Submit</button>
                    </form>
                </div>

                <div class="col-lg-6 col-12">
                    <img src="images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg"
                        class="volunteer-image img-fluid" alt="">

                    <div class="custom-block-body text-center">
                        <h4 class="text-white mt-lg-3 mb-lg-3">About Volunteering</h4>

                        <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm
                            tokito Professional charity theme based</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="sponsor-section" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Sponsor</h2>
                </div>

                <div id="sponsor-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor1.png') }}"
                                        alt="Sponsor 1">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor2.png') }}"
                                        alt="Sponsor 2">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor3.png') }}"
                                        alt="Sponsor 3">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor1.png') }}"
                                        alt="Sponsor 1">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor2.png') }}"
                                        alt="Sponsor 2">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor3.png') }}"
                                        alt="Sponsor 3">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor1.png') }}"
                                        alt="Sponsor 1">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor2.png') }}"
                                        alt="Sponsor 2">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor3.png') }}"
                                        alt="Sponsor 3">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor1.png') }}"
                                        alt="Sponsor 1">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor2.png') }}"
                                        alt="Sponsor 2">
                                </div>
                                <div class="col-md-2 text-center">
                                    <img class="sponsor-image" src="{{ asset('images/sponsor/sponsor3.png') }}"
                                        alt="Sponsor 3">
                                </div>
                            </div>
                        </div>
                        <!-- Add more carousel items as needed -->
                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#sponsor-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#sponsor-carousel" data-slide-to="1"></li>
                        <!-- Add more indicators as needed -->
                    </ol>
                </div>

            </div>
        </div>
    </section>




    <!-- sponsor section -->
@endsection
