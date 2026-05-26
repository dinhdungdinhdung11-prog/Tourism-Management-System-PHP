<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit1']))
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];	
    $mobile=$_POST['mobileno'];
    $subject=$_POST['subject'];	
    $description=$_POST['description'];
    $sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
    $query->bindParam(':subject',$subject,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId){
        $msg="Enquiry Successfully submitted";
    } else {
        $error="Something went wrong. Please try again";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>DTU IS THE BEST</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script> new WOW().init(); </script>

<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
/* === PHẦN GALLERY === */
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
    margin: 30px 0;
}
.gallery-item {
    text-align: center;
    background: #fafafa;
    padding: 10px;
    border-radius: 10px;
    transition: transform 0.2s ease;
}
.gallery-item:hover { transform: scale(1.03); }
.gallery-item img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
}
.gallery-item p {
    margin-top: 8px;
    color: #333;
    font-size: 14px;
}
/* === PHẦN BÌNH LUẬN === */
.comment-box {
    margin-top: 40px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}
.comment-box h4 { margin-bottom: 10px; }
.comment-box textarea {
    width: 100%;
    height: 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: none;
    padding: 8px;
}
.comment-box button { margin-top: 10px; }
.comment { padding: 6px 0; border-bottom: 1px solid #eee; }
.comment strong { color: #2a7ae2; }

/* === PHẦN CHÍNH SÁCH BẢO MẬT === */
.privacy-section {
    background: #f9fafc;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    line-height: 1.7;
    color: #333;
}
.privacy-section h4 {
    color: #0066cc;
    margin-top: 20px;
}
.privacy-section ul {
    margin-left: 20px;
}
</style>
</head>
<body>

<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1">
    <div class="container">
        <h1 class="wow zoomIn animated" data-wow-delay=".5s"></h1>
    </div>
</div>

<!--- privacy ---->
<div class="privacy">
    <div class="container">
        <?php 
        $pagetype=$_GET['type'];
        $sql = "SELECT type,detail from tblpages where type=:pagetype";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0){
            foreach($results as $result){
        ?>
        <h3 class="wow fadeInDown animated" data-wow-delay=".5s"><?php echo $_GET['type']; ?></h3>
        <p><?php echo $result->detail; ?></p>

        <!-- === PHẦN GIỚI THIỆU === -->
        <?php if(strtolower($pagetype)=='giới thiệu' || strtolower($pagetype)=='aboutus'){ ?>
        <div class="gallery">
            <!-- Hình ảnh tour -->
            <div class="gallery-item"><img src="https://www.trangantravel.com.vn/wp-content/uploads/2023/07/Tour-du-lich-tet-2024-8.png"><p>Bagan, Myanmar</p></div>
            <div class="gallery-item"><img src="https://image.viettimes.vn/w820/Uploaded/2025/aohuooh/2018_09_06/2_kzok.jpg"><p>Trương Gia Giới, Trung Quốc</p></div>
            <div class="gallery-item"><img src="https://image.viettimes.vn/w820/Uploaded/2025/aohuooh/2018_09_06/3_jzjk.jpg"><p>Beachy Head, Anh</p></div>
            <div class="gallery-item"><img src="https://image.viettimes.vn/w820/Uploaded/2025/aohuooh/2018_09_06/4_cwjr.jpg"><p>Hamilton Pool, Mỹ</p></div>
            <div class="gallery-item"><img src="https://image.viettimes.vn/w820/Uploaded/2025/aohuooh/2018_09_06/5_ihzr.jpg"><p>Hinatuan Enchanted, Philippines</p></div>
            <div class="gallery-item"><img src="https://image.viettimes.vn/w820/Uploaded/2025/aohuooh/2018_09_06/6_kolh.jpg"><p>Hồ Baikal, Nga</p></div>
        </div>

        <!-- Bình luận -->
        <div class="comment-box">
            <h4>Bình luận</h4>
            <form method="post" action="">
                <textarea name="comment" placeholder="Nhập bình luận của bạn..."></textarea><br>
                <button type="submit" name="postComment" class="btn btn-primary">Gửi bình luận</button>
            </form>
            <hr>
            <div class="comments-list">
                <?php
                $comments = [
                    ["name" => "Đức Tuấn", "text" => "Chị nhân viên xinh xỉu!"],
                    ["name" => "Nguyễn Việt", "text" => "Giá tour rất tốt!"],
                    ["name" => "Thành Luân", "text" => "Tư vấn nhiệt tình."]
                ];
                foreach($comments as $c){
                    echo '<div class="comment"><strong>'.$c["name"].':</strong> '.$c["text"].'</div>';
                }
                ?>
            </div>
        </div>

        <!-- === PHẦN CHÍNH SÁCH BẢO MẬT === -->
        <?php } elseif(strtolower($pagetype)=='chính sách bảo mật' || strtolower($pagetype)=='privacy policy'){ ?>
        <div class="privacy-section wow fadeInUp" data-wow-delay=".3s">
            <h3>Chính Sách Bảo Mật</h3>
            <p>Chúng tôi cam kết bảo vệ thông tin cá nhân của khách hàng khi sử dụng dịch vụ đặt tour du lịch xuyên quốc gia. Chính sách này mô tả cách chúng tôi thu thập, sử dụng và bảo vệ dữ liệu của bạn.</p>

            <h4>1. Thông tin chúng tôi thu thập</h4>
            <ul>
                <li>Họ tên, email, số điện thoại, địa chỉ của khách hàng.</li>
                <li>Thông tin thanh toán và lịch sử đặt tour.</li>
                <li>Dữ liệu trình duyệt và cookie để cải thiện trải nghiệm người dùng.</li>
            </ul>

            <h4>2. Mục đích sử dụng thông tin</h4>
            <ul>
                <li>Xác nhận và quản lý đơn đặt tour.</li>
                <li>Liên hệ hỗ trợ, gửi ưu đãi và thông báo quan trọng.</li>
                <li>Cải thiện chất lượng dịch vụ và trải nghiệm người dùng.</li>
            </ul>

            <h4>3. Bảo mật dữ liệu</h4>
            <p>Tất cả dữ liệu cá nhân được lưu trữ trong hệ thống bảo mật cao, tuân thủ tiêu chuẩn SSL 256-bit và các quy định quốc tế về bảo vệ dữ liệu (GDPR).</p>

            <h4>4. Quyền của khách hàng</h4>
            <p>Bạn có quyền truy cập, chỉnh sửa hoặc yêu cầu xóa thông tin cá nhân bất kỳ lúc nào bằng cách liên hệ với bộ phận chăm sóc khách hàng của chúng tôi.</p>

            <h4>5. Thông tin liên hệ</h4>
            <p>Nếu có thắc mắc về chính sách bảo mật, vui lòng liên hệ qua email: <strong>support@dtu-travel.com</strong>.</p>
        </div>
        <?php } } } ?>
    </div>
</div>

<!--- footer ---->
<?php include('includes/footer.php');?>
<?php include('includes/signup.php');?>			
<?php include('includes/signin.php');?>			
<?php include('includes/write-us.php');?>
</body>
</html>
