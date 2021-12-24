<div class="container">
    <a class="menu">
        <span class="menu-line menu-line-top"></span>
        <span class="menu-line menu-line-center"></span>
        <span class="menu-line menu-line-bottom"></span>
    </a>
    <h1 class="menu_title">Rese</h1>
</div>
@auth
    <nav class="gnav">
        <div class="gnav-wrap">
            <ul class="gnav-menu">
                <li class="gnav-menu-item"><a href="{{ route('restaurants.index') }}">Home</a></li>
                <li class="gnav-menu-item">
                    <form method="POST" action="{{ route('logout') }}" name="form1">
                        @csrf

                        <input type="hidden" name="" value="">
                        <a href="javascript:form1.submit()">Logout</a>
                    </form>
                </li>
                <li class="gnav-menu-item"><a href="{{ route('mypage') }}">Mypage</a></li>
                @can('isAdmin')
                    <li class="gnav-menu-item"><a href="{{ route('management.admin') }}">Administrator</a></li>
                @elsecan('isOwner')
                    <li class="gnav-menu-item"><a href="">Owner</a></li>
                {{-- <li class="gnav-menu-item"><a href="{{ route('management.owner') }}">Owner</a></li> --}}
                @else
                @endcan
            </ul>
        </div>
    </nav>
@endauth
@guest
    <nav class="gnav">
        <div class="gnav-wrap">
            <ul class="gnav-menu">
                <li class="gnav-menu-item"><a href="{{ route('restaurants.index') }}">Home</a></li>
                <li class="gnav-menu-item"><a href="{{ route('register') }}">Registration</a></li>
                <li class="gnav-menu-item"><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </nav>
@endguest
