function toggleWishlist(productId, element) {
    // التحقق من إذا كانت الأيقونة ممتلئة أو فارغة
    const icon = element.querySelector('i');

    if (icon.classList.contains('filled')) {
        // إذا كان القلب ممتلئًا، أزله من المفضلة
        removeFromWishlist(productId);
        icon.classList.remove('filled'); // جعله فارغًا
        updateWishlistCount(-1); // تقليل العدد في أيقونة المفضلة
    } else {
        // إذا كان القلب فارغًا، أضف المنتج إلى المفضلة
        addToWishlist(productId);
        icon.classList.add('filled'); // جعله ممتلئًا
        updateWishlistCount(1); // زيادة العدد في أيقونة المفضلة
    }
}

function addToWishlist(productId) {
    // أضف المنتج إلى المفضلة باستخدام AJAX أو أي طريقة أخرى
    console.log("Adding product " + productId + " to wishlist");
    // إرسال الطلب إلى السيرفر باستخدام AJAX لإضافة المنتج للمفضلة
}

function removeFromWishlist(productId) {
    // أزل المنتج من المفضلة باستخدام AJAX أو أي طريقة أخرى
    console.log("Removing product " + productId + " from wishlist");
    // إرسال الطلب إلى السيرفر باستخدام AJAX لإزالة المنتج من المفضلة
}

function updateWishlistCount(change) {
    const wishlistCount = document.getElementById('wishlistCount');
    const currentCount = parseInt(wishlistCount.textContent) || 0;
    wishlistCount.textContent = currentCount + change;
}

function addToWishlist(productId) {
    $.ajax({
        url: `/wishlist/add/${productId}`,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Product added to wishlist');
        },
        error: function(error) {
            console.log('Error adding product to wishlist');
        }
    });
}

function removeFromWishlist(productId) {
    $.ajax({
        url: `/wishlist/remove/${productId}`,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Product removed from wishlist');
        },
        error: function(error) {
            console.log('Error removing product from wishlist');
        }
    });
}

function addToCart(event, form) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(form); // Get form data

    fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update the cart count on the page
            document.getElementById('cartCount').innerText = data.cartCount;
        })
        .catch(error => console.error('Error adding to cart:', error));
}

function removeFromCart(event, form) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(form); // Get form data

    fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update the cart count on the page
            document.getElementById('cartCount').innerText = data.cartCount;
        })
        .catch(error => console.error('Error removing from cart:', error));
}