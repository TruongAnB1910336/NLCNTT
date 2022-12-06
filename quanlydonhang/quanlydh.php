<?php 
include_once('../connect.php');
session_start();
?>
<?php 
    if(!isset($_SESSION['id_admin'])){
        header('location: ../dangnhap.php');
    }
    if(isset($_POST['xem'])) {
        $trangthaidh=$_POST['trangthai'];
        if($trangthaidh == 0){
            header('location: admin_xacnhan.php');
        }
        elseif($trangthaidh == 1){
            header('location: admin_layhang.php');
        }
        elseif($trangthaidh == 2){
            header('location: admin_giaohang.php');
        }
        elseif($trangthaidh == 3){
            header('location: admin_hoanthanh.php');
        }
    }
    if(isset($_GET['logout']) == 'dangxuat') {
        unset($_SESSION['id_admin']);
        unset($_SESSION['ten_admin']);
        header('location: dangnhap.php');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="../img/logo_favoicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Quản Lý Đơn Hàng</title>
</head>
<body>
<header>
        <img src="../img/imgheader.png" id="imgheader">
        <form action="../timkiem.php" method="POST">
        <div class="header1">
            <a href="../index.php"><img src="../img/logo.png" class="logo"></a>
            <input type="text" class="search" name="value_search">
            <a href="../timkiem.php"><button class="btn btn-secondary" name="search" style="width: 70px;height:30px;margin-top:23px;margin-left:-10px;padding-top:1px;">Search</button></a>
            <a href="#" class="text_icon"><i class="far fa-file-alt fa-lg"> <br><br>Thông tin hay</i></a>
            <a href="../chitiet_user.php" class="text_icon"><i class="far fa-user-circle fa-lg"> <br><br>Tài khoản</i></a>
            <a href="../giohang.php" class="text_icon"><i class="fas fa-shopping-cart"><br><br>Giỏ hàng</i></a>
        </div>
        </form>
        <nav class="nav_bar">
            <ul>
                <li class="li_nav"><a href="#"><i class="fas fa-mobile-alt i_li"> Điện thoại</i></a></li>
                <li class="li_nav"><a href="laptop.html"><i class="fas fa-laptop i_li"> Laptop</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-tablet i_li"> Máy tính bảng</i></a></li>
                <li class="li_nav"><a href="#"><i class="fab fa-apple i_li"> Apple</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-desktop i_li"> PC-Linh kiện</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-headphones i_li"> Phụ kiện</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-undo i_li"> Máy củ giá rẻ</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-laptop-house i_li"> Hàng gia dụng</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-sim-card i_li"> Sim và thẻ</i></a></li>
                <li class="li_nav"><a href="#"><i class="fas fa-percent i_li"> Khuyến mãi</i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2 style="text-align: center;">Quản Lý Đơn Hàng</h2> <br>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../quanlysp.php">Hiệu Chỉnh Sản Phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../themsp.php">Thêm Sản Phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="quanlydh.php">Quản Lý Đơn Hàng</a>
            </li>
            <li class="nav-item">
            <a href="?logout=dangxuat" class="nav-link">Đăng Xuất</a>
            </li>
        </ul>
        <br>
        <form action="quanlydh.php" method="POST">
            <select name="trangthai" class="form-control" style="width:50%;margin-left:30%;">
                <option value="0">Đơn Hàng Chờ Xác Nhận</option>
                <option value="1">Đơn Hàng Đã Được Shop Chuẩn Bị</option>
                <option value="2">Đơn Hàng Đang Giao</option>
                <option value="3">Đơn Hàng Đã Giao</option>
            </select>
            <button class="btn btn-primary" name="xem" style="margin-left: 30%;width:50%;">Xem Chi Tiết Đơn Hàng</button>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>