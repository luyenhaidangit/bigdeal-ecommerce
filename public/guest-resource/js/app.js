$(document).ready(function () {
    //Handle click add to cart top bar
    $(document).on("click", ".add-to-cart-btn", function () {
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
                    productOptionId: null,
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
                    if (
                        newProduct.productOptions &&
                        newProduct.productOptions.length > 0
                    ) {
                        // Set the productOption field to the first product option
                        newProduct.productOptionId =
                            newProduct.productOptions[0].id;
                        newProduct.price = newProduct.productOptions[0].price;
                        newProduct.discount_price =
                            newProduct.productOptions[0].discount_price;
                    }
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

    $(document).on("click", ".delete-to-cart", function () {
        var productId = $(this).data("product-id");

        // Get cart data from localStorage
        var cart = JSON.parse(localStorage.getItem("cart"));

        // Find the index of the product in the cart
        var productIndex = cart.findIndex(function (product) {
            return product.id === productId;
        });

        if (productIndex !== -1) {
            // Remove the product from the cart
            cart.splice(productIndex, 1);

            // Update the cart data in localStorage
            localStorage.setItem("cart", JSON.stringify(cart));

            // Render the updated cart items
            renderCartItems();
        }
    });

    $(document).on("click", ".edit-to-cart", function () {
        var productId = $(this).data("product-id");
        // Get product data from API
        $.getJSON(`/api/product/${productId}`)
            .done(function (data) {
                $("#edit-product").data("product-id", productId);
                $("#edit-product .product-img img").attr("src", data.image);
                $("#edit-product .product-img img").attr("src", data.image);
                $("#edit-product .media-body h3").text(data.name);
                $("#edit-product .media-body h6").html(
                    `${formatPrice(data.price)}<span>${formatPrice(
                        data.discount_price
                    )}</span>`
                );
                if (data.product_options && data.product_options.length > 0) {
                    $("#choose-option").show();

                    var selectElement = $("#edit-product").find("select");

                    // Xóa các tùy chọn hiện có
                    selectElement.empty();

                    // Thêm các tùy chọn sản phẩm vào select
                    $.each(data?.product_options, function (index, option) {
                        var optionText = "";

                        // Xây dựng nội dung cho tùy chọn
                        if (option.color) {
                            optionText += "Màu: " + option.color + " ";
                        }

                        if (option.size) {
                            optionText += "Kích thước: " + option.size + " ";
                        }

                        if (option.ram) {
                            optionText += "Ram: " + option.ram + " ";
                        }

                        if (option.rom) {
                            optionText += "Rom: " + option.rom + " ";
                        }

                        if (option.ram_rom) {
                            optionText += "Ram-Rom: " + option.ram_rom + " ";
                        }

                        if (option.cpu) {
                            optionText += "CPU: " + option.cpu + " ";
                        }

                        if (option.sweep_frequency) {
                            optionText +=
                                "Tần số: " + option.sweep_frequency + " ";
                        }

                        if (option.hard_drive) {
                            optionText += "Ổ cứng: " + option.hard_drive + " ";
                        }

                        if (option.resolution) {
                            optionText +=
                                "Độ phân giải: " + option.resolution + " ";
                        }

                        // Lấy cart từ localStorage
                        var cart = JSON.parse(localStorage.getItem("cart"));

                        // Tìm sản phẩm trong cart với productId tương ứng
                        var product = cart.find(function (item) {
                            return item.id === productId;
                        });

                        var optionElement = $("<option>").text(optionText);
                        selectElement.append(optionElement);
                        if (product?.productOptionId === option.id) {
                            optionElement.attr("selected", true);
                        }     
                        optionElement.val(option?.id);
                    });
                } else {
                    $("#choose-option").hide();
                }

                var cartItems = JSON.parse(localStorage.getItem("cart")) || [];

                var productIndex = cartItems.findIndex(function (item) {
                    return item.id === productId;
                });

                if (productIndex !== -1) {
                    // Get the quantity input field
                    var quantityInput = $("#edit-product .qty-adj");

                    // Update the quantity field with the value from the shopping cart
                    quantityInput.val(cartItems[productIndex].quantity);
                }
            })
            .fail(function (jqxhr, textStatus, error) {
                // Handle error when API request fails
                console.error("Error retrieving product data:", error);
            });
    });

    $(document).on("click", ".save-to-cart", function () {
        var productId = $("#edit-product").data("product-id");
    
        var selectedOption = $("#edit-product select option:selected");
        var productOptionId = selectedOption.val();
        var quantity = parseInt($("#edit-product .qty-adj").val());

        var cart = JSON.parse(localStorage.getItem("cart"));

        // Find the product in the cart with the corresponding productId
        var product = cart.find(function (item) {
            return item.id === productId;
        });

        console.log(product)

        if (product) {
            var selectedProductOption = product.productOptions.find(function(option) {
                return option.id === +productOptionId;
            });

            // Update the productOptionId and quantity fields
            product.productOptionId = productOptionId;
            product.quantity = quantity;
            product.price = selectedProductOption.price;
            product.discount_price = selectedProductOption.discount_price;
    
            // Update the cart in localStorage
            localStorage.setItem("cart", JSON.stringify(cart));
        }

        $("#edit-product").modal("hide");

        renderCartItems();
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
                            <h6>${formatPrice(
                                product.price
                            )} <span>${formatPrice(
                product.discount_price
            )}</span></h6>
                            <div class="addit-box">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus"></button>
                                        <input class="qty-adj form-control" type="number" value="${
                                            product.quantity
                                        }">
                                        <button class="qty-plus"></button>
                                    </div>
                                </div>
                                <div class="pro-add">
                                    <a href="javascript:void(0)" class="edit-to-cart" data-product-id="${
                                        product.id
                                    }" data-bs-toggle="modal" data-bs-target="#edit-product"><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="delete-to-cart" data-product-id="${
                                        product.id
                                    }"><i data-feather="trash-2"></i></a>
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
        var formattedPrice = numericPrice
            .toFixed(0)
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        var finalPrice = formattedPrice + "đ";

        return finalPrice;
    }
});
