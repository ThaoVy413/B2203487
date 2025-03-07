// Lấy các phần tử trong HTML
const menuToggle = document.getElementById("menu-toggle");
const sidebar = document.querySelector(".sidebar");
const mainContent = document.querySelector(".main-content");

// Thêm sự kiện click vào nút menu-toggle
menuToggle.addEventListener("click", function() {
    sidebar.classList.toggle("collapsed");  // Thêm hoặc xóa class "collapsed"
    mainContent.classList.toggle("expanded");  // Thêm hoặc xóa class "expanded" để thay đổi margin
});
