<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container" id="nave">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>

            <a href="{{ route('myOrders') }}" class="btn btn-primary ms-3">
                My Orders
            </a>
            <a href="{{ route('myCart') }}">
                <i class="fa fa-shopping-bag ms-3" aria-hidden="true"></i>
                Cart
                [{{ $count }}]
            </a>
                <div class="user_option">
                  @if (Auth::check())
                    <a href="{{ route('myProfile', Auth::user()->id) }}">
                      <div class="avatar">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLMI5YxZE03Vnj-s-sth2_JxlPd30Zy7yEGg&s" class="img-fluid rounded-circle"
                            style="margin-left:500px" width="45">
                    </div>
                    </a>
                    @else
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="btn btn-primary">
                                Login
                            </span>
                        </a>
                        <a href="{{ url('/register') }}">
                            <i class="fa fa-vcard justify-content-end" aria-hidden="true"></i>
                            <span class="btn btn-primary">
                                Register
                            </span>
                        </a>
            @endif
            @if(Auth::check() && Auth::user()->usertype=="admin")
            <a href="{{ route('admin.dashboard') }}">
              <button class="btn btn-primary">Admin Dashboard</button>
          </a>
          @endif
        </div>
        </div>
    </nav>
</header>
