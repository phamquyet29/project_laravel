@extends('layout')
<!--Main Navigation-->
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

        <!-- Bootstrap core CSS -->
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="w.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link href="blog.css" rel="stylesheet">
    </head>

    <body>

        <div class="">
            <img class="position-absolute z-1 h-50 position-fixed mt-5 top-0 start-0 pt-5"
                src="https://fptshop.com.vn/Content/images/tet-2024/img-left.png?v=122111" alt="">
            <img class="position-absolute z-1 h-50 position-fixed mt-5 top-0 end-0 pt-5"
                src="https://fptshop.com.vn/Content/images/tet-2024/img-left.png?v=122111" alt="">

        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="w-25 ms-5"
                    src="https://yt3.googleusercontent.com/x004E0HiAYxL05tMZX9-mJ8DpMadnMd9BbKvVTDCOyt_vrLqdEvYy-lpLmZrotSB_R1SoSJULm4=s176-c-k-c0x00ffffff-no-rj"
                    alt=""></a>

            <div class="collapse navbar-collapse d-flex justify-content-evenly" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active pe-5">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item pe-5">
                        <a class="nav-link" href="#">Sản phẩm</a>
                    </li>

                    @auth
                        @if (auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Admin</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <a class="btn btn-warning" href="{{ route('cart.show') }}">
                    Cart <span class="badge badge-pill badge-info">{{ count(Session::get('cart', [])) }}</span>
                </a>

                <form class="form-inline my-2 my-lg-0 d-flex ms-5" action="{{ route('products.search') }}" method="GET">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="keyword">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <!-- Navbar code ... -->

                <div>
                    @guest
                        <!-- Hiển thị khi chưa đăng nhập -->
                        <a class="btn btn-danger" href="/login">Signin</a>
                        <a class="btn btn-secondary" href="/register">Signup</a>
                    @else
                        <!-- Hiển thị khi đã đăng nhập -->
                        <div class="d-flex">
                            <a class="navbar-text pe-3 text-decoration-none" href="{{ route('profile') }}">
                                <p class="navbar-text pe-3 pt-3">Welcome, {{ Auth::user()->name }}</p>
                            </a>

                            <div>
                                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mt-3" type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Rest of the Navbar code ... -->

            </div>
        </nav>

        <div class="container mt-5 pt-5">

            <div class="d-flex">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://file.hstatic.net/1000402464/file/jh-fl_3890x1820-100_ee1327cd6e6c44ca8be214a2b22da43e.jpg"
                                class="d-block w-100" alt="Slide 1">

                        </div>
                        <div class="carousel-item">
                            <img src="https://file.hstatic.net/1000402464/file/jh_3890x1820-100_adc21bb9e5ef425a948d44f679920b2c.jpg"
                                class="d-block w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://file.hstatic.net/1000402464/file/fl_3890x1820_-100_378b9aae4ffc46c1bc2be18aedf3bb2a.jpg"
                                class="d-block w-100" alt="Slide 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <div class="d-flex flex-column ps-5 pt-4">
                    <img class="pb-3" src="https://theme.hstatic.net/1000090364/1001154354/14/right_banner_1.jpg?v=159"
                        alt="">
                    <img src="https://theme.hstatic.net/1000090364/1001154354/14/right_banner_2.jpg?v=159" alt="">
                </div>
            </div>
            <div class="d-flex justify-content-around pt-5">
                <div>
                    <img style="width: 400px" src="https://routine.vn/media/amasty/webp/wysiwyg/New_Arrivals_Men_jpg.webp"
                        alt="">
                </div>
                <div>
                    <img style="width: 400px"
                        src="https://routine.vn/media/amasty/webp/wysiwyg/AO_THUN_DONG_GIA_149K_jpg.webp" alt="">
                </div>
                <div>
                    <img style="width: 400px"
                        src="https://routine.vn/media/amasty/webp/wysiwyg/New_Arrivals_Women_jpg.webp" alt="">
                </div>
            </div>
            <div id="carouselExampleInterval" class="carousel slide mt-5 mb-5 bg-light p-5" data-bs-ride="carousel">
                <div class="carousel-inner ">
                    @foreach ($products as $key => $product)
                        <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000">
                            <div class="d-flex justify-content-evenly">
                                <img class="d-block w-25 " src="{{ $product->image }}" alt="Product Image">
                                <div>
                                    <h1>{{ $product->name }}</h1>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <!-- Bạn có thể thêm mô tả hoặc nội dung khác ở đây nếu cần -->
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="text-danger" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                    <span class="visually-hidden ">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class=" text-danger" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

        <main role="main" class="container ">
            <div class="pb-5">
                <p class="text-center fs-3 fw-bolder text-decoration-underline">NEW ARRIVALS</p>
            </div>
            <div class="row row-cols-1 row-cols-md-5 g-4 ">
                @if (!empty($products))
                    @foreach ($products as $product)
                        <div class="col w-25 ">
                            <div class="card hover-shadow shadow p-3 bg-white rounded border-0 h-100 ps-3 pe-3">
                                <div class="h-50 pb-5 ">
                                    <a class="" href="{{ route('products.show', ['id' => $product->id]) }}">
                                        <img class="card-img-top pb-5 w-100" src="{{ $product->image }}"
                                            alt="Product Image">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="text-center fw-semibold">
                                        {{ number_format($product->price, 0, ',', '.') }}VNĐ</p>
                                    <div class="d-flex justify-content-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href="{{ route('products.show', ['id' => $product->id]) }}"
                                                class="btn bg-warning text-white ps-4 pe-4">Chi tiết</a>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center ps-1">
                                            <a href="{{ route('cart.add', ['product' => $product->id]) }}"
                                                class="btn bg-danger text-white">
                                                <i class="bi bi-cart-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No products found.</p>
                @endif
            </div>





        </main><!-- /.container -->

        <div class="container ">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Dashboard</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Dashboard</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Dashboard</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">About</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2023 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#twitter" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#instagram" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#facebook" />
                                </svg></a></li>
                    </ul>
                </div>
            </footer>
        </div>

        <!-- Bootstrap core JavaScript
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script>
            // public/js/scripts.js hoặc tương tự

            // public/js/scripts.js hoặc tương tự

            document.addEventListener('DOMContentLoaded', function() {
                const cartButton = document.getElementById('cartButton');
                const cartItemCount = document.getElementById('cartItemCount');

                // Lấy số lượng từ server nếu cần
                let cartItemCountFromServer = parseInt(cartItemCount.innerText);

                // Cập nhật số lượng trên nút "Cart" khi trang web tải lên
                updateCartItemCount();

                // Mô phỏng việc thêm sản phẩm vào giỏ hàng
                cartButton.addEventListener('click', function() {
                    cartItemCountFromServer++;
                    updateCartItemCount();
                });

                function updateCartItemCount() {
                    // Cập nhật số lượng từ biến cartItemCountFromServer
                    cartItemCount.innerText = cartItemCountFromServer;

                    // Thêm class 'added' để kích hoạt hiệu ứng nhảy số
                    cartItemCount.classList.add('added');

                    // Xóa class 'added' sau khi kết thúc hiệu ứng nhảy số
                    setTimeout(function() {
                        cartItemCount.classList.remove('added');
                    }, 300); // Thời gian hiệu ứng (miligiây)
                }
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script>
            window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
        </script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        </script>


    </body>

    </html>

    <!--Main Navigation-->
@endsection
