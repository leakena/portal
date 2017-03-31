<div class="profile clearfix">
    <div class="profile_pic">
        @if(isset($profile))
            <img class="profile img-circle profile_img" src="{{ asset('img/frontend/uploads/profile') }}/{{ $profile->profile }}" alt="" />
        @else
            <img class="profile img-circle profile_img" src="{{ asset('img/icon.png') }}" alt="" />
        @endif

    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ $logged_in_user->name }}</h2>
    </div>
</div>