<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">

        @include('home.header')

        <div class="container emp-profile">
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-img bg-dark">
                        <img src="data:image/png;base64,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"
                            class="img-fluid rounded-circle ms-4" width="200">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-head bg-dark text-white text-center">
                        <h5>
                            {{ Auth::user()->name }}
                        </h5>
                    </div>
                </div>
                <div class="col-md-4 bg-dark">
                    @if (Session::has('success'))
                        <div class="container">
                            <p class="alert alert-success alert-dismissible fade show"> {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="container">
                            <p class="alert alert-warning alert-dismissible fade show"> {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        </div>
                    @endif
                    @if (Auth::check())
                        <h1 class="text-white">Edit Your Profile</h1>
                        <form action="{{ route('editProfile', Auth::user()->id) }}" method="post">
                            @csrf
                            @method('put')
                            <label class="for-label text-white">Name</label>
                            <input type="text" name="name"
                                class="@error('name') is-invalid @enderror form-control"
                                value="{{ Auth::user()->name }}">
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            <label class="for-label text-white">Phone</label>
                            <input type="text" name="phone"
                                class="@error('phone') is-invalid @enderror form-control"
                                value="{{ Auth::user()->phone }}">
                            @error('phone')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            <label class="for-label text-white">Address</label>
                            <input type="text" name="address"
                                class="@error('address') is-invalid @enderror form-control"
                                value="{{ Auth::user()->address }}">
                            @error('address')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            <input type="submit" class="btn btn-primary mt-2" value="Edit Profile" />
                        </form>
                    @endif

                </div>
            </div>
            <div class="col-md-12 bg-dark text-white">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active mt-4" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ Auth::user()->name }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ Auth::user()->email }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ Auth::user()->phone }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ Auth::user()->address }}</b></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            @if (Auth::check())
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="submit" value="logout" class="btn btn-primary">
                                </form>
                                <a href="{{ route('changePass', Auth::user()->id) }}" class="btn btn-danger"> Change
                                    Your password</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('home.footer')




    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
