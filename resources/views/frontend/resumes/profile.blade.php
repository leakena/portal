
<div class="profile_pic">
    @if(isset($profile))
        <img class="profile img-circle profile_img" src="{{ asset('img/frontend/uploads/profile') }}/{{ $profile->profile }}" alt="" />
        <h1 class="name">{{ $profile->user->name }}</h1>
        <h3 class="tagline">Full Stack Developer</h3>
    @else
        <img class="profile img-circle profile_img" src="{{ asset('img/icon.png') }}" alt="" />

    @endif

</div>
<div class="profile_info">
    <span>Welcome,</span>
    <h2>John Doe</h2>
</div>