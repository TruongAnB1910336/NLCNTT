<?php 
include_once('connect.php');
session_start();
?>
<?php 
    if(isset($_GET['id_edit'])) {
        $id_edit=$_GET['id_edit'];
        $_SESSION['edit']=$id_edit;
    }
    if(isset($_POST['edit_sp'])){
        $tensp=$_POST['tensp'];
        $img=$_FILES['img']['name'];
        $path="img/edit_img/".$_FILES['img']['name'];
        $giagoc=$_POST['giagoc'];
        $giakm=$_POST['giakm'];
        $content1=$_POST['content1'];
        $content2=$_POST['content2'];
        $content3=$_POST['content3'];
        $content4=$_POST['content4']; 
        $loai=$_POST['loai'];
        $id_edit=$_SESSION['edit'];
        if(!$img){
            $sql_themsp=mysqli_query($conn,"update sanpham set tensp='$tensp',giacu='$giagoc',giamoi='$giakm',mota1='$content1',mota2='$content2',mota3='$content3',mota4='$content4',loai='$loai' where id='$id_edit'");
        }
        else{
            $sql_themsp=mysqli_query($conn,"update sanpham set tensp='$tensp',imgsp='$path',giacu='$giagoc',giamoi='$giakm',mota1='$content1',mota2='$content2',mota3='$content3',mota4='$content4',loai='$loai' where id='$id_edit'");
            move_uploaded_file($_FILES['img']['tmp_name'],$path);
        }
        header('Location: quanlysp.php');
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
    <title>Cập Nhật Sản Phẩm</title>
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
        <h2 style="text-align: center;">Edit Sản Phẩm</h2>
        <?php 
            $sql_showsp=mysqli_query($conn,"select * from sanpham where id='$id_edit'"); 
        ?>
        <?php 
        while($row_showsp=mysqli_fetch_array($sql_showsp)){
        ?>
    <form action="edit_sp.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3" style="margin-left:30%";>
            <label for="tensp" class="form-label"><b>Tên sản phẩm</b></label>
            <input type="text" class="form-control" name="tensp" value="<?php echo $row_showsp['tensp']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="img" class="form-label"><b>Hình ảnh</b></label>
            <input type="file" class="form-control" name="img" style="width:70%";>
            <img style="width: 150px;height:150px;" src="<?php echo $row_showsp['imgsp']?>">
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="giagoc" class="form-label"><b>Giá gốc</b></label>
            <input type="text" class="form-control" name="giagoc" value="<?php echo $row_showsp['giacu']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="giakm" class="form-label"><b>Giá khuyến mãi</b></label>
            <input type="text" class="form-control" name="giakm" value="<?php echo $row_showsp['giamoi']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content1" class="form-label"><b>Mô tả 1</b></label>
            <input type="text" class="form-control" name="content1" value="<?php echo $row_showsp['mota1']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content2" class="form-label"><b>Mô tả 2</b></label>
            <input type="text" class="form-control" name="content2" value="<?php echo $row_showsp['mota2']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content2" class="form-label"><b>Mô tả 3</b></label>
            <input type="text" class="form-control" name="content3" value="<?php echo $row_showsp['mota3']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content2" class="form-label"><b>Mô tả 4</b></label>
            <input type="text" class="form-control" name="content4" value="<?php echo $row_showsp['mota4']?>" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content2" class="form-label"><b>Giới thiệu</b></label><br>
            <textarea name="gioithieu"  rows="10" cols="80"><?php echo $row_showsp['gioithieu']?></textarea>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <select name="loai" class="form-control" style="width:70%";>
                <option value="<?php echo $row_showsp['loai']?>"><?php echo $row_showsp['loai']?></option>
                <?php 
                    $sql_type=mysqli_query($conn,"select DISTINCT loai from sanpham");
                ?>
                <?php 
                  while($row_type=mysqli_fetch_array($sql_type)) {
                ?>
                <option value="<?php echo $row_type['loai']?>"><?php echo $row_type['loai']?></option>   
            <?php }?>
               <option value="Khác">Khác</option>
            </select>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <input type="submit" class="form-control btn-primary" name="edit_sp" style="width:70%"; value="Cập nhật sản phẩm">
        </div>
    </form>
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