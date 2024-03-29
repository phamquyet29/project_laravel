<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PayPal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-10 offset-1 mt-5">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="text-white text-center">Thanh Toán</h3>
                    <div class="d-flex justify-content-center">
                        <img class="w-25 " src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/PayPal_logo.svg/2560px-PayPal_logo.svg.png" alt="">
                    </div>
                </div>
                <div class="card-body">
  
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
  
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>{{ $message }}</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                          
                    <center>
                        <a href="{{ route('paypal.payment') }}" class="btn btn-primary">Pay with PayPal </a>
                    </center>
                    <a href="/"><button class="btn btn-warning">back home</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>