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
              <a class="nav-link " href="/">Home</a>
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
           <button type="button" class="btn btn-danger">Đăng nhập</button>
          <button type="button" class="btn btn-secondary">Đăng ký</button>
          </div>
        </div>
      </nav>

   

    <main role="main" class="container ">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Chi tiết sản phẩm</h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img src="{{ $product->image }}" class="img-responsive w-50"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <h2 class="mt-5">
                        {{ number_format($product->price, 0, ',', '.') }} VNĐ
                    </h2>
                    <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <button class="btn btn-primary btn-rounded">Buy Now</button>
                    <h3 class="box-title mt-5">{{ $product->category->catname }}</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i> {{ $product->category->catname }}</li>
                        <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                        <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
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