<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')


    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 style="color:white">View Products</h1>
                    <div class="d-flex">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <form class="d-flex justify-content-between" role="search">
                                <input class="form-control me-2" name="search" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div>       
              <div class="page-header bg-dark text-light">
                <div class="container-fluid">
                        @if (!empty($products))
                            @foreach ($products as $pdc)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Title</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $pdc->title }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Description</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $pdc->description  }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Image</label>
                                    </div>
                                    <div class="col-md-6">
                                      <img src="{{ asset('uploads/products/' . $pdc->image) }}" width="70">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Price</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{  $pdc->price }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Category</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $pdc->category }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Quantity</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $pdc->quantity }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white">Created_at</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>{{ $pdc->created_at }}</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="text-white"><h3>Action</h3></label>
                                    </div>
                                    <div class="col-md-6">
                                      <a href="{{ route('editProduct', $pdc->id) }}"
                                        class="btn btn-outline-success">Edit</a>
                                    <form action="{{ route('deleteProduct', $pdc->id) }}" method="post"
                                        id="deleteProductFrom{{ $pdc->id }}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="btn btn-outline-danger mt-2"
                                            onClick="handleDelete({{ $pdc->id }})">Delete</a>
                                    </form>
                                    </div>
                                </div>
                                <div class="col-md-14 bg-warning text-center mt-2">
                                  ...............................................
                                 </div>
                            @endforeach
                        @endif
                </div>
              </div>
            </div>
            <div>{{ $products->links() }}</div>
            <!-- JavaScript files-->
            <script>
                function handleDelete(id) {
                    if (confirm("Are you sure to delete?")) {
                        document.getElementById("deleteProductFrom" + id).submit();
                    }
                }
            </script>
            <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
            <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
            <script src="{{ asset('admincss/js/front.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>

</body>

</html>
