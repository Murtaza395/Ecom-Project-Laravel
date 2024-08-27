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
                    <div class="d-flex">
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>

                </div>

            </div>
            <div>
                <form action="{{ route('updateProduct', $pro->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <label for="title" class="form-label text-white">Product Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $pro->title) }}"
                            class="@error('title') is-invalid @enderror form-control">
                        @error('title')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="form-label text-white">Product Description</label>
                        <textarea name="description" rows="6" class="@error('description') is-invalid @enderror form-control">{{ old('description', $pro->description) }}</textarea>
                        @error('description')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="price" class="form-label text-white">Product Price</label>
                        <input type="text" name="price" id="price" value="{{ old('price', $pro->price) }}"
                            class="@error('price') is-invalid @enderror form-control">
                        @error('price')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="Quantity" class="form-label text-white">Product Quantity</label>
                        <input type="text" name="quantity" id="quantity"
                            value="{{ old('quantity', $pro->quantity) }}"
                            class="@error('quantity') is-invalid @enderror form-control">
                        @error('quantity')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="form-label text-white">Product Category</label><br>
                        <select name="category" id="category"
                            class="@error('category') is-invalid @enderror form-control">
                            <option value="{{ $pro->category }}">
                                {{ $pro->category }}
                            </option>
                            @foreach ($cat as $cate)
                                <option>{{ $cate->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="form-label text-white">Product image</label><br>
                        <input type="file" name="image" id="image" value="{{ old('image', $pro->image) }}"
                            class="form-control">
                    </div>
                    <button class="btn btn-outline-success mt-4 form-control">Submit</button>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
</body>

</html>
