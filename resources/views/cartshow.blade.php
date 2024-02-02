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
                    @if (count($cart) > 0)
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Sản phẩm</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;">
                                        <a href="#" class="shop-tooltip float-none text-light" title=""
                                            data-original-title="Clear cart">
                                            <i class="ion ion-md-trash"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="p-4">
                                            <div class="media align-items-center d-flex">
                                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}"
                                                    class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                <div class="media-body">
                                                    <div class="d-block text-dark h3 ps-5">{{ $item['product']->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            {{ number_format($item['product']->price, 0, ',', '.') }}VNĐ
                                        </td>
                                        <td class="align-middle p-4">
                                            <input type="number" class="form-control text-center quantity-input"
                                                data-product-id="{{ $item['product']->id }}" value="{{ $item['quantity'] }}"
                                                min="1">
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            {{ number_format($item['product']->price * $item['quantity'], 0, ',', '.') }}VNĐ
                                        </td>
                                        <td class="text-center align-middle px-0">
                                            {{-- <a class="btn btn-danger" href="javascript:void(0)" onclick="removeItemFormCart('{{ $item['product']->id }}')"> --}}
                                            <a class="btn btn-danger" href="/cart/remove/{{ $item['product']->id }}"> xoá
                                            </a>
                                            {{-- <button type="submit" class="shop-tooltip close float-none text-danger" >×</button> --}}
                                        </td>
                                        <!-- Thêm cột Xóa vào bảng sản phẩm trong Blade Template -->
                                        <form id="deleteFormCart" method="POST"
                                            action="{{ route('cart.remove', ['product' => $item['product']->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" id="rowId_D" name="rowId">

                                        </form>
                                        <form action="{{ route('cart.clear') }}" id="clearCart" method="POST">
                                            @csrf
                                            @method('DELETE')

                                        </form>


                                    </tr>
                                    @php $total += $item['product']->price * $item['quantity']; @endphp
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
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)" onclick="clearCart()"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear all
                                    items</a>
                            </div>
                        </div>
                        <div class="text-right mt-4">

                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large">
                                <strong>{{ number_format($total, 0, ',', '.') }}VNĐ</strong>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <a href="/"><button type="button" class="btn btn-lg btn-primary md-btn-flat mt-2 mr-3">Back to
                            shopping</button></a>
                    <a href="/paypal"><button type="button" class="btn btn-lg btn-warning mt-2">Thanh toán</button></a>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        function removeItemFormCart(productId) {
            console.log(productId);
            document.getElementById("rowId_D").value(productId);
            document.getElementById("detleteFormCart").submit();
        }

        function clearCart() {
            $('#clearCart').submit()
        }
    </script>
@endpush
