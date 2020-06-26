<div class="list-group">
<h3>{{ Auth::user()->profile->full_name ?? '' }}</h3>
</div>
<div class="list-group">
    <a href="{{ route('profile.home') }}"
        class="list-group-item {{ Request::is('profile.home') ? 'bg-primary text-white' : '' }}">Dashboard
    </a>
    <a href="{{ route('profile.info') }}"
        class="list-group-item {{ Request::is('profile.info') ? 'bg-primary text-white' : '' }}">Contact Info
    </a>
</div>