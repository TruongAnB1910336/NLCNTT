<?php 
include_once('connect.php');
?>
<?php 
    if(isset($_POST['dangky']) && ($_POST['dangky'])) {
        $username=$_POST['hoten'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $mk=$_POST['mk'];
        $diachi=$_POST['diachi'];
        $sql_kt=mysqli_query($conn,"select * from user where email_user='$email' and mk_user='$mk' limit 1");
        $count=mysqli_num_rows($sql_kt);
        if($count>0){
            echo '<script>alert("Tài khoản đã tồn tại!")</script>';
        }
        else{
            $sql_dk=mysqli_query($conn,"insert into user(username,email_user,mk_user,sdt,diachi) values('$username','$email','$mk','$sdt','$diachi')");
        }
       
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/logo_favoicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <title>Đăng Ký</title>
</head>
<body>
<header>
        <img src="img/imgheader.png" id="imgheader">
        <form action="timkiem.php" method="POST">
        <div class="header1">
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
            <input type="text" class="search" name="value_search">
            <a href="timkiem.php"><button class="btn btn-secondary" name="search" style="width: 70px;height:30px;margin-top:23px;margin-left:-10px;padding-top:1px;">Search</button></a>
            <a href="#" class="text_icon"><i class="far fa-file-alt fa-lg"> <br><br>Thông tin hay</i></a>
            <a href="chitiet_user.php" class="text_icon"><i class="far fa-user-circle fa-lg"> <br><br>Tài khoản</i></a>
            <a href="giohang.php" class="text_icon"><i class="fas fa-shopping-cart"><br><br>Giỏ hàng</i></a>
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
        <h2 style="text-align: center;">Đăng Ký</h2>
    <form action="dangky.php" method="POST">
    <div class="form-dangky">      
    <div class="form-dangky-chil">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card" style="background-color: #0099FF;">

                        <div class="card-body">
                                <table class="form-group row tablee">
                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label" for="hoten"><b>Họ tên</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ tên">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label"  for="sdt"><b>Số Điện Thoại</b></label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Số Điện Thoại">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label"  for="email"><b>Email</b></label>
                                        </td>
                                        <td>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label"  for="ngaysinh"><b>Ngày sinh</b></label>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="ngaysinh" id="ngaysinh">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label"  for="diachi"><b>Địa chỉ</b></label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label"  for="mk"><b>Mật khẩu</b></label>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control" name="mk" id="mk" placeholder="Mật khẩu">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="col-sm-6 col-form-label"  for="nlmk"><b>Nhập lại mật khẩu</b></label>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control" name="nlmk" id="nlmk" placeholder="Nhập lại mật khẩu">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button onclick="return hamdk()" type="submit" name="dangky" class="btn btn-success mt-1"><b>Đăng ký</b></button>
                                            <button type="reset" class="btn btn-success mt-1"><b>Hủy</b></button>
                                        </td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>
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
                                <img src="img/imgfooter.jpg" style="width:200px;height:100px;">
                            </li>
                            <li>
                                <img src="img/bocongthuong.png" style="width:200px;height:70px;">
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
                        <img src="img/chungnhan.png" style="width:70px;height:50px;">
                        <img src="img/chungnhan1.jpg" style="width:70px;height:50px;">
                        <img src="img/chungnhan2.png" style="width:70px;height:50px;">
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