<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        table,
        th,
        td {
            border: 2px solid white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="hero_area">

        @include('home.header')
    </div>
    <div class="container">
                <div class="page-header bg-dark text-light">
                    <div class="container-fluid">
                        @php
                        $value = 0;
                    @endphp
                        @if (!empty($cart))
                            @foreach ($cart as $cart)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Product Title</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $cart->product->title }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Price</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>${{  $cart->product->price }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Quantity</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $cart->product->quantity }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Image</label>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ asset('uploads/products/' . $cart->product->image) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Action</label>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('removeCart',$cart->id)}}" id="removeFromCart{{$cart->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="#" onClick="handleRemove({{$cart->id}})" class="btn btn-danger mt-2">Remove</a>
                                    </div>
                                </div>
                                <div class="col-md-14 bg-warning text-center mt-2">
                                    ...............................................
                                </div>
                                @php
                                $value = $value + $cart->product->price;
                            @endphp
                            @endforeach
                        @endif
                        <h3 class="text-center">Total Price is: ${{ $value }}</h3>
                    </div>
    </div>
    <div class="container bg-dark">
        <form action="{{ route('placeOrder') }}" method="post">
            @csrf
            <div>
                <label for="receiver name" class="form-label text-white">Reciever name</label>
                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"
                    value="{{ Auth::user()->name }}">
                @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="receiver address" class="form-label text-white">Receiver Address</label>
                <textarea name="address" class="@error('address') is-invalid @enderror form-control" rows="3">{{ Auth::user()->address }}</textarea>
                @error('address')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="receiver phone" class="form-label text-white ">Reciever Phone</label>
                <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control"
                    value="{{ Auth::user()->phone }}">
                @error('phone')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <a href="{{ route('stripe', $value) }}" class="btn btn-outline-success form-control mb-5">Pay using card</a>
        </form>

    </div>
    @include('home.footer')


<script>
    function handleRemove(id){
        if(confirm("Are you sure to remove?")){
            document.getElementById("removeFromCart"+id).submit();
        }
    }
</script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
