// Lấy phần tử icon và input
const searchIcon = document.getElementById('search-icon');
const searchInput = document.getElementById('search-input');

// Thêm sự kiện click vào search icon
searchIcon.addEventListener('click', () => {
    // Kiểm tra nếu input đang ẩn thì hiển thị, ngược lại thì ẩn
    if (searchInput.style.display === 'none' || searchInput.style.display === '') {
        searchInput.style.display = 'block';
        searchInput.focus(); // Đặt focus vào input
    } else {
        searchInput.style.display = 'none';
    }
});

// Giả lập trạng thái đăng nhập (true: đã đăng nhập, false: chưa đăng nhập)
const isLoggedIn = true; // Thay đổi thành `true` nếu người dùng đã đăng nhập

// Lấy phần tử menu
const profileMenu = document.getElementById('profile-menu');

// Cập nhật nội dung menu dựa trên trạng thái đăng nhập
// if (isLoggedIn) {
//     profileMenu.innerHTML = `
//         <a href="#">Account Info</a><br>
//         <a href="#">My Orders</a><br>
//         <a href="#">Logout</a>
//     `;
// } else {
//     profileMenu.innerHTML = `
//         <a href="#">Login</a>
//     `;
// }


// document.addEventListener('click', function (event) {
//     const profileContainer = document.querySelector('.profile-container');
//     const profileMenu = document.querySelector('.profile-menu');

//     if (!profileContainer.contains(event.target)) {
//         profileMenu.style.display = 'none'; // Ẩn menu khi nhấp ra ngoài
//     }
// });

// const profileContainer = document.querySelector('.profile-container');
// profileContainer.addEventListener('mouseenter', () => {
//     document.querySelector('.profile-menu').style.display = 'block';
// });

// profileContainer.addEventListener('mouseleave', () => {
//     document.querySelector('.profile-menu').style.display = 'none';
// });
