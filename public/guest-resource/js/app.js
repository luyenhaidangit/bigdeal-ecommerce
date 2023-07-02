$(document).ready(function () {
    $(".add-to-cart-btn").click(function () {
        var productId = $(this).data("product-id");

        // Get product data from API
        $.getJSON(`/api/product/${productId}`)
            .done(function (data) {
                var newProduct = {
                    id: data?.id,
                    name: data?.name,
                    price: data?.price,
                    discount_price: data?.discount_price,
                    image: data?.image,
                    productOptions: data?.product_options,
                };

                // Check if the cart exists in localStorage
                var cart = JSON.parse(localStorage.getItem("cart"));
                if (!cart) {
                    // Create a new cart if it doesn't exist
                    cart = [];
                }

                // Check if the product already exists in the cart
                var productIndex = cart.findIndex(function (product) {
                    return product.id === newProduct.id;
                });

                if (productIndex !== -1) {
                    // Product already exists, increase the quantity
                    cart[productIndex].quantity += 1;
                } else {
                    // Product doesn't exist, add it with quantity 1
                    newProduct.quantity = 1;
                    cart.push(newProduct);
                }

                localStorage.setItem("cart", JSON.stringify(cart));

                renderCartItems();
            })
            .fail(function (jqxhr, textStatus, error) {
                // Handle error when API request fails
                console.error("Error retrieving product data:", error);
            });

        document.getElementById("cart_side").classList.add("open-side");
    });
});

function renderCartItems() {
    var cart = JSON.parse(localStorage.getItem("cart"));
    var cartProductList = $(".cart_product");
    var totalAmount = 0;

    if (!cart) {
        // Cart is empty, clear the existing cart product list
        cartProductList.empty();
        return;
    }

    // Clear the existing cart product list
    cartProductList.empty();

    // Loop through the cart items and create HTML elements
    cart.forEach(function (product) {
        var listItem = $(`
            <li>
                <div class="media">
                    <img class="me-3" src="${product.image}">
                    <div class="media-body">
                        <a href="#"><h4>${product.name}</h4></a>
                        <h6>${formatPrice(product.price)} <span>${formatPrice(product.discount_price)}</span></h6>
                        <div class="addit-box">
                            <div class="qty-box">
                                <div class="input-group">
                                    <button class="qty-minus"></button>
                                    <input class="qty-adj form-control" type="number" value="${product.quantity}">
                                    <button class="qty-plus"></button>
                                </div>
                            </div>
                            <div class="pro-add">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product"><i data-feather="edit"></i></a>
                                <a href="javascript:void(0)"><i data-feather="trash-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        `);

        cartProductList.append(listItem);

        var subtotal = parseFloat(product.price) * product.quantity;
        totalAmount += subtotal;
    });

    // Initialize Feather icons
    feather.replace();
    $("#total-cart").text(formatPrice(totalAmount));
    $("#total-cart-1").text(formatPrice(totalAmount));
}

function formatPrice(price) {
    if (isNaN(price)) {
        return "Invalid Price";
    }

    var numericPrice = parseFloat(price);
    var formattedPrice = numericPrice.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    var finalPrice = formattedPrice + "đ";

    return finalPrice;
}
