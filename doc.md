### Cấu trúc thư mục

1. commons // File dùng chung cả dự án
2. uploads // Folder lưu trữ file upload

3. controllers // Xử lý logic
4. models // Thao tác cơ sở dữ liệu
5. views // Hiển thị
6. index.php // Điều hướng


- Cấu hình DB trong file commons/env.php
	- tạo db đầu tiên: đúng tên bảng, tên trường dữ liệu 
	- kết nối với db 
	- sửa BASE_URL trước ở nhà: copy path của index
	- tạo ctrler: tạo hết các phương thức: SVmodel, __construct, listSV, formAdd, postAdd, formUpdate, update, delete
	- require, chỉnh rout ở file index