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
                    <h1 style="color:white" class="text-center">Add Category</h1>
                    <div class="d-flex">
                        <form action="{{ route('addCategory') }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="category_name"
                                    value="{{ old('category_name') }}"class="category">
                                <input type="submit" class="btn btn-primary" value="Add category">
                            </div>
                        </form>
                    </div>
                    <div class="page-header bg-dark text-light">
                        <div class="container-fluid">
                            @if (!empty($category))
                                @foreach ($category as $cat)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Category Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><b>{{ $cat->category_name }}</b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Created at</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><b>{{ \carbon\carbon::parse($cat->created_at)->format('d M,Y') }}</b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Action</label>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.editCategory', $cat->id) }}"
                                                class="btn btn-outline-success">Edit</a>
                                            <form id="deleteData{{ $cat->id }}" method="post"
                                                action="{{ route('deleteCategory', $cat->id) }}">
                                                @csrf
                                                @method('delete')
                                                <a href="#" onClick="submitForm({{ $cat->id }})"
                                                    class="btn btn-outline-danger mt-2">Delete</a>
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

                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script>
        function submitForm(id) {
            if (confirm("Are you sure to delete this category?")) {
                document.getElementById("deleteData" + id).submit();
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
