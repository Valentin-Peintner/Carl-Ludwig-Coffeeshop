    
        {{-- Navigationbar - Dashboard --}}
    
            <nav x-data="{ open: false }">
                <div class="navbar-user">  
                    <ul>
                        {{-- Übersicht --}}
                        <li>
                            <a href="{{ route('dashboard') }}">{{ __('Übersicht') }}</a>
                        </li>
                        {{-- Profil --}}
                        <li>
                            <a href="{{route ('profile') }}">{{ __('Profil') }}</a>
                        </li>
                        {{-- Passwort --}}
                        <li>
                            <a href="{{route ('change-password')}}">{{ __('Passwort') }}</a>
                        </li>
                        {{-- Adresse --}}
                        <li>
                            <a href="{{route ('adress')}}">{{ __('Adresse') }}</a>
                        </li>
                        {{-- Bestellungen --}}
                        <li class="pd-right">
                            <a href="{{route('order')}}">{{ __('Bestellungen') }}</a>
                        </li>
                        {{-- Zum Shop --}}
                        <li>
                            <a href="/index-shop">{{ __('Shop') }}</a>
                        </li>
                      
                        {{-- User Logout --}}
                        <li>
                            <div class="user-logout">
                                {{-- Logout Form --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
