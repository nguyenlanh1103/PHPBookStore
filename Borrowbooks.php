<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Viện Điện Tử</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/ideal-image-slider.css">
    <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/borrow.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="myMenu">
        <div class="row">
            <div id="menu">
                <nav class="navbar navbar-expand-sm test ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên Hệ</a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Danh Sách Các Loại Sách
                            </a>
                
                        </li>
                                    
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="product-review-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tủ sách</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thông tin tài khoản</a></li>
                    <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">Đơn hàng</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <table class="table table-striped table-responsive table-hover">
                            <thead>
                                <tr class="warning">
                                    <th>Id</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Mật Khẩu</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Phân quyền</th>
                                    <th>Địa Chỉ</th>
                                    <th>Ngày Sinh</th>
                                    <th>Số Sách Đã Mượn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $con = new mysqli('localhost', 'root', '', 'quanlysach');
                                        $sql = "SELECT * from user";
                                        if ($result = $con->query($sql)) {
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_array()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                                                echo "<td>" . $row['username'] . "</td>";
                                                                                echo "<td>" . $row['pass'] . "</td>";
                                                                                echo "<td>" . $row['email'] . "</td>";
                                                                                echo "<td>" . $row['phone'] . "</td>";
                                                                                echo "<td>"  . $row['role'] .  "</td>";
                                                                                echo "<td>"  . $row['address'] .  "</td>";
                                                                                echo "<td>"  . $row['Dateofbirth'] .  "</td>";
                                                                                echo "<td>"  . $row['numberofbooksborrowed'] .  "</td>";
                                                                            
                                                }
                                                $result->free();
                                            } else {
                                                echo "Không tìm thấy dữ liệu.";
                                            }
                                        } else {
                                            echo "ERROR: Không thể thực thi câu lệnh $sql. " . $mysqli->error;
                                        }
                                        $con->close();
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class=" myFooterTop">
       
            <div id="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h3>Contact Us</h3>
                                <div class="line"></div>
                                <div class="footer-widget-content">
                                    <a href="#">
                                        Email: lanh.nguyen@students.hueic.edu.vn
                                    </a>
                                    <p>Địa chỉ: 127B Nguyễn Lộ Trạch, Huế</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h3>service hosting</h3>
                                <div class="line"></div>
                                <div class="footer-hosting">
                                    <a href="https://tgs.com.vn/vi/">Hosting: <www class="Lanhpro"></www>.com.vn</a>
                                    <br><a href="http://dgm.vn/">Digital Marketing: DGM</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h3>Nhận tin tức mới</h3>
                                <div class="line"></div>
                                <p>Chúng tôi sẽ gửi những tin tức, sự kiện mới nhất cho các bạn qua email này.</p>
                                <form class="form-footer">
                                    <input type="text" placeholder="Email của bạn: " class="text-form">
                                    <button type="button" class="btn-footer">&#8594;</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- #footer-top -->
            <div id="footer-bottom">
			<div class="content-bottom">
				<p>2020 &#169; World Mobile CORPORATION.</p>
			</div>
			<div class="footer-social">
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-youtube"></a>
				<a href="#" class="fa fa-skype"></a>
			    <a href="#" class="fa fa-instagram"></a>
			</div>
		    </div>
        
        
    </div>
    
    
</body>
</html>

<?php
   
    
?>