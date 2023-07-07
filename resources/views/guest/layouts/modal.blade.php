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
                                    <img style="height: 80px !important;width: 80px !important" src=""
                                        alt="">
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

<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>Tài khoản</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <form class="theme-form" action="{{ route('guest.customer.login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu"
                    required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-solid btn-md btn-block">Đăng nhập</button>
            </div>
            <div class="accout-fwd">
                <a href="{{ route('guest.customer.forget_password') }}" class="d-block">
                    <h5>Quên mật khẩu?</h5>
                </a>
                <a href="{{ route('guest.customer.register') }}" class="d-block">
                    <h6>Chưa có tài khoản? <span>Đăng ký ngay</span></h6>
                </a>
            </div>
        </form>
    </div>
</div>
<!-- Add to account bar end-->

<!-- wishlistbar bar -->
<div id="wishlist_side" class="add_to_cart right ">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>Yêu thích</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product wishlist-products">
                {{-- <li>
            <div class="media">
              <a href="product-page(left-sidebar).html">
                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/1.jpg">
              </a>
              <div class="media-body">
                <a href="product-page(left-sidebar).html">
                  <h4>redmi not 3</h4>
                </a>
                <h6>
                  $80.00 <span>$120.00</span>
                </h6>
                <div class="addit-box">
                  <div class="qty-box">
                    <div class="input-group">
                      <button class="qty-minus"></button>
                      <input class="qty-adj form-control" type="number" value="1"/>
                      <button class="qty-plus"></button>
                    </div>
                  </div>
                  <div class="pro-add">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                      <i data-feather="edit"></i>
                    </a>
                    <a href="javascript:void(0)">
                      <i  data-feather="trash-2"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="media">
              <a href="product-page(left-sidebar).html">
                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/2.jpg">
              </a>
              <div class="media-body">
                <a href="product-page(left-sidebar).html">
                  <h4>Double Door Refrigerator</h4>
                </a>
                <h6>
                  $80.00 <span>$120.00</span>
                </h6>
                <div class="addit-box">
                  <div class="qty-box">
                    <div class="input-group">
                      <button class="qty-minus"></button>
                      <input class="qty-adj form-control" type="number" value="1"/>
                      <button class="qty-plus"></button>
                    </div>
                  </div>
                  <div class="pro-add">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                      <i data-feather="edit"></i>
                    </a>
                    <a href="javascript:void(0)">
                      <i  data-feather="trash-2"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="media">
              <a href="product-page(left-sidebar).html">
                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/3.jpg">
              </a>
              <div class="media-body">
                <a href="product-page(left-sidebar).html">
                  <h4>woman hande bag</h4>
                </a>
                <h6>
                  $80.00 <span>$120.00</span>
                </h6>
                <div class="addit-box">
                  <div class="qty-box">
                    <div class="input-group">
                      <button class="qty-minus"></button>
                      <input class="qty-adj form-control" type="number" value="1"/>
                      <button class="qty-plus"></button>
                    </div>
                  </div>
                  <div class="pro-add">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                      <i data-feather="edit"></i>
                    </a>
                    <a href="javascript:void(0)">
                      <i  data-feather="trash-2"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li> --}}
            </ul>
            <ul class="cart_total">
                <li>
                    Tổng tiền : <span id="wishlist-total-1">$1050.00</span>
                </li>
                <li>
                    Phí Ship <span>Free</span>
                </li>
                <li>
                    Thuế <span>0đ</span>
                </li>
                <li>
                    <div class="total">
                        Thanh toán<span id="wishlist-total-2">$1050.00</span>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('guest.customer.wishlist') }}" class="btn btn-solid btn-block btn-md">Xem danh sách</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- wishlistbar bar end-->
