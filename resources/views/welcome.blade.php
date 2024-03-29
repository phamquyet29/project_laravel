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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="">
      <img class="position-absolute z-1 h-50 position-fixed mt-5 top-0 start-0 pt-5" src="https://fptshop.com.vn/Content/images/tet-2024/img-left.png?v=122111" alt="">
      <img class="position-absolute z-1 h-50 position-fixed mt-5 top-0 end-0 pt-5" src="https://fptshop.com.vn/Content/images/tet-2024/img-left.png?v=122111" alt="">

    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img class="w-25 ms-5" src="https://yt3.googleusercontent.com/x004E0HiAYxL05tMZX9-mJ8DpMadnMd9BbKvVTDCOyt_vrLqdEvYy-lpLmZrotSB_R1SoSJULm4=s176-c-k-c0x00ffffff-no-rj" alt=""></a>
      
        <div class="collapse navbar-collapse d-flex justify-content-evenly" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
            <li class="nav-item active pe-5">
              <a class="nav-link " href="#">Home</a>
            </li>
            <li class="nav-item pe-5">
              <a class="nav-link" href="#">Sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/products">Admin</a>
            </li>
          </ul>
          <a href="{{ route('cart.show') }}">
            Cart <span class="badge badge-pill badge-info">{{ count(Session::get('cart', [])) }}</span>
        </a>
        
          <form class="form-inline my-2 my-lg-0 d-flex ms-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 ms-2" type="submit">Search</button>
          </form>
          <div>
          <a class="btn btn-danger" href="/login">Signin</a>
          <a class="btn btn-secondary" href="/register">Signup</a>
          <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </nav>

    <div class="container">

      <div class="d-flex">
        <img src="https://theme.hstatic.net/1000090364/1001154354/14/slider_1.jpg?v=159" alt="">
        <div class="d-flex flex-column ps-5 pt-4">
          <img class="pb-3" src="https://theme.hstatic.net/1000090364/1001154354/14/right_banner_1.jpg?v=159" alt="">
        <img src="https://theme.hstatic.net/1000090364/1001154354/14/right_banner_2.jpg?v=159" alt="">
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="#">Áo nam</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">Áo thun nam form basic, ngắn tay _ Gavani akh Shining</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block w-25" src="https://i.pinimg.com/564x/fb/41/3d/fb413d7a84a6244465feada20d43146d.jpg" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="#">Áo nam</a>
              </h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="card-text mb-auto">Áo thun nam form basic, ngắn tay _ Gavani akh Shining</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block w-25" src="https://i.pinimg.com/564x/f7/79/8c/f7798cc2e4e7562cc7b2a0c937098cb4.jpg" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container ">
      <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach ($products as $product)
        <div class="col">
          <div class="card">
            <a href="{{ route('products.show', ['id' => $product->id]) }}"><img class="w-100" src={{ $product->image }} class="card-img-top"
              alt="Hollywood Sign on The Hill" /></a>
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">
                {{ $product->description }}
              </p>
              <p class="text-center fw-semibold">{{ number_format($product->price, 0, ',', '.') }}VNĐ</p>
              <div class="d-flex justify-content-center">
                <div class="d-flex flex-colunm justify-content-center ">
                  <a href="/paypal" class="btn bg-warning text-white ps-5 pe-5">Buy</a>
  
                </div>
                <div class="d-flex flex-colunm justify-content-center ps-1">
                  <a href="{{ route('cart.add', ['product' => $product->id]) }}" class="btn bg-danger text-white"><i class="bi bi-cart-plus"></i></a>
  
                </div>
                
              </div>
            </div>
            
          </div>
          
        </div>
        @endforeach
      </div>  



    </main><!-- /.container -->

    <div class="container ">
      <footer class="py-5">
        <div class="row">
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
          </div>
    
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
          </div>
    
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
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
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
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

document.addEventListener('DOMContentLoaded', function () {
    const cartButton = document.getElementById('cartButton');
    const cartItemCount = document.getElementById('cartItemCount');

    // Lấy số lượng từ server nếu cần
    let cartItemCountFromServer = parseInt(cartItemCount.innerText);

    // Cập nhật số lượng trên nút "Cart" khi trang web tải lên
    updateCartItemCount();

    // Mô phỏng việc thêm sản phẩm vào giỏ hàng
    cartButton.addEventListener('click', function () {
        cartItemCountFromServer++;
        updateCartItemCount();
    });

    function updateCartItemCount() {
        // Cập nhật số lượng từ biến cartItemCountFromServer
        cartItemCount.innerText = cartItemCountFromServer;

        // Thêm class 'added' để kích hoạt hiệu ứng nhảy số
        cartItemCount.classList.add('added');

        // Xóa class 'added' sau khi kết thúc hiệu ứng nhảy số
        setTimeout(function () {
            cartItemCount.classList.remove('added');
        }, 300); // Thời gian hiệu ứng (miligiây)
    }
});


  </script>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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