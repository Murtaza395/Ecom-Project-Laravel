<!DOCTYPE html>
<html>

<head>
 @include('home.css')
 <style>
    table,td,th{
        font-size:19px;
        font-weight:bold;
        border: 2px solid black;
    }
 </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
                <div class="page-header bg-dark text-light">
                    <div class="container-fluid">
                        @if (!empty($order))
                            @foreach ($order as $ord)
                            <div class="col-md-14 bg-warning text-center mt-2">
                                ......................
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Product Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $ord->product->title }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Product Price</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{$ord->product->price }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Delivery Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{$ord->status}}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Image</label>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="uploads/products/{{$ord->product->image}}">
                                    </div>
                                </div>

                            @endforeach
                        @endif
    </div>
    <div class="bg-danger">
   <span class="mt-2"> {{$order->links()}} </span>
</div>
                </div>
  </div>




   


  @include('home.footer')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">  </script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>