<header class="header bg-info">   
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{route('admin.dashboard')}}" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary"></strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        @if (Session::has('success'))
          
        
        <div class="container">
        <p class="alert alert-success alert-dismissible fade show"> {{Session::get('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </p>
        </div>
        @endif
      </div>
         <div class="d-flex justify-content-between">
          <div class="list-inline-item logout">        
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class= "btn btn-primary" value="Log-out">
            </form>           
        </div>
        <div>
          @if (Auth::check())
            <a href="{{route('changePass',Auth::user()->id)}}" class="btn btn-primary text-white"> Update Password</a>
                        
          @endif
        </div>
      </div>
        </div>
      </div>
    </nav>
  </header>