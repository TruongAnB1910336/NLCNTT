<?php 
include_once('connect.php');
session_start();
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
    <title>User</title>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header>
        <?php 
            $id_user=$_SESSION['id_user'];
            $sql_thongtin_user=mysqli_query($conn,"select * from user where id_user='$id_user' limit 1");
        ?>
        <img src="img/imgheader.png" id="imgheader">
        <form action="timkiem.php" method="POST">
        <div class="header1">
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
            <input type="text" class="search" name="value_search">
            <a href="timkiem.php"><button class="btn btn-secondary" name="search" style="width: 70px;height:30px;margin-top:23px;margin-left:-10px;padding-top:1px;">Search</button></a>
            <a href="#" class="text_icon"><i class="far fa-file-alt fa-lg"> <br><br>Thông tin hay</i></a>
            <?php 
                while($row_thongtin_user=mysqli_fetch_array($sql_thongtin_user)){
            ?>
            <a href="chitiet_user.php" class="text_icon"><i class="far fa-user-circle fa-lg"> <br><br><?php echo $row_thongtin_user['username']?></i></a>
            <?php } ?>
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
        <img src="img/img header.png" class="bgheader">
        
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                    <div class="col-6">
                        <img src="img/slide1.png" class="d-block sli">
                    </div>
                    <div class="col-6">
                        <img src="img/slide2.png" class="d-block sli">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="col-6">
                        <img src="img/slide3.png" class="d-block sli">
                    </div>
                    <div class="col-6">
                        <img src="img/slide4.png" class="d-block sli">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="col-6">
                        <img src="img/slide5.png" class="d-block sli">
                    </div>
                    <div class="col-6">
                        <img src="img/slide6.png" class="d-block sli">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="col-6">
                        <img src="img/slide7.png" class="d-block sli">
                    </div>
                    <div class="col-6">
                        <img src="img/slide8.png" class="d-block sli">
                    </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev-header" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next-header" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="row container row_header">
            <div class="col-3 col3_header" style="text-align: center;">
                <img src="img/header1.png">
                <h6 class="h6_header">Săn Sale Online</h4>
            </div>
            <div class="col-3 col3_header" style="text-align: center;">
                <img src="img/header2.png">
                <h6 class="h6_header">Laptop tựu trường</h6>
            </div>
            <div class="col-3 col3_header" style="text-align: center;">
                <img src="img/header3.png">
                <h6 class="h6_header">Ưu đãi ngập trời</h6>
            </div>
          </div>
          <div class="img_content_header">
            <img src="img/img_content_header.png" class="w-100">
          </div>
    </header>

    <main>
        <div class="deal_soc container">
            <i class="fas fa-exclamation fa-4x" style="color: yellow;"></i>
            <h5 class="h5_dealsoc">Giờ Vàng Deal Sốc</h5>
            <?php
                $sql_dealsoc=mysqli_query($conn,'select * from sanpham where loai="deal soc slide1"')
            ?>
             <h6 class="h6_time">Kết thúc trong:</h6>
            <h6 class="h6_time" id="hour"></h6>
            <h6 class="h6_time" id="minute"></h6>
            <h6 class="h6_time" id="second"></h6>
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="r" style="padding: 20px;">
                    <?php 
                        while($row_dealsoc=mysqli_fetch_array($sql_dealsoc)){
                    ?>
                        <div class="col-dealsoc">
                            <img src="<?php echo $row_dealsoc['imgsp'] ?>" class="img_dealsoc">
                            <div style="text-align: left;">
                                <h6><?php echo $row_dealsoc['tensp'] ?></h6>
                                <del><?php echo $row_dealsoc['giacu'] ?> <sup>d</sup></del>
                                <h6><?php echo $row_dealsoc['giamoi'] ?> <sup>d</sup></h6> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                  </div>
                  <?php 
                    $sql_dealsoc2=mysqli_query($conn,'select * from sanpham where loai="deal soc slide2"')
                  ?>
                  <div class="carousel-item">
                  <div class="r" style="padding: 20px;">
                    <?php 
                        while($row_dealsoc2=mysqli_fetch_array($sql_dealsoc2)){
                    ?>
                        <div class="col-dealsoc">
                            <img src="<?php echo $row_dealsoc2['imgsp'] ?>" class="img_dealsoc">
                            <div style="text-align: left;">
                                <h6><?php echo $row_dealsoc2['tensp'] ?></h6>
                                <del><?php echo $row_dealsoc2['giacu'] ?> <sup>d</sup></del>
                                <h6><?php echo $row_dealsoc2['giamoi'] ?> <sup>d</sup></h6> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev-dealsoc" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next-dealsoc" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <img src="img/img_content_main_1.png" class="w-100" style="margin-top: 10px;">

        <!-- Điện thoại nổi bật -->
        <div class="div_dt_noibat container">
            <div class="r">
                <h4>Điện Thoại Nổi Bật</h4>
                <?php 
                    $sql_dienthoai=mysqli_query($conn,'select * from sanpham where loai="dienthoai"')
                ?>
                <?php 
                    while($row_dienthoai=mysqli_fetch_array($sql_dienthoai)){
                ?>
            <div class="col3 col-dt-noibat">
                <a href="chitietsp.php?id=<?php echo $row_dienthoai['id'] ?>" style="text-decoration: none;color:black;">
                <img src="<?php echo $row_dienthoai['imgsp'] ?>" class="img_dt_noibac">
                <div style="text-align: left;">
                    <h6><?php echo $row_dienthoai['tensp'] ?></h6>
                    <h6 style="display: inline;border-radius: 10px;background-color: rgba(255, 0, 0, 0.664);padding: 5px;"><?php echo $row_dienthoai['giamoi'] ?><sup>d</sup></h6>  
                    <del style="display: inline;"><?php echo $row_dienthoai['giacu'] ?> <sup>d</sup></del>
                    <i class="fas fa-hdd"><h6 style="display: inline;"><?php echo $row_dienthoai['mota1'] ?></h6> </i> &nbsp;
                    <i class="fas fa-mobile"><h6 style="display: inline;"><?php echo $row_dienthoai['mota2'] ?></h6></i> <br>
                    <i class="fas fa-memory"><h6 style="display: inline;"><?php echo $row_dienthoai['mota3'] ?></h6> </i> &nbsp;
                    <i class="fas fa-database"><h6 style="display: inline;"><?php echo $row_dienthoai['mota4'] ?></h6></i>
                </div>
                </a>
            </div>
            <?php } ?>
            </div>
        </div>

        <!-- gợi ý hôm nay -->
        <div class="div_goiyhomnay container">
            <div class="r">
                <h4>Gợi ý hôm nay</h4>
                <?php 
                    $sql_goiy=mysqli_query($conn,'select * from sanpham where loai="goiy"')
                ?>
                <?php 
                    while($row_goiy=mysqli_fetch_array($sql_goiy)){
                ?>
            <div class="col3 col-dt-noibat">
            <a href="chitietsp.php?id=<?php echo $row_goiy['id'] ?>" style="text-decoration: none;color:black;">
                <img src="<?php echo $row_goiy['imgsp'] ?>" class="img_dt_noibac">
                <div style="text-align: left;">
                    <h6><?php echo $row_goiy['tensp'] ?></h6>
                    <h6 style="display: inline;border-radius: 10px;background-color: rgba(255, 0, 0, 0.664);padding: 5px;"><?php echo $row_goiy['giamoi'] ?><sup>d</sup></h6>  
                    <del style="display: inline;"><?php echo $row_goiy['giacu'] ?><sup>d</sup> </del>
                    <i class="fas fa-hdd"><h6 style="display: inline;"><?php echo $row_goiy['mota1'] ?></h6> </i> &nbsp;
                    <i class="fas fa-mobile"><h6 style="display: inline;"><?php echo $row_goiy['mota2'] ?></h6></i> <br>
                    <i class="fas fa-memory"><h6 style="display: inline;"><?php echo $row_goiy['mota3'] ?></h6> </i> &nbsp;
                    <i class="fas fa-database"><h6 style="display: inline;"><?php echo $row_goiy['mota4'] ?></h6></i>
                </div>
            </a>
            </div>
            <?php } ?>
            </div>
        </div>

        <!-- laptop nổi bật -->
        <img src="img/content_laptop.webp" class="w-100">
        <div class="div_goiyhomnay container">
            <div class="r">
                <h4>Laptop Bán Chạy</h4>
                <?php 
                    $sql_laptop=mysqli_query($conn,'select * from sanpham where loai="laptop"')
                ?>
                <?php 
                    while($row_laptop=mysqli_fetch_array($sql_laptop)){
                ?>
            <div class="col3 col-dt-noibat">
            <a href="chitietsp.php?id=<?php echo $row_laptop['id'] ?>" style="text-decoration: none;color:black;">
                <img src="<?php echo $row_laptop['imgsp'] ?>" class="img_dt_noibac">
                <div style="text-align: left;">
                    <h6><?php echo $row_laptop['tensp'] ?></h6>
                    <h6 style="display: inline;border-radius: 10px;background-color: rgba(255, 0, 0, 0.664);padding: 5px;"><?php echo $row_laptop['giamoi'] ?><sup>d</sup></h6>  
                    <del style="display: inline;"><?php echo $row_laptop['giacu'] ?><sup>d</sup></del>
                    <i class="fas fa-hdd"><h6 style="display: inline;"><?php echo $row_laptop['mota1'] ?></h6></i> &nbsp;
                    <i class="fas fa-mobile"><h6 style="display: inline;"><?php echo $row_laptop['mota2'] ?></h6></i> <br>
                    <i class="fas fa-memory"><h6 style="display: inline;"><?php echo $row_laptop['mota3'] ?></h6> </i> &nbsp;
                    <i class="fas fa-database"><h6 style="display: inline;"><?php echo $row_laptop['mota4'] ?></h6></i>
                </div>
            </a>
            </div>
            <?php } ?>
            </div>
        </div>
        <!-- chuyen gia thoung hieu -->
        <div>
            <h4>Chuyên Gia Thương Hiệu</h4>
            <div class="row w-100">
                <div class="col-3 thuonghieu">
                    <img src="img/chuyengiathuonghieu.png" class="w-100" style="border-radius: 10px;">
                </div>
                <div class="col-3 thuonghieu">
                    <img src="img/chuyengiathuonghieu1.png" class="w-100" style="border-radius: 10px;">
                </div>
                <div class="col-3 thuonghieu">
                    <img src="img/chuyengiathuonghieu2.png" class="w-100" style="border-radius: 10px;">
                </div>
            </div>
        </div>
        <!-- thanhtoanonline -->
        <h4>Thanh Toán Online</h4>
        <div class="div_tt container">
        <div id="carouselExampleControls" class="carousel slide div_tt1" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                    <div class="col-3 coltt">
                        <img src="img/thanhtoanonline1.webp" class="thanhtoanonline">
                    </div>
                    <div class="col-3 coltt">
                        <img src="img/thanhtoanonline2.webp" class="thanhtoanonline">
                    </div>
                    <div class="col-3 coltt">
                        <img src="img/thanhtoanonline3.webp" class="thanhtoanonline">
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="col-3 coltt">
                        <img src="img/thanhtoanonline4.webp" class="thanhtoanonline">
                    </div>
                    <div class="col-3 coltt">
                        <img src="img/thanhtoanonline5.webp" class="thanhtoanonline">
                    </div>
                    <div class="col-3 coltt">
                        <img src="img/thanhtoanonline6.webp" class="thanhtoanonline">
                    </div>
                </div>
            </div>
          </div>
        </div>
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