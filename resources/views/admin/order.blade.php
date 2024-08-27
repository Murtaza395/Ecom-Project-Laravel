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
            text-align: center;
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
                    @if (!empty($order))
                        @foreach ($order as $orders)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Customer Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b>{{ $orders->name }}</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b>{{ $orders->rec_address }}</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b>{{ $orders->phone }}</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Product Title</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b>{{ $orders->product->title }}</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Product Price</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b>${{ $orders->product->price }}</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Image</label>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('uploads/products/' . $orders->product->image) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Status of the Order</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b>
                                            @if ($orders->status == 'in progress')
                                                <span class="bg-danger">{{ $orders->status }}</span>
                                            @elseif ($orders->status == 'on the way')
                                                <span class="bg-success">{{ $orders->status }}</span>
                                            @else
                                                <span style="background-color:blue">{{ $orders->status }}</span>
                                            @endif
                                        </b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Change Status</label>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('ontTheWay', $orders->id) }}" class="btn btn-outline-info">On the
                                        way</a>
                                    <a href="{{ route('delivered', $orders->id) }}"
                                        class="btn btn-outline-success">Delivered</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Print PDF</label>
                                </div>
                                <div class="col-md-6">
                                    <p><b> <a href="{{ route('printPDF', $orders->id) }}"
                                                class="btn btn-secondary mt-2">Print PDF</a></b></p>
                                </div>
                            </div>
                            <div class="col-md-14 bg-warning text-center mt-2">
                                ...............................................
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $order->links() }}
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
