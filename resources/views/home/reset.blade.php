<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">

        @include('home.header')

    </div>

    <div class="container">
        @if (Auth::check())
            <form action="{{ route('resetPassword', Auth::user()->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label class="for-label">Current Password</label>
                    <input type="password" name="current_password"
                        class="@error('current_password') is-invalid @enderror form-control">
                    @error('current_password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="for-label">New Password</label>
                    <input type="password" name="new_password"
                        class="@error('new_password') is-invalid @enderror  form-control">
                    @error('new_password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="for-label">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="@error('password_confirmation') is-invalid @enderror  form-control">
                    @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary mt-3">Update Password</button>
            </form>
        @endif
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
