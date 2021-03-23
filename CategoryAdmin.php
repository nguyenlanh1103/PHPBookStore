<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php
            require('MasterPageAdmin.php');
            echo menuLeft();
        ?>
        <div id="page-content-wrapper">
            <?php
                echo toggleMenu();
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2>Danh sách Thể Loại Sách</h2>
                            </div>
                            <div class="panel-body">
                                <div class="bootstrap-table">
                                    <div class="table-responsive">
                                        <a href="Categorys/Create.php" class="btn btn-primary">Thêm Tên Sách</a>
                                        <table class="table table-bordered" style="margin-top:20px;">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th>ID</th>
                                                    <th>Tên Sách</th>
                                                    <!-- <th width="20%">Ảnh sản phẩm</th> -->
                                                    <th>Tùy chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $con = new mysqli('localhost', 'root', '', 'quanlysach');
                                                    $sql = "SELECT * from categorys";
                                                    if ($result = $con->query($sql)) {
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_array()) {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['id'] . "</td>";
                                                                echo "<td>" . $row['booktitle'] . "</td>";
                                                                // echo "<td>" . '<img src="images/'.$row["product_image"].'" width="120px" height="120px">'."
                                                                //     </td>";
                                                                echo " <td><a href='Categorys/Update.php?id=" . $row['id'] . "' class='btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i> Sửa</a>
                                                                <a href='Categorys/Delete.php?id=" . $row['id']."' 
                                                                class='btn btn-danger' ><i class='fa fa-trash' aria-hidden='true'></i> Xóa</a>
                                                                </td>";
                                                                echo "</tr>";
                                                            }
                                                            // $result->free();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>

    
</body>
</html>