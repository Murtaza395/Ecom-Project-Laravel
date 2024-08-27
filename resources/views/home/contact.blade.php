<section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="text-center bg-dark text-white">
          Need any help? Please! contact us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <img src="{{asset('images/ecom.jpg')}}" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%">
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0 bg-dark">
          <form action="{{route('contactUs')}}" method="post">
            @csrf
            <div>
              <input type="text" class="@error('name') is-invalid @enderror bg-light" name="name" placeholder="Name" >
              @error('name')
                <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>
            <div>
              <input type="email" class="@error('email') is-invalid @enderror bg-light" name="email" placeholder="Email" >
              @error('email')
              <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>
            <div>
              <input type="text" class="@error('phone') is-invalid @enderror bg-light" name="phone" placeholder="Phone" >
              @error('phone')
              <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>
            <div>
            <input type="text" class="@error('address') is-invalid @enderror bg-light" name="address" placeholder="Address">
            @error('address')
            <p class="invalid-feedback">{{$message}}</p>
          @enderror
          </div>
            <div>
              <input type="text" name="message" class="@error('message') is-invalid @enderror message-box bg-light" placeholder="Message" >
              @error('message')
              <p class="invalid-feedback">{{$message}}</p>
            @enderror
            </div>
              <button class="btn btn-outline-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>