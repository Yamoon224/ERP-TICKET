<div class="az-navbar az-navbar-two az-navbar-dashboard-eight">
    <div class="container">
        <div class="az-navbar-header">
            <a class="az-logo" href="{{ route('dashboard') }}"><x-app-logo :width="70" :height="70"></x-app-logo></a>
        </div>
        <div class="az-navbar-search"></div>
        <ul class="nav">
            <li class="nav-label">Menu</li>
            <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-clipboard"></i> @lang('locale.dashboard')
                </a>
            </li>
            
            <li class="nav-item {{ Route::is('tickets.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tickets.index') }}">
                    <i class="fa fa-shopping-bag"></i> @lang('locale.ticket', ['suffix'=>'s', 'prefix'=>''])
                </a>
            </li>
            @if(isauthorize([1]))
            <li class="nav-item">
                <a class="nav-link with-sub" href="">
                    <i class="fa fa-users"></i>@lang('locale.administration')
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item {{ Route::is('users.index') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('users.index') }}"><i class="las la-users"></i>- @lang('locale.user', ['prefix'=>'', 'suffix'=>'s'])</a> 
                    </li>
                    <li class="nav-sub-item {{ Route::is('lines.index') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('lines.index') }}"><i class="las la-users"></i>- @lang('locale.line', ['prefix'=>'', 'suffix'=>'s'])</a> 
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>