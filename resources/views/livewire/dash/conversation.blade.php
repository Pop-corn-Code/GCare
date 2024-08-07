@section('page-title')
Chat History
@endsection
<div>
    <nav class="mb-2" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Modules</a></li>
        <li class="breadcrumb-item active">History</li>
    </ol>
    </nav>
    <div class="pb-8">
    <h2 class="mb-4">Chat History</h2>
    <div id="reports" data-list='{"valueNames":["title","text","priority","reportsby","reports","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-2">
        <div class="col-12">
            <div class="d-md-flex justify-content-between">
            <div class="mb-3"><button class="btn btn-primary me-4 btn-support-chat" onclick="newChat()"><span class="fas fa-plus me-2"></span>Create Discussion</button><button class="btn btn-link text-body px-0"><span class="fa-solid fa-file-export fs-9 me-2"></span>Export </button></div>
            <div class="d-flex mb-3">
                <div class="search-box me-2">
                <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search">
                    <span class="fas fa-search search-box-icon"></span>
                </form>
                </div><button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="modal" data-bs-target="#reportsFilterModal" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-filter text-primary" data-fa-transform="down-3"></span></button>
                <div class="modal fade" id="reportsFilterModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border border-translucent">
                        <form id="addEventForm" autocomplete="off">
                            <div class="modal-header border-translucent p-4">
                            <h5 class="modal-title text-body-highlight fs-6 lh-sm">Filter</h5><button class="btn p-1 text-danger" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9"> 				</span></button>
                            </div>
                            <div class="modal-body pt-4 pb-2 px-4">
                            <div class="mb-3"><label class="fw-bold mb-2 text-body-highlight" for="priority">Priority</label><select class="form-select" id="priority">
                                <option value="urgent" selected="selected">Urgent</option>
                                <option value="medium">Medium </option>
                                <option value="high">High</option>
                                <option value="low">Low</option>
                                </select></div>
                            <div class="mb-3"><label class="fw-bold mb-2 text-body-highlight" for="createDate">Create Date</label><select class="form-select" id="createDate">
                                <option value="today" selected="selected">Today</option>
                                <option value="last7Days">Last 7 Days</option>
                                <option value="last30Days">Last 30 Days</option>
                                <option value="chooseATimePeriod">Choose a time period</option>
                                </select></div>
                            <div class="mb-3"><label class="fw-bold mb-2 text-body-highlight" for="category">Category</label><select class="form-select" id="category">
                                <option value="salesReports" selected="selected">Sales Reports</option>
                                <option value="hrReports">HR Reports</option>
                                <option value="marketingReports">Marketing Reports</option>
                                <option value="administrativeReports">Administrative Reports</option>
                                </select></div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 border-0 pt-3"><button class="btn btn-sm btn-phoenix-primary px-4 fs-10 my-0" type="submit"> <span class="fas fa-arrows-rotate me-2 fs-10"></span>Reset</button><button class="btn btn-sm btn-primary px-9 fs-10 my-0" type="submit">Done</button></div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row g-3 list" id="reportsList">
          @forelse($conversations as $conversation)
            <div class="col-12 col-xl-6">
                <div class="card h-100">
                <div class="card-body">
                    <div class="border-bottom border-translucent">
                    <div class="d-flex align-items-start mb-1">
                        {{-- <div class="form-check mb-0">
                            <span class="fas fa-feather-alt me-1 text-info" data-fa-transform="shrink-6 up-1"></span>
                            <span class="fas fa-archive me-1" data-fa-transform="shrink-6 up-1"></span>
                        </div> --}}
                        <div class="d-sm-flex align-items-center ps-2"><a class="fw-bold fs-7 lh-sm title line-clamp-1 me-sm-4 btn-support-chat" onclick="setConversationId({{$conversation->id}})" href="#">{{$conversation->title}}</a>
                        <div class="d-flex align-items-center">
                            {{-- <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="modal" data-bs-target="#editConversation" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-filter text-primary" data-fa-transform="down-3"></span></button> --}}
                            <a href="#" wire:click="initData({{ $conversation->id }})" type="button" data-bs-toggle="modal" data-bs-target="#editConversation" ><span class="fas fa-feather-alt me-1 text-info" data-fa-transform="shrink-6 up-1"></span></a>
                            <a class="text-secondary" href="#" wire:click="initData({{ $conversation->id }})" data-bs-toggle="modal" data-bs-target="#DeleteModal" ><span class="fas fa-archive me-1" data-fa-transform="shrink-6 up-1"></span></a>
                        </div>
                        </div>
                    </div>
                    {{-- <p class="fs-9 fw-semibold text-body ms-4 text mb-4 ps-2">{{$conversation->title}}</p> --}}
                    </div>
                    <div class="row g-1 g-sm-3 mt-2 lh-1">
                    {{-- <div class="col-12 col-sm-auto flex-1 text-truncate"><a class="fw-semibold fs-9" href="#!"><span class="fa-regular fa-folder me-2 reportsby"></span>Reports by email</a></div> --}}
                    {{-- <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                        <p class="mb-0 fs-9 fw-semibold text-body-tertiary reports">Sales Reports</p>
                        </div>
                    </div> --}}
                    <div class="col-12 col-sm-auto">
                        <div class="d-flex align-items-center"><span class="me-2" data-feather="clock" style="stroke-width:2;"></span>
                        <p class="mb-0 fs-9 fw-semibold text-body-tertiary date">{{$conversation->created_at->format("F j, Y, g:i a")}}</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            @empty
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
            @endforelse  
        </div>
        <div class="row align-items-center justify-content-between py-2 pe-0 fs-9 mt-2">
        <div class="col-auto d-flex">
            <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
        </div>
        <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
        </div>
        </div>
    </div>
    </div>
    {{-- Edit modal --}}
    <div class="modal fade" id="editConversation" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border border-translucent">
            <form wire:submit.prevent="editConvesation" autocomplete="off">
                <div class="modal-header border-translucent p-4">
                <h5 class="modal-title text-body-highlight fs-6 lh-sm">Edit Discussion</h5><button class="btn p-1 text-danger" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9"> 				</span></button>
                </div>
                <div class="modal-body pt-4 pb-2 px-4">
                <div class="mb-3"><label class="fw-bold mb-2 text-body-highlight" for="priority">Title</label>
                    <input type="text" wire:model="title" class="form-control" >
                </div>
                
                </div>
                <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 border-0 pt-3">
                    <button class="btn btn-sm btn-phoenix-primary px-4 fs-10 my-0" type="submit"> <span class="fas fa-arrows-rotate me-2 fs-10"></span>Reset</button>
                    <button class="btn btn-sm btn-primary px-9 fs-10 my-0" type="submit">Done</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    {{-- Archive modal --}}
    <div wire:ignore.self class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="createPost" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="p-3 p-lg-4">
                        <div class="mb-4 mt-md-0 text-center">
                            <svg class="icon icon-xxl text-danger mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="25%">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h1 class="mb-0 h2 fw-bolder">{{__('Are you sure?')}}</h1>
                            <p class="pt-2">{{__('You won\'t be able to revert this!')}} &#128522;</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" wire:click="delete" class="btn btn-danger mx-3" data-bs-dismiss="modal">{{__('Confirm')}}</button>
                            <button type="button" class="btn text-700 btn-light " data-bs-dismiss="modal">{{__('Cancel')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function setConversationId(conve_id){
    const chatContainer = document.querySelectorAll('.chat .d-flex.flex-column-reverse .d-flex.chat-message');
    for (var i = 0; i < chatContainer.length; i++) {
        chatContainer[i].innerHTML = '';
    }
    localStorage.setItem('conversation_id', conve_id);
    loadConversationMessages(conve_id);
}
</script>