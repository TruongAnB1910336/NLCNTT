<?php 
include_once('connect.php');
session_start();
?>
<?php 
    if(isset($_POST['addcart'])) {
        $id_sp=$_POST['id_sp'];
        $soluong=$_POST['soluong'];
        $sql_kt=mysqli_query($conn,"select * from giohang where id_giohang='$id_sp'");
        $num_kt=mysqli_num_rows($sql_kt);
        if($num_kt > 0) {
            $row_kt=mysqli_fetch_array($sql_kt);
            $soluong=$soluong + $row_kt['soluong'];
            $sql_cart=mysqli_query($conn,"update giohang set soluong='$soluong' where id_giohang='$id_sp'");
        }
        else {
            $sql_cart=mysqli_query($conn,"insert into giohang(id_giohang,soluong) values('$id_sp','$soluong')");
        }
    }
    elseif(isset($_GET['del'])) {
        $del_id=$_GET['del'];
        $sql_del=mysqli_query($conn,"delete from giohang where id_giohang='$del_id'");
    }
    if(isset($_POST['dathang'])) {
        if(isset($_SESSION['id_user'])) {
            $id_user=$_SESSION['id_user'];
            $madh=rand(0,99999);
            $sql_count_sp=mysqli_query($conn,"select count(id_giohang) as slsp from giohang");
            $row_count_sp=mysqli_fetch_array($sql_count_sp);
            for($i=0;$i<$row_count_sp['slsp'];$i++){
              $id_sp=$_POST['id_cart'][$i];
              $soluong=$_POST['sl'][$i];
              $sql_donhang=mysqli_query($conn,"insert into donhang(id_donhang,madh,id_sanpham,soluong,id_user) values('','$madh','$id_sp','$soluong','$id_user')");
              $sql_del_cart=mysqli_query($conn,"delete from giohang where id_giohang='$id_sp'");
            }
        }
        else{
            echo '<script>
            alert("Bạn cần đăng nhập trước khi đặt hàng!");
            window.location.href="dangnhap.php";
            </script>';
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
    <title>Giỏ Hàng</title>
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
        <h2 style="text-align: center;">Chi tiết Giỏ Hàng</h2>
        <?php 
            $sql_showcart=mysqli_query($conn,"select sp.id as id,sp.imgsp as imgsp,sp.tensp as tensp,sp.giamoi as giamoi,gh.soluong as soluong,gh.id_giohang as id_giohang from giohang gh,sanpham sp where gh.id_giohang=sp.id")
        ?>
        <table class="table table-bordered" style="margin-left:60px;width:90%;">
            <thead style="text-align: center;">
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </thead>
            <tbody style="text-align: center;">
            <?php 
                $tongtien=0;
                while($row_showcart=mysqli_fetch_array($sql_showcart)) {
                    $thanhtien=((float)$row_showcart['giamoi'] *1000000)*(int)$row_showcart['soluong'];
                    $tongtien=$tongtien + $thanhtien;
            ?>
                <tr>
                    <td>
                        <img src="<?php echo $row_showcart['imgsp'] ?>" style="width:150px;height:150px;">
                    </td>
                    <td><?php echo $row_showcart['tensp'] ?></td>
                    <td><?php echo $row_showcart['soluong'] ?></td>
                    <td><?php echo number_format((float)$row_showcart['giamoi']*1000000) ?> <sup>vnđ</sup> </td>
                    <td><?php echo number_format($thanhtien) ?> <sup>vnđ</sup> </td>
                    <td><a onclick="del_sp('<?php echo $row_showcart['tensp'] ?>')" href="?del=<?php echo $row_showcart['id_giohang'] ?>"><i class="fas fa-trash-alt" style="color: red;"></i></a></td>
                </tr>
                <?php } ?>
                <tr style="background-color: grey;">
                    <td colspan="6" style="color: blue;">
                        <b>Tổng đơn hàng:</b> <?php echo number_format($tongtien) ?> <sup>vnđ</sup>
                    </td>
                </tr>
            </tbody>
        </table>
        <form action="giohang.php" method="POST">
        <?php 
          $sql_get_cart=mysqli_query($conn,"select * from giohang order by id_giohang desc");
        ?>
     <?php
        while($row_get_cart=mysqli_fetch_array($sql_get_cart)){
     ?>  
          <input type="hidden" class="form-control" name="id_cart[]" value="<?php echo $row_get_cart['id_giohang'] ?>">  
          <input type="hidden" class="form-control" name="sl[]" value="<?php echo $row_get_cart['soluong'] ?>">  

    <?php } ?>
             <button type="submit" name="dathang" class="btn btn-success" style="margin-bottom: 20px;margin-left:75%;margin-top:-15px;width:250px">Đặt Hàng</button>
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
    <script>
        var kt;
    function del_sp(name){
    //   return confirm("Bạn có chắc muốn xóa sản phẩm "+name+ "?");
      if(confirm("Bạn có chắc muốn xóa sản phẩm "+name+ "khỏi giỏ hàng?")==true){
        kt=1;
      }
      else{
        kt=0;
      }
      return kt;
    }
  </script>  
</body>
</html>