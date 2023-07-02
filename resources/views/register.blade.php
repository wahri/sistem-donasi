@extends('layouts.app')

@section('content')
    <section class="donate-section">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mx-auto">
                    <form class="custom-form donate-form" action="{{ route('authenticate') }}" method="POST" role="form">
                        @csrf
                        <div class="d-grid gap-2">
                            <a class="btn btn-success" href="{{ route('contributor_register') }}">Daftar sebagai
                                donatur</a>
                            <a class="btn btn-info text-white btn-block" href="{{ route('institution_register') }}">Daftar
                                sebagai penerima</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
