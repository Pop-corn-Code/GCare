@extends('auth.app')

@section('title', 'Sign Up')
@section('content')
<div class="container-fluid bg-body-tertiary dark__bg-gray-1200">
        <div class="bg-holder bg-auth-card-overlay" style="background-image:url(../../../assets/img/bg/37.png);"></div>
        <!--/.bg-holder-->
        <div class="row flex-center position-relative min-vh-100 g-0 py-5">
          <div class="col-11 col-sm-10 col-xl-8">
            <div class="card border border-translucent auth-card">
              <div class="card-body pe-md-0">
                <div class="row align-items-center gx-0 gy-7">
                  <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/bg/38.png);"></div>
                    <!--/.bg-holder-->
                    <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 card-sign-up">
                      <h3 class="mb-3 text-body-emphasis fs-7">Mdoc Authentication</h3>
                      <p class="text-body-tertiary">Give yourself some hassle-free development process with the uniqueness of Phoenix!</p>
                      <ul class="list-unstyled mb-0 w-max-content w-md-auto">
                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Fast</span></li>
                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Simple</span></li>
                        <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Responsive</span></li>
                      </ul>
                    </div>
                    <div class="position-relative z-n1 mb-6 d-none d-md-block text-center mt-md-15"><img class="auth-title-box-img d-dark-none" src="../../../assets/img/spot-illustrations/auth.png" alt=""><img class="auth-title-box-img d-light-none" src="../../../assets/img/spot-illustrations/auth-dark.png" alt=""></div>
                  </div>
                  <div class="col mx-auto">
                    <div class="auth-form-box">
                      <div class="text-center mb-7"><a class="d-flex flex-center text-decoration-none mb-4" href="{{route('app.landing')}}">
                          <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="{{asset('logo/logo2.png')}}" alt="phoenix" width="58"></div>
                        </a>
                        <h3 class="text-body-highlight">Sign Up</h3>
                        <p class="text-body-tertiary">Create your account today</p>
                      </div><button class="btn btn-phoenix-secondary w-100 mb-3"><span class="fab fa-google text-danger me-2 fs-9"></span>Sign up with google</button>
                      <div class="position-relative mt-4">
                        <hr class="bg-body-secondary">
                        <div class="divider-content-center bg-body-emphasis">or use email</div>
                      </div>
                      <form action={{route('app.register')}} method="post">
                        @csrf
                        <div class="mb-3 text-start">
                          <label class="form-label" for="name">Name</label>
                          <input class="form-control" id="name" name="name" type="text" placeholder="Name">
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                        <div class="mb-3 text-start">
                          <label class="form-label" for="email">Email address</label>
                          <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com">
                          @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="col-xl-6">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control form-icon-input" id="password" type="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                          <div class="col-xl-6">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input class="form-control form-icon-input" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="form-check mb-3"><input class="form-check-input" id="termsService" type="checkbox" required><label class="form-label fs-9 text-transform-none" for="termsService">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div><button class="btn btn-primary w-100 mb-3">Sign up</button>
                        <div class="text-center"><a class="fs-9 fw-bold" href="{{route('app.login-form')}}">Sign in to an existing account</a></div>
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