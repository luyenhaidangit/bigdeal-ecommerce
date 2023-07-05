<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart top open-to-cart">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>Giỏ hàng</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media cart-media__total">
            <ul class="cart_product">
            </ul>
            <ul class="cart_total">
                <li>
                    Tổng tiền : <span id="total-cart"></span>
                </li>
                <li>
                    Phí : <span>FREE</span>
                </li>
                <li>
                    Thuế <span>0đ</span>
                </li>
                <li>
                    <div class="total">
                        Thanh toán: <span id="total-cart-1"></span>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('guest.cart') }}" class="btn btn-solid btn-sm">Giỏ hàng</a>
                        <a href="{{ route('guest.checkout') }}" class="btn btn-solid btn-sm ">Thanh toán</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add to cart bar end-->
<!-- edit product modal start-->
<div class="modal fade bd-example-modal-lg theme-modal pro-edit-modal" id="edit-product" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="pro-group">
                    <div class="product-img">
                        <div class="media">
                            <div class="img-wraper me-2">
                                <a href="product-page(left-sidebar).html">
                                    <img style="height: 80px !important;width: 80px !important" src="../assets/images/layout-2/product/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h3>redmi not 3</h3>
                                </a>
                                <h6>$80<span>$120</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pro-group" id="choose-option">
                    <h6 class="product-title">Lựa chọn sản phẩm</h6>
                    <select class="form-control">
                      
                    </select>
                </div>
                <div class="pro-group">
                    <h6 class="product-title">Số lượng</h6>
                    <div class="qty-box">
                        <div class="input-group">
                            <button class="qty-minus"></button>
                            <input class="qty-adj form-control" type="number" value="1" />
                            <button class="qty-plus"></button>
                        </div>
                    </div>
                </div>
                <div class="pro-group mb-0">
                    <div class="modal-btn">
                        <a href="javascript:void(0)" class="btn btn-solid btn-sm save-to-cart">
                            Lưu
                        </a>
                        <a href="product-page(left-sidebar).html" class="btn btn-solid btn-sm">
                            Chi tiết
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit product modal end-->
