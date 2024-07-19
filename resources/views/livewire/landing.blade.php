<div>
      <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
        <div class="modal-dialog">
          <div class="modal-content mt-15 rounded-pill">
            <div class="modal-body p-0">
              <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search">
                  <span class="fas fa-search search-box-icon"></span>
                </form>
                <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link p-0" aria-label="Close"></button></div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="pb-8 overflow-hidden" id="home">
        <div class="hero-header-container-alternate position-relative">
          <div class="container-small px-lg-7 px-xxl-3">
            <div class="row align-items-center">
              <div class="col-12 col-lg-6 pt-8 pb-6 position-relative z-5 text-center text-lg-start">
                <h1 class="fs-3 fs-md-2 fs-xl-1 fw-black mb-4"><span class="text-gradient-info me-3">Your First </span><br>Step to Better Health</h1>
                <p class="mb-5 pe-xl-10">Providing standard, modern, and elegant solutions for initial medication suggestions while you connect with your doctor. Sign up or explore the demo below.</p><a class="btn btn-lg btn-primary rounded-pill me-3" href="{{route('app.register-form')}}" role="button">Sign up</a><a class="btn btn-link me-2 fs-8 p-0" href="#!" role="button">Check Demo<span class="fa-solid fa-angle-right ms-2 fs-9"></span></a>
              </div>
              <div class="col-12 col-lg-auto d-none d-lg-block">
                <div class="hero-image-container position-absolute h-100 end-0 d-flex align-items-center">
                  <div class="position-relative">
                    <div class="position-absolute end-0 hero-image-container-overlay" style="transform: skewY(-8deg)."></div><img class="position-absolute end-0 hero-image-container-bg" src="../../assets/img/bg/bg-36.png" alt=""><img class="w-100 d-dark-none rounded-2 hero-image-shadow" src="../../assets/img/bg/bg-34.png" alt="hero-header"><img class="w-100 d-light-none rounded-2 hero-image-shadow" src="../../assets/img/bg/bg-35.png" alt="hero-header">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-small px-md-8 mb-8 d-lg-none">
            <div class="position-relative">
              <div class="position-absolute end-0 hero-image-container-overlay"></div><img class="position-absolute top-50 hero-image-container-bg" src="../../assets/img/bg/bg-39.png" alt=""><img class="img-fluid ms-auto d-dark-none rounded-2 hero-image-shadow" src="../../assets/img/bg/bg-34.png" alt="hero-header"><img class="img-fluid ms-auto d-light-none rounded-2 hero-image-shadow" src="../../assets/img/bg/bg-35.png" alt="hero-header">
            </div>
          </div>
        </div>
      </section>



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="overflow-hidden rotating-earth-container pb-5 pb-md-0 pt-12">
        <div class="container-small px-lg-7 px-xxl-3">
          <div class="row">
            <div class="col-lg-6 text-center text-lg-start">
              <h5 class="text-info mb-3">One-stop solution</h5>
              <h2 class="mb-2 lh-base">Built for users</h2>
              <h1 class="fs-4 fs-sm-2 mb-3 text-gradient-info fw-black">WORLDWIDE</h1>
              <p class="mb-10">Simplify your healthcare with MedAssist and get the initial care you need while connecting with your doctor.</p>
              <div class="row gy-6">
                <div class="col-sm-6 text-center text-lg-start"><img class="mb-4 d-dark-none" src="{{asset('assets/img/icons/editable-features.png')}}" alt=""><img class="mb-4 d-light-none" src="{{asset('assets/img/icons/editable-features-dark.png')}}" alt="">
                  <h4 class="mb-2">Instant Recommendations</h4>
                  <p>Get initial medication suggestions in seconds!</p>
                </div>
                <div class="col-sm-6 text-center text-lg-start"><img class="mb-4 d-dark-none" src="{{asset('assets/img/icons/best-statistics.png')}}" alt=""><img class="mb-4 d-light-none" src="{{asset('assets/img/icons/best-statistics-dark.png')}}" alt="">
                  <h4 class="mb-2">Comprehensive Insights</h4>
                  <p>Access detailed health reports effortlessly!</p>
                </div>
                <div class="col-sm-6 text-center text-lg-start"><img class="mb-4 d-dark-none" src="{{asset('assets/img/icons/all-night.png')}}" alt=""><img class="mb-4 d-light-none" src="{{asset('assets/img/icons/all-night-dark.png')}}" alt="">
                  <h4 class="mb-2">Round-the-Clock Security</h4>
                  <p>Ensure your health data is always protected!</p>
                </div>
                <div class="col-sm-6 text-center text-lg-start"><img class="mb-4 d-dark-none" src="{{asset('assets/img/icons/lightning-speed.png')}}" alt=""><img class="mb-4 d-light-none" src="{{asset('assets/img/icons/lightning-speed-dark.png')}}" alt="">
                  <h4 class="mb-2">Seamless Integration</h4>
                  <p>Easily connect with your doctor anytime!</p>
                </div>
              </div>
            </div>
            <div class="col-lg-auto">
              <div class="position-relative position-lg-absolute rotating-earth">
                <div class="lottie d-dark-none" data-options='{"path":"{{asset('assets/img/animated-icons/rotating-earth.json')}}"}'></div>
                <div class="lottie d-light-none" data-options='{"path":"{{asset('assets/img/animated-icons/rotating-earth-dark.json')}}"}'></div><img class="position-absolute d-dark-none" src="{{asset('assets/img/spot-illustrations/earth-plane.png')}}" alt=""><img class="position-absolute d-light-none" src="{{asset('assets/img/spot-illustrations/earth-plane-dark.png')}}" alt="">
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-10 pb-xl-14">
        <div class="container-small px-lg-7 px-xxl-3">
          <div class="text-center mb-7">
            <h5 class="text-info mb-3">Contact</h5>
            <h2 class="mb-2">Any query ? Let us know</h2>
          </div>
          <div class="row g-5 g-lg-5">
            <div class="col-md-6 mb-5 mb-md-0 text-center text-md-start">
              <h3 class="mb-3">Stay connected</h3>
              <p class="mb-5">Stay connected with GCare's Help Center; GCare is available for your necessities at all times.</p>
              <div class="d-flex flex-column align-items-center align-items-md-start gap-3 gap-md-0">
                <div class="d-md-flex align-items-center">
                  <div class="icon-wrapper shadow-info"><span class="uil uil-phone text-primary fs-4 z-1 ms-2" data-bs-theme="light"></span></div>
                  <div class="flex-1 ms-3"><a class="link-900" href="tel:+917698809989">(91) 76988-09989</a></div>
                </div>
                <div class="d-md-flex align-items-center">
                  <div class="icon-wrapper shadow-info"><span class="uil uil-envelope text-primary fs-4 z-1 ms-2" data-bs-theme="light"></span></div>
                  <div class="flex-1 ms-3"><a class="fw-semibold text-body" href="mailto:jeryfoto@gmail.com">g-care@gmail.com</a></div>
                </div>
                <div class="mb-6 d-md-flex align-items-center">
                  <div class="icon-wrapper shadow-info"><span class="uil uil-map-marker text-primary fs-4 z-1 ms-2" data-bs-theme="light"></span></div>
                  <div class="flex-1 ms-3"><a class="fw-semibold text-body" href="#!">360003 Bedi market yard Rajkot</a></div>
                </div>
                <div class="d-flex"><a href="https://www.facebook.com/profile.php?id=100089750775376"><span class="fa-brands fa-facebook fs-6 text-primary me-3"></span></a><a href="#!"><span class="fa-brands fa-twitter fs-6 text-primary me-3"></span></a><a href="#!"><span class="fa-brands fa-linkedin-in fs-6 text-primary"></span></a></div>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-start">
              <h3 class="mb-3">Drop us a line</h3>
              <p class="mb-7">If you have any query or suggestion , we are open to learn from you, Lets talk, reach us anytime.</p>
              <form class="row g-4">
                <div class="col-12"><input class="form-control bg-body-emphasis" type="text" name="name" placeholder="Name" required="required"></div>
                <div class="col-12"><input class="form-control bg-body-emphasis" type="email" name="email" placeholder="Email" required="required"></div>
                <div class="col-12"><textarea class="form-control bg-body-emphasis" rows="6" name="message" placeholder="Message" required="required"></textarea></div>
                <div class="col-12 d-grid"><button class="btn btn-outline-primary" type="submit">Submit</button></div>
                <div class="feedback"></div>
              </form>
            </div>
          </div>
        </div><!-- end of .container-->
      </section><!-- <section> close ============================-->
      <!-- ============================================-->
</div>
