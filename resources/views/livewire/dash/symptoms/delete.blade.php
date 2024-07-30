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
                        <button type="button" wire:click="delete" class="btn btn-danger mx-3" data-dismiss="modal">{{__('Confirm')}}</button>
                        <button type="button" class="btn text-700 btn-light " data-bs-dismiss="modal">{{__('Cancel')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>