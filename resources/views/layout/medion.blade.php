<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>@yield('title')</title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend.css') }}">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="{{ route('index') }}">
            <img src="" alt="">
            <span>
              ApotikU
            </span>
          </img>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex flex-lg-row align-items-center w-100 justify-content-xl-end">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('daftar-obat')}}"> Obat </a>
                </li>
                @can('add-cart-permission')
                <li class="nav-item">
                  <div class="dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown"> Cart </a>
                    <div class="dropdown-menu">
                        @if(session('cart'))
                        <?php
                            $jml= 0;
                            $total= 0;
                        ?>
                        @foreach(session('cart') as $id=>$details)
                        <?php
                            $jml+= $details['quantity'];
                            $total+= $details['quantity']* $details['price'];
                        ?>
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="{{ asset('images/'.$details['image']) }}">
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{$details['name']}}</p>
                                <span class="price text-info"> Rp {{$details['price']}}</span> <span class="count"> Qty: {{$details['quantity']}}</span>
                            </div>
                        </div>
                        @endforeach
                      
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6 total-section">
                                <p>Total: <span class="text-info">{{number_format($total, 0, ', ','.')}}</span></p>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ url('checkout') }}" class="btn btn-danger btn-block">Checkout</a>
                            </div>
                        </div>
                  </div>
                </li>
                @endcan
              </ul>
              @if(Auth::user() == null)
              <div class="login_btn-contanier ml-0 ml-lg-5">
                  <a href="{{ route('login') }}">
                    <span>Login</span>
                  </a>
              </div>
              <div class="login_btn-contanier ml-0 ml-lg-5">
                  <a href="{{ route('register') }}">
                    <span>Register</span>
                  </a>
              </div>
              @else
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <div class="dropdown user">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                    <span>
                      @if(auth()->user()->pembeli)
                        {{ auth()->user()->pembeli->name }}
                      @else(auth()->user()->admin)
                      {{ auth()->user()->admin->name }}
                      @endif
                    </span>
                  </a>
                <div class="dropdown-menu">
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block">Logout</button>
                  </form>
                </div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- content section -->
  <section class="health_section layout_padding">
      @yield('content')
  </section>
  <!-- end content section -->

  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
  <script type="text/javascript">
    $(".owl-2").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,

      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
</body>
</html>