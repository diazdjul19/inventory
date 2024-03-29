<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

    <script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


{{-- 
    <script
        src="js/jquery-3.4.1.min.js">
    </script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script> --}}

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Inventory</title>

{{-- font-awesome --}}
<link rel="stylesheet" href="/stellar-master/fonts/fontawesome/css/all.css">

<!-- plugins:css -->
<link rel="stylesheet" href="/stellar-master/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="/stellar-master/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="/stellar-master/vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="/stellar-master/css/style.css" <!-- End layout styles -->
<link rel="shortcut icon" href="/stellar-master/images/favicon-32x32.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:/stellar-master/partials/_navbar.html -->


    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo" href="/stellar-master/index.html">
        <img src="/stellar-master/images/logo.svg" alt="logo" class="logo-dark" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="/stellar-master/index.html"><img src="/stellar-master/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">The Inventory Application</h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">

        <main class="py-4">
            @yield('form')
        </main>

        <li class="nav-item"><a href="{{route('buying.index')}}" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
        <li class="nav-item"><a href="{{route('sales.index')}}" class="nav-link"><i class=" icon-basket menu-icon"></i></li>
        

        
        
        <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            {{-- MENGAMBIL IMAGE DARI SORAGE BAWAAN LARAVEL --}}
            {{-- <img class="img-xs rounded-circle ml-2" src="{{url('/storage/user/'.Auth::user()->user_photo)}}" alt="Profile image"> <span class="font-weight-normal">  {{ Auth::user()->name }} </span></a> --}}

            {{-- MENGAMBIL IMAGE DARI STORAGE CLOUDINARY --}}
            <img class="img-xs rounded-circle ml-2" src="{{Auth::user()->user_photo}}" alt="Profile image"> <span class="font-weight-normal">  {{ Auth::user()->name }} </span></a>
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="dropdown-item-icon icon-power text-primary"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
        </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
        </button>
    </div>
    </nav>




    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:/stellar-master/partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
            <div class="profile-image">
                {{-- MENGAMBIL IMAGE DARI SORAGE BAWAAN LARAVEL --}}
                {{-- <img class="img-xs rounded-circle" src="{{url('/storage/user/'.Auth::user()->user_photo)}}" alt="profile image"> --}}

                {{-- MENGAMBIL IMAGE DARI SORAGE CLOUDINARY --}}
                <img class="img-xs rounded-circle" src="{{Auth::user()->user_photo}}" alt="profile image">

                <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
                <p class="profile-name">{{ Auth::user()->name }} </p>
                <p class="designation">
                    @if (Auth::user()->role == 'admin')
                        <span>Admin</span>
                    @elseif(Auth::user()->role == 'kasir')
                        <span>Kasir</span>
                    @endif
                </p>
            </div>
            
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
            <span class="menu-title">Dashboard</span>
            <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>

        <li class="nav-item nav-category"><span class="nav-link">All Features</span></li>

        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">
                <span class="menu-title">Management User</span>
                <i class="fas fa-users-cog menu-icon"></i>
                </a>
            </li> 
        @else
        @endif
        
        <li class="nav-item">
            <a class="nav-link" href="{{route('category.index')}}">
            <span class="menu-title">Category</span>
            <i class=" icon-layers menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('product.index')}}">
            <span class="menu-title">Product</span>
            <i class="icon-briefcase menu-icon"></i>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('stock.index')}}">
            <span class="menu-title">Stock</span>
            <i class="icon-graph menu-icon"></i>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('customer.index')}}">
            <span class="menu-title">Customers</span>
            <i class=" icon-user menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sales.index')}}">
            <span class="menu-title">Menu Penjualan</span>
            <i class=" icon-basket menu-icon"></i>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('supplier.index')}}">
                <span class="menu-title">Supplier</span>
                <i class=" icon-rocket menu-icon"></i>
                </a>
            </li>
        @else    
        @endif
        

        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('buying.index')}}">
                <span class="menu-title">Menu Pembelian</span>
                <i class=" icon-basket-loaded menu-icon"></i>
                </a>
            </li>
        @else
        @endif

        </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
        <main class="py-4">
            @yield('wrapper')
        </main>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:/stellar-master/partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>
        </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/stellar-master/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/stellar-master/js/off-canvas.js"></script>
<script src="/stellar-master/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->


<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous" defer></script>

{{-- ajax --}}
@stack('script')

{{-- chart js --}}
@stack('chart_js')

{{-- sweetalret 2 --}}
</body>
</html>
