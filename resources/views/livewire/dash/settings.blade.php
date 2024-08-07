@section('page-title')
Settings
@endsection
<div>
    <form wire:submit.prevent="update">
    <div class="mb-9">
        <div class="row g-6">
        <div class="col-12 col-xl-4">
            <div class="card mb-5">
            <div class="card-header hover-actions-trigger position-relative mb-6" style="min-height: 130px; ">
                <div class="bg-holder rounded-top" style="background-image: linear-gradient(0deg, #000000 -3%, rgba(0, 0, 0, 0) 83%), url(../../assets/img/generic/59.png)"><input class="d-none" id="upload-settings-cover-image" type="file"><label class="cover-image-file-input" for="upload-settings-cover-image"></label>
                <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white dark__text-gray-1100"><span class="fa-solid fa-camera me-2"></span></div>
                </div><input class="d-none" id="upload-settings-porfile-picture" type="file" wire:model="avatar"><label class="avatar avatar-4xl status-online feed-avatar-profile cursor-pointer" for="upload-settings-porfile-picture"><img class="rounded-circle img-thumbnail shadow-sm border-0" src="{{Auth::user()->avatar ? Auth::user()->avatar : asset('profiles/default.webp')}}" width="200" alt=""></label>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-wrap mb-2 align-items-center">
                        <h3 class="me-2">{{$user_email}}</h3><span class="fw-normal fs-8">({{'@'.$user_name}})</span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12 col-xl-8">
            <div class="border-bottom mb-4">
            <div class="mb-6">
                <h4 class="mb-4">Personal Information</h4>
                <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <div class="form-icon-container">
                    <div class="form-floating"><input class="form-control form-icon-input" wire:model="user_name" id="lastName" type="text" placeholder="Last Name"><label class="text-body-tertiary form-icon-label" for="lastName">NAME</label></div><span class="fa-solid fa-user text-body fs-9 form-icon"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-icon-container">
                    <div class="form-floating"><input class="form-control form-icon-input" wire:model="user_email" id="emailSocial" type="email" placeholder="Email"><label class="text-body-tertiary form-icon-label" for="emailSocial">ENTER YOUR EMAIL</label></div><span class="fa-solid fa-envelope text-body fs-9 form-icon"></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-icon-container">
                    <div class="form-floating"><input class="form-control form-icon-input" wire:model="phone" id="phone" type="tel" placeholder="Phone"><label class="text-body-tertiary form-icon-label" for="phone">ENTER YOUR PHONE</label></div><span class="fa-solid fa-phone text-body fs-9 form-icon"></span>
                    </div>
                </div>
                </div>
            </div>
            <div class="row gx-3 mb-6 gy-6 gy-sm-3">
                <div class="col-12 col-sm-6">
                <h4 class="mb-4">Change Password</h4>
                <div class="form-icon-container mb-3">
                    <div class="form-floating"><input class="form-control form-icon-input" wire:model="old_pwd" id="oldPassword" type="password" placeholder="Old password"><label class="text-body-tertiary form-icon-label" for="oldPassword">Old Password</label></div><span class="fa-solid fa-lock text-body fs-9 form-icon"></span>
                </div>
                <div class="form-icon-container mb-3">
                    <div class="form-floating"><input class="form-control form-icon-input" wire:model="new_pwd" id="newPassword" type="password" placeholder="New password"><label class="text-body-tertiary form-icon-label" for="newPassword">New Password</label></div><span class="fa-solid fa-key text-body fs-9 form-icon"></span>
                </div>
                <div class="form-icon-container">
                    <div class="form-floating"><input class="form-control form-icon-input" wire:model="new_pwd_confirmation" id="newPassword2" type="password" placeholder="Confirm New password"><label class="text-body-tertiary form-icon-label" for="newPassword2">Confirm New Password</label></div><span class="fa-solid fa-key text-body fs-9 form-icon"></span>
                </div>
                </div>
            </div>
            <div class="text-end mb-6">
                <div>
                    <button class="btn btn-phoenix-secondary me-2">Cancel Changes</button>
                    <button class="btn btn-phoenix-primary" type="submit">Save Information</button></div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </form>
</div>
