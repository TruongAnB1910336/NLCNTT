<?php 
include_once('connect.php');
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
    <title>Chi Tiết Sản Phẩm</title>
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
          
          
    </header>
    <hr>
    <main>
        <?php 
            $sql_chitietsp=mysqli_query($conn,'select * from sanpham where id='.$_GET['id'])
        ?>
        <?php 
            while($row_chitietsp=mysqli_fetch_array($sql_chitietsp)){
        ?>
    <h2>Review <?php echo $row_chitietsp['tensp'] ?></h2>
    <div class="row w-100">
        <div class="col-6">
            <div style="margin-left: 100px;">
            <img src="<?php echo $row_chitietsp['imgsp'] ?>" style="width:400px;height:400px;">
            </div>
            <h3 style="text-align: center;">Thông số kỹ thuật</h3>
            <div style="margin-left: 150px;">
            <table class="table table-striped">
                <tr>
                    <td>
                        Chip
                    </td>
                    <td>
                    <i class="fas fa-hdd" style="text-align: left;"> &nbsp;<h6 style="display: inline;"><?php echo $row_chitietsp['mota1'] ?></h6> </i>
                    </td>
                </tr>
                <tr>
                    <td>
                        Màn hình
                    </td>
                    <td>
                    <i class="fas fa-mobile"> &nbsp;<h6 style="display: inline;"><?php echo $row_chitietsp['mota2'] ?></h6></i>  <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ram
                    </td>
                    <td>
                    <i class="fas fa-memory"> &nbsp;<h6 style="display: inline;"><?php echo $row_chitietsp['mota3'] ?></h6> </i> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Bộ nhớ
                    </td>
                    <td>
                    <i class="fas fa-database"> &nbsp;<h6 style="display: inline;"><?php echo $row_chitietsp['mota4'] ?></h6></i>
                    </td>
                </tr>
            </table>
            </div>
        </div>
        <div class="col-5">
            <h3>Giới thiệu</h3>
            <div style="background-color: grey;padding:5px;">
                <h4 style="display: inline;color:red;"><?php echo $row_chitietsp['giamoi'] ?><sup>đ</sup></h4> 
                <del><?php echo $row_chitietsp['giacu'] ?></del><sup>đ</sup>
            </div>
            <p><?php echo $row_chitietsp['gioithieu'] ?></p>
            <form action="giohang.php" method="POST">
            Số Lượng: <input type="number" max="100" min="0" name="soluong"> <br> <br>
            <input type="hidden" name="id_sp" value="<?php echo $row_chitietsp['id'] ?>">
            <button class="btn btn-primary" name="addcart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>
    <?php } ?>
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