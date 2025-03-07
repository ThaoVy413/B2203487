document.addEventListener("DOMContentLoaded", function () {
    console.log("DOMContentLoaded event triggered");

    fetch("get_books.php")
        .then(response => response.json())
        .then(data => {
            let productList = document.getElementById("product-list");
            productList.innerHTML = "";

            data.forEach(book => {
                let bookItem = document.createElement("div");
                bookItem.classList.add("product-item");
                bookItem.innerHTML = `
                    <img src="${book.Hinh}" alt="${book.TenSach}">
                    <h3>${book.TenSach}</h3>
                    <p>${book.DonGia}đ</p>
                    <div class="product-actions">
                        <button onclick="showProductDetails('${book.MaSach}', '${book.Hinh}', '${book.TenSach}', '${book.DonGia}', '${book.MoTa}')">Xem ngay</button>
                        <button class="buy-now" data-id="${book.MaSach}">Mua ngay</button>
                    </div>`;
                productList.appendChild(bookItem);
            });

            // Thêm sự kiện cho nút "Mua ngay"
            document.querySelectorAll(".buy-now").forEach(button => {
                button.addEventListener("click", function () {
                    let productId = this.getAttribute("data-id");
                    console.log("Mua ngay - Sách ID:", productId);
                    addToCartAndRedirect(productId);
                });
            });
        })
        .catch(error => console.error("Lỗi khi lấy danh sách sách:", error));
});




// Thêm vào giỏ hàng và chuyển đến cart.php
function addToCartAndRedirect(productId) {
    fetch("add_to_cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "product_id=" + productId
    })
    .then(response => response.text())
    .then(data => {
        console.log("Server Response:", data);
        
        if (data.trim() === "success") {
            updateCartCount(); // Cập nhật số lượng giỏ hàng
            window.location.href = "cart.php"; // Điều hướng đến trang giỏ hàng
        } else {
            alert("Lỗi: " + data);
        }
    })
    .catch(error => console.error("Lỗi khi gửi request:", error));
}


function updateCartCount() {
    fetch("get_cart_count.php")
    .then(response => response.text())
    .then(count => {
        document.getElementById("cart-count").innerText = count; // Cập nhật số lượng
    })
    .catch(error => console.error("Lỗi khi cập nhật giỏ hàng:", error));
}

// Gọi ngay khi trang load để cập nhật số lượng
document.addEventListener("DOMContentLoaded", updateCartCount);



// Hiển thị chi tiết sản phẩm
function showProductDetails(id, img, title, price, description) {
    document.getElementById('popup-img').src = img;
    document.getElementById('popup-title').innerText = title;
    document.getElementById('popup-price').innerText = `Giá: ${price}đ`;
    document.getElementById('popup-description').innerText = description;
    
    // Gán ID sách vào nút "Thêm vào giỏ hàng"
    let addToCartButton = document.getElementById('add-to-cart-popup');
    addToCartButton.setAttribute("data-id", id);

    // Hiện popup
    document.getElementById('product-details').style.display = 'flex';
}

// Đóng popup chi tiết sản phẩm
function hideProductDetails() {
    document.getElementById('product-details').style.display = 'none';
}

document.getElementById("add-to-cart-popup").addEventListener("click", function () {
    let productId = this.getAttribute("data-id");

    fetch("add_to_cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "product_id=" + productId
    })
    .then(response => response.text())
    .then(data => {
        console.log("Server Response:", data);
        
        if (data.trim() === "success") {
            alert("Sách đã được thêm vào giỏ hàng!");
        } else {
            alert("Lỗi khi thêm vào giỏ hàng: " + data);
        }
    })
    .catch(error => console.error("Lỗi khi gửi request:", error));
});



// Xử lý slideshow
let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1; }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000); // Chuyển slide sau 3 giây
}

// Điều hướng thủ công bằng nút bấm
function plusSlides(n) {
    slideIndex += n;
    let slides = document.getElementsByClassName("slides");
    if (slideIndex > slides.length) { slideIndex = 1; }
    if (slideIndex < 1) { slideIndex = slides.length; }
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

// Chạy slideshow khi trang tải
document.addEventListener("DOMContentLoaded", showSlides);


// Lọc sách theo danh mục
function filterBooks(category, event) {
    let lists = document.querySelectorAll('.book-list');
    lists.forEach(list => {
        if (category === 'all' || list.getAttribute('data-category') === category) {
            list.classList.add('active');
        } else {
            list.classList.remove('active');
        }
    });

    document.querySelectorAll('.category-item').forEach(button => {
        button.classList.remove('active');
    });
    event.target.classList.add('active');
}
// Tìm kiếm sách
function searchBooks() {
    let keyword = document.getElementById("search-input").value.trim();
    let suggestionBox = document.getElementById("search-suggestions");

    if (keyword.length < 2) {
        suggestionBox.style.display = "none";
        return;
    }

    fetch("search_books.php?q=" + encodeURIComponent(keyword))
        .then(response => response.json())
        .then(data => {
            suggestionBox.innerHTML = "";
            if (data.length === 0) {
                suggestionBox.innerHTML = "<div>Không tìm thấy kết quả</div>";
            } else {
                data.forEach(book => {
                    let div = document.createElement("div");
                    div.classList.add("suggestion-item");
                    div.innerHTML = `
                        <img src="${book.Hinh}" alt="${book.TenSach}" class="suggestion-img">
                        <div>
                            <strong>${book.TenSach}</strong> - ${book.TacGia}<br>
                            <span class="price">${book.DonGia}đ</span>
                        </div>
                    `;
                    div.onclick = function () {
                        document.getElementById("search-input").value = book.TenSach;
                        suggestionBox.style.display = "none";
                    };
                    suggestionBox.appendChild(div);
                });
            }
            suggestionBox.style.display = "block";
        })
        .catch(error => console.error("Lỗi tìm kiếm:", error));
}

function removeFromCart(cartId) {
    if (!confirm("Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng không?")) return;

    fetch(`remove_from_cart.php?id=${cartId}`)
    .then(response => response.text())
    .then(data => {
        console.log("Server Response:", data); // Kiểm tra phản hồi từ server
        if (data.trim() === "success") {
            alert("Đã xóa thành công!");
            location.reload(); // Tải lại trang sau khi xóa
        } else {
            alert("Lỗi khi xóa: " + data);
        }
    })
    .catch(error => console.error("Lỗi kết nối server:", error));
}
