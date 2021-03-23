<?php session_start(); ?>
<?php
    if(!isset($_SESSION['adminname'])) {
        header('Location: Login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php
            require('MasterPageAdmin.php');
            echo menuLeft();
        ?>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="index.php"> <?php echo "Xin chào ". $_SESSION['adminname']; ?></a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="Logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                </ul>
    
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h2>Danh sách Sách</h2></div>
                            <div class="panel-body">
                                <div class="bootstrap-table">
                                    <div class="table-responsive">
                                    <a href="Books/Create.php" class="btn btn-primary">Thêm Sách</a>
                                    <a href="Books/Create.php" class="btn btn-primary"><?php echo $_SESSION['adminname']; ?></a>
                                    <table class="table table-bordered" style="margin-top:20px;">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Miêu Tả</th>
                                                <th>Giá</th>
                                                <th>Id Nhãn Hiệu</th>
                                                <th>Ảnh </th>
                                                <th>Tùy chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $con = new mysqli('localhost', 'root', '', 'quanlysach');
                                                $sql = "SELECT * from books";
                                                if ($result = $con->query($sql)) {
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_array()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['id'] . "</td>";
                                                                                        echo "<td>" . $row['booktitle'] . "</td>";
                                                                                        echo "<td>" . $row['describes'] . "</td>";
                                                                                        echo "<td>" . $row['price'] . "</td>";
                                                                                        echo "<td>" . $row['category_id'] . "</td>";
                                                                                        echo "<td>"  . $row['image'] .  "</td>";
                                                            echo " <td><a href='Books/Update.php?id=" . $row['id'] . "' class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='true'></i> Sửa</a>
                                                            <a href='Books/Delete.php?id=" . $row['id']."' 
                                                            onclick='location.href=showDele()' class='btn btn-danger' ><i class='fa fa-trash' aria-hidden='true'></i> Xóa</a>
                                                            </td>";
                                                            echo "</tr>";
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
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
    </div>
    <!-- Bootstrap core JavaScript -->
    
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>

    
</body>
</html>