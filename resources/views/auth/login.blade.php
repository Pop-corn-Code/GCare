@extends('auth.app')

@section('title', 'Login')
@section('content')
    <div class="container-fluid bg-body-tertiary dark__bg-gray-1200">
        <div class="bg-holder bg-auth-card-overlay" style="background-image:url({{ asset('assets/img/bg/37.png') }});"></div>
        <!--/.bg-holder-->
        <div class="row flex-center position-relative min-vh-100 g-0 py-5">
            <div class="col-11 col-sm-10 col-xl-8">
                <div class="card border border-translucent auth-card">
                    <div class="card-body pe-md-0">
                        <div class="row align-items-center gx-0 gy-7">
                            <div
                                class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                                <div class="bg-holder" style="background-image:url({{ asset('assets/img/bg/38.png') }});">
                                </div>
                                <!--/.bg-holder-->
                                <div
                                    class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 pb-md-7">
                                    <h3 class="mb-3 text-body-emphasis fs-7">{{ __('MDoc Authentication') }}</h3>
                                    <p class="text-body-tertiary">
                                        {{ 'Give yourself some hassle-free document traitment with the uniqueness of MDoc!' }}
                                    </p>
                                    <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                                        <li class="d-flex align-items-center"><span
                                                class="uil uil-check-circle text-success me-2"></span><span
                                                class="text-body-tertiary fw-semibold">Fast</span></li>
                                        <li class="d-flex align-items-center"><span
                                                class="uil uil-check-circle text-success me-2"></span><span
                                                class="text-body-tertiary fw-semibold">Simple</span></li>
                                        <li class="d-flex align-items-center"><span
                                                class="uil uil-check-circle text-success me-2"></span><span
                                                class="text-body-tertiary fw-semibold">Responsive</span></li>
                                    </ul>
                                </div>
                                <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img
                                        class="auth-title-box-img d-dark-none"
                                        src="{{ asset('assets/img/spot-illustrations/auth.png') }}" alt=""><img
                                        class="auth-title-box-img d-light-none"
                                        src="{{ asset('assets/img/spot-illustrations/auth-dark.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col mx-auto">
                                <div class="auth-form-box">
                                    <div class="text-center mb-7"><a class="d-flex flex-center text-decoration-none mb-4"
                                            href="{{route('app.landing')}}">
                                            <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img
                                                    src="{{ asset('logo/logo2.png') }}" alt="phoenix"
                                                    width="58"></div>
                                        </a>
                                        <h3 class="text-body-highlight">Sign In</h3>
                                        <p class="text-body-tertiary">Get access to your account</p>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-4 h-4 mr-2">
                                                    <path fill-rule="evenodd" d="M10 1c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8zm1 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1-4a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0v-3a1 1 0 0 1 1-1z" clip-rule="evenodd" />
                                                </svg> --}}

                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-success">
                                            <ul>
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-4 h-4 mr-2">
                                                    <path fill-rule="evenodd" d="M10 1c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8zm1 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1-4a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0v-3a1 1 0 0 1 1-1z" clip-rule="evenodd" />
                                                </svg> --}}

                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <a type="button" href="{{route('auth.google')}}" class="btn btn-phoenix-secondary w-100 mb-3"><span
                                            class="fab fa-google text-danger me-2 fs-9"></span>Sign in with
                                        google</a>
                                    <div class="position-relative">
                                        <hr class="bg-body-secondary mt-5 mb-4">
                                        <div class="divider-content-center bg-body-emphasis">or use email</div>
                                    </div>  
                                    <form action={{route('app.login')}} method="post">
                                        @csrf
                                        <div class="mb-3 text-start"><label class="form-label" for="email">Email
                                                address</label>
                                            <div class="form-icon-container"><input class="form-control form-icon-input"
                                                    id="email" name="email" type="email" placeholder="name@example.com"><span
                                                    class="fas fa-user text-body fs-9 form-icon"></span></div>
                                        </div>
                                        <div class="mb-3 text-start"><label class="form-label"
                                                for="password">Password</label>
                                            <div class="form-icon-container"><input class="form-control form-icon-input"
                                                    id="password" name="password" type="password" placeholder="Password"><span
                                                    class="fas fa-key text-body fs-9 form-icon"></span></div>
                                        </div>
                                        <div class="row flex-between-center mb-7">
                                            <div class="col-auto">
                                                <div class="form-check mb-0"><input class="form-check-input"
                                                        id="basic-checkbox" type="checkbox" checked="checked"><label
                                                        class="form-check-label mb-0" for="basic-checkbox">Remember
                                                        me</label></div>
                                            </div>
                                            <div class="col-auto"><a class="fs-9 fw-semibold"
                                                    href="forgot-password.html">Forgot Password?</a></div>
                                        </div><button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
                                        <div class="text-center"><a class="fs-9 fw-bold"
                                                href="{{ route('app.register-form') }}">Create an account</a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
