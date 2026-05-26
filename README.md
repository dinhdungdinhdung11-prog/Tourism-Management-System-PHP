# Tourism Management System (PHP & MySQL)

Dự án **Hệ thống Quản lý Du lịch (Tourism Management System)** là một ứng dụng nền web giúp quản lý các tour du lịch, đặt chỗ và thông tin khách hàng. 

## 1. Công nghệ sử dụng (Tech Stack)
* **Backend:** PHP (thuần)
* **Cơ sở dữ liệu (Database):** MySQL
* **Frontend:** HTML5, CSS3, JavaScript
* **Thư viện/Framework Frontend:** Bootstrap (cho giao diện responsive), jQuery, FontAwesome (cho icon)
* **Môi trường chạy máy chủ cục bộ (Local Server):** XAMPP, WAMP, hoặc MAMP

## 2. Cách thức hoạt động (Features)
Hệ thống được chia thành 2 phân hệ chính:
* **Phân hệ Người dùng (User/Khách hàng):** 
  * Đăng ký/Đăng nhập tài khoản.
  * Xem danh sách các gói tour du lịch (Tour Packages) và chi tiết từng tour.
  * Đặt tour (Booking) và xem lại lịch sử đặt tour.
  * Gửi yêu cầu hỗ trợ hoặc thắc mắc (Enquiry).
* **Phân hệ Quản trị viên (Admin):** 
  * Quản lý các gói tour (Thêm, sửa, xóa các tour du lịch).
  * Quản lý người dùng đã đăng ký.
  * Quản lý và xử lý các đơn đặt tour (Booking).
  * Xem và phản hồi các thắc mắc (Enquiry) / Vấn đề (Issues) từ khách hàng.

## 3. Hướng dẫn cài đặt và chạy dự án (How to run)

**Bước 1: Cài đặt môi trường**
* Tải và cài đặt phần mềm **XAMPP** (hoặc WAMP/MAMP).
* Khởi động 2 module **Apache** và **MySQL** trên bảng điều khiển XAMPP (XAMPP Control Panel).

**Bước 2: Triển khai mã nguồn**
* Tải (hoặc clone) toàn bộ mã nguồn này về máy.
* Copy thư mục `tms` và dán vào thư mục root của web server:
  * Đối với **XAMPP**: dán vào thư mục `C:\xampp\htdocs\`
  * Đối với **WAMP**: dán vào thư mục `C:\wamp\www\`

**Bước 3: Thiết lập Cơ sở dữ liệu (Database)**
* Mở trình duyệt web, truy cập vào phpMyAdmin qua đường dẫn: `http://localhost/phpmyadmin`
* Tạo một cơ sở dữ liệu mới với tên là: `tms`
* Chọn cơ sở dữ liệu `tms` vừa tạo, chuyển sang tab **Import (Nhập)**.
* Tải lên tệp tin `tms.sql` (nằm trong thư mục `tms` hoặc `SQl FIle`) để khởi tạo các bảng và dữ liệu mẫu.

**Bước 4: Chạy ứng dụng**
* **Trang Người dùng (User):** Truy cập `http://localhost/tms`
  * *Tài khoản test:* `test@gmail.com`
  * *Mật khẩu:* `Test@123`
* **Trang Quản trị (Admin):** Truy cập `http://localhost/tms/admin`
  * *Tài khoản admin:* `admin`
  * *Mật khẩu:* `Test@123`