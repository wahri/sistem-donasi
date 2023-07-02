@extends('layouts.app')

@section('content')
<section class="contact-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                        <div class="contact-info-wrap">
                            <h2>Hubungi kami</h2>

                            <div class="contact-image-wrap d-flex flex-wrap">
                                <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
                                    class="img-fluid avatar-image" alt="">

                                <div class="d-flex flex-column justify-content-center ms-3">
                                    <p class="mb-0">Muh Zufar Al Rafif</p>
                                    <p class="mb-0"><strong>HR & Office Manager</strong></p>
                                </div>
                            </div>

                            <div class="contact-info">
                                <h5 class="mb-3">Informasi Kontak</h5>

                                <p class="d-flex mb-2">
                                    <i class="bi-geo-alt me-2"></i>
                                    Jl Kaliurang 14.5, Jogjakarta, Indonesia
                                </p>

                                <p class="d-flex mb-2">
                                    <i class="bi-telephone me-2"></i>

                                    <a href="tel: 0812-7563-4571">
                                        0812-7563-4571
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <i class="bi-envelope me-2"></i>

                                    <a href="mailto:info@yourgmail.com">
                                    donate@berbagimakan.com
                                    </a>
                                </p>

                                <a href="#" class="custom-btn btn mt-3">Dapatkan Arah</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mx-auto">
                        <form class="custom-form contact-form" action="#" method="post" role="form">
                            <h2>Formulir kontak</h2>

                            <p class="mb-4">Atau, Kamu bisa mengirim email:
                                <a href="#">info@berbagimakan.com</a>
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="first-name" id="first-name" class="form-control"
                                        placeholder="Ketrin" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="text" name="last-name" id="last-name" class="form-control"
                                        placeholder="Novita" required>
                                </div>
                            </div>

                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                                placeholder="ketnovita@gmail.com" required>

                            <textarea name="message" rows="5" class="form-control" id="message"
                                placeholder="Apa yang bisa kami bantu?"></textarea>

                            <button type="submit" class="form-control">Kirim Pesan</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

@endsection
