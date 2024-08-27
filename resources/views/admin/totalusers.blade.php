<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        table,
        td,
        th,
        tr {
            border: 2px solid black;
            font-size: 20px;
            font-weight: bold;
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
            <div class="page-header bg-dark text-light">
                <div class="container-fluid">
                    @foreach ($usr as $user)
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ $user->name }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ $user->email }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><b>{{ $user->phone }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3><label>Action</label></h3>
                            </div>
                            <div class="col-md-6">
                                <p>
                                <form action="{{ route('deleteUser', $user->id) }}"
                                    id="deleteUserFrom{{ $user->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" onClick="handleDelete({{ $user->id }})"
                                        class="btn btn-primary">Delete User</a>
                                </form>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-14 bg-warning text-center mt-2">
                            ...............................................
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- JavaScript files-->
            <script>
                function handleDelete(id) {
                    if (confirm("Are you sure to delete this?"))
                        document.getElementById("deleteUserFrom" + id).submit();
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
