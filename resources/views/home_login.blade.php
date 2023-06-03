@extends('layouts.app')

@section('content')
    <section class="donate-section">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mx-auto">
                    <form class="custom-form donate-form" action="{{ route('authenticate') }}" method="POST" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-12 text-center">
                                <h5 class="mb-3">Login</h5>
                            </div>

                            {{-- <div class="col-lg-6 col-6 form-check-group form-check-group-donation-frequency">
                            <div class="form-check form-check-radio">
                                <input class="form-check-input" type="radio" name="Role"
                                    id="RoleInstitution" checked>

                                <label class="form-check-label" for="RoleInstitution">
                                    Institution
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6 form-check-group form-check-group-donation-frequency">
                            <div class="form-check form-check-radio">
                                <input class="form-check-input" type="radio" name="Role"
                                    id="RoleContributor">

                                <label class="form-check-label" for="RoleContributor">
                                    Contributor
                                </label>
                            </div>
                        </div> --}}

                            {{-- <div class="col-lg-12 col-12 text-center">
                            <h5 class="mt-1">Credential</h5>
                        </div> --}}

                            <div class="col-lg-12 col-12 mt-2">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                    required>
                            </div>

                            <div class="col-lg-12 col-12 mt-2">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>

                            <div class="col-lg-12 col-12 mt-2">

                                <button type="submit" class="form-control mt-4">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
