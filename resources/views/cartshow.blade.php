<!-- resources/views/cart/show.blade.php -->

@extends('layout')

@section('content')

    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h2>Giỏ hàng</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($cart) > 0)
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Sản phẩm</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;">
                                        <a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart">
                                            <i class="ion ion-md-trash"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cart as $item)
                                @if(isset($item['product']) && is_object($item['product']))
                                    <tr>
                                        <td class="p-4">
                                            <div class="media align-items-center d-flex">
                                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                <div class="media-body">
                                                    <div class="d-block text-dark h3 ps-5">{{ $item['product']->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            {{ number_format($item['product']->price, 0, ',', '.') }}VNĐ
                                        </td>
                                        <td class="align-middle p-4">
                                            <input type="number" class="form-control text-center quantity-input" data-product-id="{{ $item['product']->id }}" value="{{ $item['quantity'] }}" min="1">
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            {{ number_format($item['product']->price * $item['quantity'], 0, ',', '.') }}VNĐ
                                        </td>
                                        <!-- Thêm cột Xóa vào bảng sản phẩm trong Blade Template -->
                                        <form method="POST" action="{{ route('cart.remove', ['product' => $item['product']->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                        
                                            <td class="text-center align-middle px-0">
                                                <button type="submit" class="shop-tooltip close float-none text-danger" >×</button>
                                            </td>
                                        </form>
                                        

                                    </tr>
                                    @php $total += $item['product']->price * $item['quantity']; @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
                <!-- / Shopping cart table -->

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal">Mã khuyến mại</label>
                        <input type="text" placeholder="ABC" class="form-control">
                    </div>
                    <div class="d-flex">
                        
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large">
                                <strong>{{ number_format($total, 0, ',', '.') }}VNĐ</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <a href="/"><button type="button" class="btn btn-lg btn-primary md-btn-flat mt-2 mr-3">Back to shopping</button></a>
                    <a href="/paypal"><button type="button" class="btn btn-lg btn-warning mt-2">Thanh toán</button></a>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy danh sách tất cả các ô số lượng
            const quantityInputs = document.querySelectorAll('.quantity-input');

            // Lặp qua từng ô số lượng và thêm sự kiện khi giá trị thay đổi
            quantityInputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    // Lấy giá trị mới của số lượng và ID sản phẩm
                    const newQuantity = parseInt(this.value) || 1;
                    const productId = this.dataset.productId;

                    // Cập nhật giá tiền trực tiếp trong cùng một dòng
                    const priceElement = this.closest('tr').querySelector('.price');
                    const unitPrice = parseFloat(priceElement.dataset.unitPrice);
                    const totalPrice = newQuantity * unitPrice;
                    priceElement.innerText = formatCurrency(totalPrice);

                    // Gửi yêu cầu AJAX để cập nhật số lượng trên máy chủ
                    // Trong ví dụ này, giả sử bạn có một route là '/update-quantity'
                    fetch(`/update-quantity/${productId}/${newQuantity}`, {
                        method: 'PUT', // hoặc 'POST' tùy thuộc vào cấu hình của bạn
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Điều này là cần thiết nếu bạn sử dụng CSRF protection
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Cập nhật tổng giá và các thông tin khác nếu cần
                        // Ví dụ: document.getElementById('totalPrice').innerText = data.totalPrice;
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });

            // Hàm chuyển đổi số thành định dạng tiền tệ
            function formatCurrency(value) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
            }
        });
        function removeProduct(productId) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?')) {
            // Gửi yêu cầu xóa sản phẩm thông qua AJAX
            fetch(`/remove-product/${productId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    console.log('CSRF Token:', '{{ csrf_token() }}');

                },
            })
            .then(response => response.json())
            .then(data => {
                // Xóa dòng sản phẩm khỏi giao diện nếu xóa thành công
                if (data.success) {
                    const productRow = document.querySelector(`#productRow${productId}`);
                    productRow.parentNode.removeChild(productRow);

                    // Cập nhật tổng giá tiền hoặc các thông tin khác nếu cần
                    // Ví dụ: document.getElementById('totalPrice').innerText = data.totalPrice;
                    console.log(data);
                } else {
                    alert('Đã xảy ra lỗi khi xóa sản phẩm. Vui lòng thử lại.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
    </script>
    @endsection
@endsection