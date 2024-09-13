<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Core</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url("stisla/assets/css/style.css") }}">
    <link rel="stylesheet" href="{{ url("stisla/assets/css/components.css") }}">
    <link rel="stylesheet" href="{{ url("stisla/node_modules/sweetalert2/sweetalert2.min.css") }}">

    @yield('addCss')
</head>

<body class="layout-3">
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <a href="{{ route('dashboard') }}" class="navbar-brand sidebar-gone-hide">Fica</a>
            <div class="nav-collapse">
                <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="navbar-nav">
                    @if( in_array("users",json_decode(auth()->user()->roles->menu))
                       || in_array("roles",json_decode(auth()->user()->roles->menu))
                       || in_array("departemens",json_decode(auth()->user()->roles->menu))

                    )
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg ">
                            <i class="fas fa-bars"></i>
                            <div class="d-sm-none d-lg-inline-block">Master</div></a>
                        <div class="dropdown-menu dropdown-menu-left">
                            @if( in_array("users",json_decode(auth()->user()->roles->menu)) )
                                <a href="{{ route('users') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> User
                                </a>
                            @endif
                            @if( in_array("roles",json_decode(auth()->user()->roles->menu)) )
                                <a href="{{ route('roles') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-lock"></i> Roles
                                </a>
                            @endif
                            @if( in_array("departemens",json_decode(auth()->user()->roles->menu)) )
                                <a href="{{ route('departemens') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-building"></i> Departemen
                                </a>
                            @endif
                        </div>
                    </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg ">
                            <i class="fas fa-briefcase"></i>
                            <div class="d-sm-none d-lg-inline-block">Transaksi</div></a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Transaki 1
                            </a>

                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg ">
                            <i class="fas fa-clipboard"></i>
                            <div class="d-sm-none d-lg-inline-block">Laporan</div></a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Laporan 1
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
            <form class="form-inline ml-auto">
                <ul class="navbar-nav">
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ url("stisla/assets/img/avatar/avatar-1.png") }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        @yield('konten')
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2024 <div class="bullet"></div> Me</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ url("stisla/assets/js/stisla.js") }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ url("stisla/assets/js/scripts.js") }}"></script>
<script src="{{ url("stisla/assets/js/custom.js") }}"></script>
<script src="{{ url("stisla/node_modules/sweetalert2/sweetalert2.min.js") }}"></script>

<script>
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Peringatan?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            showDenyButton: true,
            icon: "warning",
            confirmButtonText: "Ya",
            denyButtonText: `Tidak`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
            } else if (result.isDenied) {
                Swal.fire("batal hapus", "", "success");
            }
        });

    });
    @if(Session::has('message'))
    @php
        $message = Session::get('message');
    @endphp
    Swal.fire({
        title: 'Berhasil',
        text: '{{$message['content']}}',
        icon: '{{$message['type']}}',

    });
    @endif
</script>
@yield('addJs')
</body>
</html>
