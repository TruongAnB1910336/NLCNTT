<?php 
include_once('../connect.php');
session_start();
?>
<?php 
    if(!isset($_SESSION['id_admin'])){
        header('location: ../dangnhap.php');
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
    <title>Hàng Đã Giao</title>
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
        <h2 style="text-align: center;">Admin Xác Nhận Đơn Hàng Đã Giao</h2><br>
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

        <hr>
        <h2 style="text-align: center;">Thông Tin Đơn Hàng</h2><br>
        <?php 
            $sql_donhang=mysqli_query($conn,"select dh.trangthai as trangthai,dh.id_donhang as id_donhang,dh.madh as madh,sp.imgsp as imgsp,sp.tensp as tensp,dh.soluong as soluong,sp.giamoi as gia,u.username as username,u.diachi as diachi,u.sdt as sdt from donhang dh,sanpham sp,user u where dh.trangthai='3' and dh.id_sanpham=sp.id and dh.id_user=u.id_user");
        ?>
        <form action="admin_layhang.php" method="POST">
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                <th scope="col">Mã Đơn Hàng</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Thành Tiền</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Địa Chỉ</th>
                <!-- <th scope="col">Xác Nhận</th> -->
                </tr>
                <tr>

                </tr>
            </thead>
            <tbody>
            <?php 
                while($row_donhang=mysqli_fetch_array($sql_donhang)){
                $thanhtien=((float)$row_donhang['gia'] *1000000)*(int)$row_donhang['soluong'];
            ?>
                <tr style="text-align: center;">
                <th scope="row"><?php echo $row_donhang['madh'] ?></th>
                <td><img src="../<?php echo $row_donhang['imgsp'] ?>" style="width: 150px;height:150px"></td>
                <td><?php echo $row_donhang['tensp'] ?></td>
                <td><?php echo $row_donhang['soluong'] ?></td>
                <td><?php echo number_format((float)$row_donhang['gia']*1000000) ?> <sup>vnđ</sup> </td>
                <td><?php echo number_format($thanhtien) ?> <sup>vnđ</sup> </td>
                <td><?php echo $row_donhang['username'] ?></td>
                <td><?php echo $row_donhang['sdt'] ?></td>
                <td><?php echo $row_donhang['diachi'] ?></td>
                <!-- <td><input type="checkbox" name="check[]" value="true"></td> -->
                <input type="hidden" name="tensp" value="<?php echo $row_donhang['tensp'] ?>">
                <input type="hidden" name="id_donhang[]" value="<?php echo $row_donhang['id_donhang'] ?>">
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <!-- <button class="btn btn-primary" style="margin-left: 40%;width:200px" name="xacnhan">Xác Nhận</button> -->
        </form>
    </main>
    <footer>
        <div class="row w-100">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <ul class="ul_footer">
                            <li>
                                <a href="#" class="a_footer">Giới thiệu về công ty</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Câu hỏi thường gặp mua hàng</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Chính sách bảo mật</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Quy chế hoạt động</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Kiểm tra hóa đơn điện tử</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Hệ thống cửa hàng</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Hệ thống bảo hành</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="ul_footer">
                            <li>
                                <a href="#" class="a_footer">Tin tuyển dụng</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Tin khuyến mãi</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Hướng dẩn mua online</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Hướng dẩn mua trả gớp</a>
                            </li>
                            <li>
                                <a href="#" class="a_footer">Chính sách trả gớp</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>
                                <b>Tư vấn mua hàng(Miễn phí)</b>
                            </li>
                            <li>
                                <h5 style="display: inline; color: red;">
                                    1800 6601
                                </h5>
                                <p style="display: inline;">(Nhánh 1)</p>
                            </li>
                            <li>
                                <b>Hổ trợ kỹ thuật</b>
                            </li>
                            <li>
                                <h5 style="display: inline; color: red;">
                                    1800 6601
                                </h5>
                                <p style="display: inline;">(Nhánh 2)</p>
                            </li>
                            <li>
                                <b>Hổ trợ thanh toán:</b><br>
                                <img src="../img/imgfooter.jpg" style="width:200px;height:100px;">
                            </li>
                            <li>
                                <img src="../img/bocongthuong.png" style="width:200px;height:70px;">
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <b>Gớp ý,khiếu nại dịch vụ (8h00-22h00)</b>
                        <h5 style="color: red;">
                            1800 6616
                        </h5>
                        <br><br>
                        <b style="display: block;">Chứng nhận:</b>
                        <img src="../img/chungnhan.png" style="width:70px;height:50px;">
                        <img src="../img/chungnhan1.jpg" style="width:70px;height:50px;">
                        <img src="../img/chungnhan2.png" style="width:70px;height:50px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="content_footer">
           &copy;2007 - 2022 Công Ty Cổ Phần Bán Lẻ Kỹ Thuật Số FPT / Địa chỉ: 261 - 263 Khánh Hội, P2, Q4, TP. Hồ Chí Minh / GPĐKKD số 0311609355 do Sở KHĐT TP.HCM cấp ngày 08/03/2012. GP số 47/GP-TTĐT do sở TTTT TP HCM cấp ngày 02/07/2018. Điện thoại: (028)73023456. Email: fptshop@fpt.com.vn. Chịu trách nhiệm nội dung: Nguyễn Trịnh Nhật Linh.
        </div>
    </footer>
</body>
</html>