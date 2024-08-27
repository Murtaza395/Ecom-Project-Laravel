<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        @if (Session::has('success'))
          
        
        <div class="container">
        <p class="alert alert-success alert-dismissible fade show"> {{Session::get('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </p>
        </div>
        @endif
        <h2 class="bg-dark text-white">
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($product as $pro )
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box border border-black bg-black">
              <div class="img-box bg-info">
                <a href="{{route('productDetails',$pro->id)}}" class="btn btn-danger p-2">
                <img src="{{asset('uploads/products/'.$pro->image)}}"width="400">
              </a>
              </div>
              <div class="detail-box bg-info">
                <h6 class="ml-2">
                  {{$pro->title}}
                </h6>
                <h6>
                  Price
                  <span class="mr-2">
                    {{$pro->price}}
                  </span>
                </h6>
              </div>
              <div>
                <a href="{{route('productDetails',$pro->id)}}" class="btn btn-danger p-2 mt-2 text-white form-control">Details</a>
              </div>
        </div>
      </div>
      @endforeach
      </div>
      <br>
    </div>
  </section>