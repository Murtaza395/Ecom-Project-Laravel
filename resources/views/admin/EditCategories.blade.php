<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .category {
            width: 400px;
            height: 50px;
        }

        .d-flex {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
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
                    <h1 style="color:white">Edit Category</h1>
                    <div class="d-flex">
                    </div>
                    <div class="d-flex">
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <form action="{{ route('admin.updateCategory',$cat->id) }}" method="post">
                    @method('put')
                    @csrf
                    <label for="category_name" class="form-label text-white">Category Name</label>
                    <input type="text" name="category_name" class="@error('category_name') is-invalid @enderror form-control bg-light" value="{{old('value',$cat->category_name)}}">
                    @error('category_name')
                        <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                    <button class="form-control btn btn-outline-success mt-3">Update</button>
                </form>
            </div>
            <!-- JavaScript files-->
            <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
            <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
            <script src="{{ asset('admincss/js/front.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        </body>

</html>
