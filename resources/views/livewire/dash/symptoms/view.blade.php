  <div class="offcanvas offcanvas-end settings-panel border-0" id="viewSymptomModal" tabindex="-1" aria-labelledby="viewSymptomModal" style="max-width:40%;">
      <div class="offcanvas-header align-items-start border-bottom flex-column border-translucent">
        <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
          <div>
            <h5 class="mb-2 me-2 lh-sm"><span class="fa-solid fa-stethoscope text-primary me-2 fs-8"></span>Symptom information</h5>
            <p class="mb-0 fs-9">Explore different styles according to your preferences</p>
          </div><button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span class="fas fa-times fs-8"> </span></button>
        </div><button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span class="fas fa-arrows-rotate me-2 fs-10"></span>Clear fields</button>
      </div>
      <div class="offcanvas-body scrollbar px-card" id="themeController">
        <form wire:submit.prevent="submit">
            <div class="setting-panel-item mt-0">
              <h5 class="setting-panel-item-title">Symptom Data</h5>
              <div class="row gx-2">

                  <div class="mb-3">
                      <label class="form-label" for="symptom_name">What is bothering you?</label>
                      <input type="text" id="symptom_name" class="form-control @error('symptom_name') is-invalid @enderror" wire:model="symptom_name">
                      @error('symptom_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="symptom_onset">When did this start?</label>
                      <input type="date" id="symptom_onset" class="form-control @error('symptom_onset') is-invalid @enderror" wire:model="symptom_onset">
                      @error('symptom_onset') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                      <label class="form-label" for="symptom_type">how can you classify that pain ?</label>
                      <select class="form-select" wire:model="symptom_type" aria-label="Symptom type">
                        <option value="">Select Symptom Type</option>
                        <option value="cardiovascular">Cardiovascular</option>
                        <option value="respiratory">Respiratory</option>
                        <option value="gastrointestinal">Gastrointestinal</option>
                        <option value="neurological">Neurological</option>
                        <option value="musculoskeletal">Musculoskeletal</option>
                        <option value="genitourinary">Genitourinary</option>
                        <option value="skin">Skin</option>
                        <option value="endocrine">Endocrine</option>
                        <option value="pain">Pain</option>
                        <option value="fever">Fever</option>
                        <option value="fatigue">Fatigue</option>
                        <option value="weight_change">Weight Change</option>
                        <option value="allergic_reactions">Allergic Reactions</option>
                        <option value="other">Other</option>
                      </select>
                      {{-- <input type="text" id="symptom_type" wire:model="symptom_type" class="form-control" required> --}}
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="symptom_location">Where does it hurt or feel uncomfortable?</label>
                      <input type="text" id="symptom_location" class="form-control @error('symptom_location') is-invalid @enderror" wire:model="symptom_location">
                      @error('symptom_location') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="symptom_severity">How bad is it? (1-10)</label>
                      <input type="number" id="symptom_severity" class="form-control @error('symptom_severity') is-invalid @enderror" wire:model="symptom_severity" min="1" max="10">
                      @error('symptom_severity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="symptom_duration">How long has this been going on?</label>
                      <input type="text" id="symptom_duration" class="form-control @error('symptom_duration') is-invalid @enderror" wire:model="symptom_duration">
                      @error('symptom_duration') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="symptom_description">Can you tell us more about it? (Optional)</label>
                      <textarea id="symptom_description" class="form-control @error('symptom_description') is-invalid @enderror" wire:model="symptom_description" rows="5"></textarea>
                      @error('symptom_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
              </div>
            </div>
            <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="setting-panel-item-title mb-1">Trigger Data </h5>
              </div>
              <p class="mb-3 text-body-tertiary">What makes it better or worse?</p>

              <div class="mb-3">
                  <label class="form-label" for="trigger_name">What makes your symptoms worse? </label>
                  <input type="text" id="trigger_name" class="form-control @error('trigger_name') is-invalid @enderror" wire:model="trigger_name">
                  @error('trigger_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label" for="trigger_description">Can you explain more about what makes it worse? (Optional)</label>
                  <textarea id="trigger_description" class="form-control @error('trigger_description') is-invalid @enderror" wire:model="trigger_description" rows="5"></textarea>
                  @error('trigger_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

            </div>
            <div class="setting-panel-item">
              <h5 class="setting-panel-item-title">Your Environment</h5>
              <div class="row gx-2">

                <div class="mb-3">
                    <label class="form-label" for="location">Where are you located?</label>
                    <input type="text" id="location" class="form-control @error('location') is-invalid @enderror" wire:model="location">
                    @error('location') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="indoor_enivironement">Describe your indoor environment:</label>
                    <textarea id="indoor_enivironement" class="form-control @error('indoor_enivironement') is-invalid @enderror" wire:model="indoor_enivironement" rows="5"></textarea>
                    @error('indoor_enivironement') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="occupation">What is your occupation?</label>
                    <input type="text" id="occupation" class="form-control @error('occupation') is-invalid @enderror" wire:model="occupation">
                    @error('occupation') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="lifestyle">Describe your lifestyle:</label>
                    <textarea id="lifestyle" class="form-control @error('lifestyle') is-invalid @enderror" wire:model="lifestyle" rows="5"></textarea>
                    @error('lifestyle') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>
            {{-- <div class="setting-panel-item">
              <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
              <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="navbarShapeDefault" name="navbar-shape" type="radio" value="default" data-theme-control="phoenixNavbarTopShape"><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../assets/img/generic/top-default.png" alt=""><img class="img-fluid img-prototype d-light-none mb-0" src="../assets/img/generic/top-default-dark.png" alt=""></span><span class="label-text">Default</span></label></div>
                <div class="col-6"><input class="btn-check" id="navbarShapeSlim" name="navbar-shape" type="radio" value="slim" data-theme-control="phoenixNavbarTopShape"><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeSlim"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../assets/img/generic/top-slim.png" alt=""><img class="img-fluid img-prototype d-light-none mb-0" src="../assets/img/generic/top-slim-dark.png" alt=""></span><span class="label-text"> Slim</span></label></div>
              </div>
            </div>
            <div class="setting-panel-item">
              <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
              <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="navbarTopDefault" name="navbar-top-style" type="radio" value="default" data-theme-control="phoenixNavbarTopStyle"><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../assets/img/generic/top-default.png" alt=""><img class="img-fluid img-prototype d-light-none mb-0" src="../assets/img/generic/top-style-darker.png" alt=""></span><span class="label-text">Default</span></label></div>
                <div class="col-6"><input class="btn-check" id="navbarTopDarker" name="navbar-top-style" type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle"><label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDarker"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../assets/img/generic/navbar-top-style-light.png" alt=""><img class="img-fluid img-prototype d-light-none mb-0" src="../assets/img/generic/top-style-lighter.png" alt=""></span><span class="label-text d-dark-none">Darker</span><span class="label-text d-light-none">Lighter</span></label></div>
              </div>
            </div> --}}
            {{-- <a class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary" href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/" target="_blank">Purchase template</a> --}}
            
            <div class="d-flex justify-content-end">
                <button class="bun btn-secondary opacity-2 d-grid mb-3 text-gray mt-5 btn ml-3"  data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                <button class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary" type="submit">Save data</button>
            </div>
        </form>
      </div>
  </div>