@section('page-title')
Symptoms
@endsection
<div>
    @include('livewire.dash.symptoms.add')
    @include('livewire.dash.symptoms.delete')
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
                    <button class="btn btn-link text-body me-4 px-0"><span class="fa-solid fa-file-export fs-9 me-2"></span>Export</button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addSymptomModal"><span class="fas fa-plus me-2"></span>Add symptom</button>
                </div>
            </div>
          </div>
          <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
              <table class="table table-sm fs-9 mb-0">
                <thead>
                    <tr>
                        <th class="sort align-middle" scope="col" data-sort="date" style="width:15%; min-width:200px;">DATE</th>
                        <th class="sort align-middle pe-3" scope="col" data-sort="symptom_type" style="width:20%; min-width:200px;">SYMPTOM TYPE</th>
                        <th class="sort align-middle" scope="col" data-sort="severity" style="width:10%;">SEVERITY</th>
                        <th class="sort align-middle text-end" scope="col" data-sort="notes" style="width:21%; min-width:200px;">NOTES</th>
                        <th class="sort align-middle text-end" scope="col" data-sort="notes" style="width:15%; min-width:200px;">Action</th>
                    </tr>
                </thead>
                <tbody class="list" id="members-table-body">
                 @forelse($symptoms as $symptom)
                     <tr>
                        <td class="align-middle">{{ $symptom->created_at->format('M d, h:i A') }}</td>
                        <td class="align-middle">{{$symptom->symptom_type}}</td>
                        <td class="align-middle">
                            <div class="progress" style="height:15px">
                                <div class="progress-bar rounded-3" role="progressbar" style="width: {{$symptom->severity*10}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$symptom->severity*10}}%</div>
                            </div>
                        </td>
                        <td class="align-middle text-end">{{$symptom->notes}}</td>
                        <td class="align-middle text-end">
                            <span class="fas fa-eye" style="margin-right: 3px;"></span>
                            <span class="fas fa-edit" style="color: blue; margin-right: 3px;"></span>
                            <a href='#' wire:click="initData({{ $symptom->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal" >
                                <svg class="icon icon-xs text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </a>
                        </td>
                    </tr> 
                 @empty
                    <tr>
                            <td colspan="5" class="text-center">
                                <div wire:loading.remove wire:target="query" class="text-center text-gray-800 mt-2">
                                    <h4 class="fs-1 fw-bold">{{ __('Opps nothing here') }} &#128540;</h4>
                                    <p>{{ __('No Record Found..!') }}</p>
                                </div>
                                <div class="text-center mt-2" wire:loading wire:target="query">
                                    <div class="text-center">
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                        <div class="spinner-grow text-grey-300" style="width: 0.9rem; height: 0.9rem;" role="status"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                 @endforelse                    
                </tbody>
              </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
              <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
              </div>
              <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
              </div>
            </div>
          </div>
        </div>
</div>
