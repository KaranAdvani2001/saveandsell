<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('home')}}">SaveAndSell</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                
                <li class="nav-item"><a class="nav-link {{isset($menu) && $menu == 'home' ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{isset($menu) && $menu == 'about' ? 'active' : ''}} " href="{{route('about')}}">About</a></li>
                <li class="nav-item dropdown {{isset($menu) && $menu == 'shop' ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('shop')}}">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{url('shop?products=for-sale')}}">For Sale</a></li>
                        <li><a class="dropdown-item" href="{{url('shop?products=trade')}}">Trade</a></li>
                    </ul>
                </li>

                
                @if (Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Create Account</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('login.form')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('signup.form')}}">Signup</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            {{-- <form class="d-flex">
                <a class="btn btn-outline-dark" type="submit" href="{{route('cart.list')}}">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{ App\Models\Cart::where(['user_id' => Auth::id()])->count() }}</span>
                </a>
            </form> --}}
        </div>
    </div>
</nav>