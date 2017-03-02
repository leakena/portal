<div class="profile-container">
    @if(isset($profile))
        <img class="profile" src="{{ asset('img/frontend/uploads/profile') }}/{{ $profile->profile }}" alt="" style="with:100px;height:100px;"/>
        <h1 class="name">{{ $profile->user->name }}</h1>
        <h3 class="tagline">Full Stack Developer</h3>
    @else
        <img class="profile" src="{{ asset('img/icon.png') }}" alt="" style="with:100px;height:100px;"/>
        <h1 class="name">Jonh Doe</h1>
        <h3 class="tagline">Full Stack Developer</h3>
    @endif
</div>