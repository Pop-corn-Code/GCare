@section('page-title')
Map
@endsection
<div>
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Modules</a></li>
            <li class="breadcrumb-item active">Symptoms</li>
        </ol>
    </nav>
    <h2 class="text-bold text-body-emphasis mb-5">Symptoms</h2>


    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

        <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
          <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
              <div class="search-box">
                <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search symptoms" aria-label="Search">
                  <span class="fas fa-search search-box-icon"></span>
                </form>
              </div>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                    <button class="btn btn-link text-body me-4 px-0"><span class="fa-solid fa-file-export fs-9 me-2"></span>Share</button>
                    <button class="btn btn-primary" type="button" data-bs-target="#storeModal" data-bs-toggle="offcanvas">
                      <span class="fas fa-plus me-2"></span>Direction
                    </button>
                </div>
            </div>
          </div>
          <div class="mx-n6 mx-lg-n9 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            
            <div class="h-100 w-100">
                <div class="h-100 bg-body-emphasis" id="map" style="min-height: 625px;"></div>
            </div>
          </div>
        </div>
</div>

@push('scripts')
<script>
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    @this.set('latitude', position.coords.latitude);
                    @this.set('longitude', position.coords.longitude);

                    // Trigger the fetchHospitals method
                    @this.call('fetchHospitals');
                }, function() {
                    alert('Error getting your location.');
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });

        Livewire.on('hospitalsFetched', function() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: { lat: @this.get('latitude'), lng: @this.get('longitude') }
            });

            var hospitals = @this.get('hospitals');
            hospitals.forEach(function(hospital) {
                new google.maps.Marker({
                    position: { lat: hospital.geometry.location.lat, lng: hospital.geometry.location.lng },
                    map: map,
                    title: hospital.name
                });
            });
        });
    </script>
@endpush