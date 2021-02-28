<?php
        $nameErr = $emailErr = $phoneErr = $passwordErr = $cpasswordErr ="";
		$name = $email = $password = $cpassword = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST['username'])) {
				$nameErr = "Bắt buộc điền";
			}
			else {
				$name = test_input($_POST['username']);
				//kiểm tra xem chuỗi $name chỉ là chứa chữ
				if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
					$nameErr = "Chỉ được nhập kí tự từ a-z";
				}
			}
			if (empty($_POST['email'])) {
				$emailErr = "Bắt buộc điền";
			}
			else {
				$email = test_input($_POST['email']);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "email không hợp lệ";
				}
			}
			if (!empty($_POST['password']) && ($_POST['password'] == $_POST['cpassword'])) {
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				if (strlen($password) < '8') {
					$passwordErr = "Password phải có độ dài 8 kí tự trở lên";
				}
				elseif (!preg_match("#[0-9]+#",$password)) {
					$passwordErr = "Mật khẩu bắt buộc phải có ít nhất 1 chữ số";
				}
				elseif (!preg_match("#[A-Z]+#",$password)) {
					$passwordErr = "Mật khẩu bắt buộc phải có ít nhất 1 kí tự viết hoa";
				}
				elseif (!preg_match("#[a-z]+#",$password)) {
					$passwordErr = "Mật khẩu bắt buộc có ít nhất 1 kí tự viết thường";
				}
				elseif (!preg_match('@[^\w]@', $password)) {
					$passwordErr = "Mật khẩu phải có ít nhất 1 kí tự đặc biệt";
				}
			}
			elseif (!empty($_POST['password'])) {
				$cpasswordErr = "Mật khẩu xác nhận sai, vui lòng nhập lại";
			}
			else {
				$passwordErr = "Vui lòng nhập mật khẩu!";
			}
		}
		function test_input($data) {
  			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
        }
        if(empty($nameErr)&&empty($emailErr)&&empty($passwordErr)&&empty($cpasswordErr)){
            require ('connect.php');
            if (isset($_POST['submit'])) {
            $password1 = md5($_POST['password']);
            $phone = $_POST['phone'];
            $queryCreate = "insert into user (username, pass, email, phone) VALUES ('$name', '$password1', '$email', '$phone');";
            
            if ($conn->query($queryCreate) === TRUE) {
                header("Location: index.php", false, 307);
            } else {
                echo "Error updating record: " . $conn->error;
            }
    
            $conn->close();
            }

        }
                
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Register form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" placeholder="example" class="form-control">
                                <span class="error"><?php echo $nameErr;  ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" placeholder="BanHang@123" class="form-control">
                                <span class="error"><?php echo $passwordErr;  ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirm Password:</label><br>
                                <input type="text" name="cpassword" id="cpassword"  placeholder="BanHang@123" class="form-control">
                                <span class="error"><?php echo $cpasswordErr;  ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Your Email: </label><br>
                                <input type="text" name="email" id="email" placeholder="Example@gmail.com" class="form-control">
                                <span class="error"><?php echo $emailErr;  ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Number Phone: </label><br>
                                <input type="text" name="phone" id="phone" value="+84" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

?>