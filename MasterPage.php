<?php session_start(); ?>
<?php
    function mySlider(){
        $xau = '
            <div id="slider" style="max-width: 100%;" style="with: 100%">
                <img src="./images/slider-1.jpg">
                <img src="./images/slider-2.jpg">
                <img src="./images/slider-3.jpg">
                <img src="./images/slider-4.jpg">
                <script src="./js/ideal-image-slider.js">test</script>
                <script src="./js/iis-bullet-nav.js"></script>
                <script src="./js/projectfinal.js"></script>
             </div> <!-- #slider -->
           
        ';
        return $xau;
    }
    function myMenu(){
        $xau = '
                
                    <div class="row">
                        <div id="menu">
                            <nav class="navbar navbar-expand-sm test ">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Trang Chủ</a>
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
                                        
                                        <div class="dropdown-menu">';
                                        $arr = getArr();
                                        for ($i= 0; $i < count($arr); $i++) {
                                            $xau .= '<a class="dropdown-item" href="index.php?id='.
                                            $arr[$i]->id.'">'.$arr[$i]->booktitle.'</a>';
                                        }
                                        $xau.= '</div>
                                    </li>
                                    <li>
                                        <a href="Login.php"><button type="button" class="btn btn-success btn-lg">Login</button></a>
                                        <a href="Register.php"><button type="button" class="btn btn-success btn-lg">Register</button></a>    
                                    </li>
                                </ul>';
                                if(isset($_SESSION['username'])) {
                                    $xau.= '<div class="navbar-nav ml-auto mt-2 mt-lg-0">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Xin chào '.$_SESSION['username'].'
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Thông tin tài khoản</a>
                                        <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                                        <a class="dropdown-item" href="#">Quyền riêng tư</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="Logout.php">Đăng xuất</a>
                                    </div>
                                </div>';
                                }
                                
        $xau.= '</nav>
                            
                            
                        </div>
                    </div>
                </div>';
        return $xau;
    }
    function myFooterTop(){
        $xau = '
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
        ';
        return $xau;
    }
?>