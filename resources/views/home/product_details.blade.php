<!DOCTYPE html>
<html>

<head>
 @include('home.css')
 <style>
 </style>
</head>

<body>
  <div class="hero_area">

    @include('home.header')
  </div>
        <div class="container">
        <h2 class="text-center">
          {{$detail->title}}
        </h2>
        <div class="card" style="width:600px; margin-left:270px">
          <img src="{{asset('uploads/products/'.$detail->image)}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$detail->title}}</h5>
            <h5 class="card-title">Price: ${{$detail->price}}</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productDetails">
              Extra Details
            </button>
          </div>

          
          <!-- Modal -->
          <div class="modal fade" id="productDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-danger">
                  <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">{{$detail->title}}</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark">
                  <div class="card" style="width: 25rem;">
                    <img src="{{asset('uploads/products/'.$detail->image)}}" class="card-img-top" alt="...">
                    <a href="{{route('addCart',$detail->id)}}" class="btn btn-danger p-2">Add to Cart</a>
                   </div>
                  <span><b>Category:</b> {{$detail->category}}</span><br>
                  <span class="text-white"><b class="text-white">Available Quantity:</b> {{$detail->quantity}}</span>
                  <p class="card-text text-white"><b class="text-white">About Product: </b> {{$detail->description}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
  @include('home.footer')

  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>