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
</head>
<body>

<div class="container">
  <h2 class="text-center" style="margin: 20px 0px;">Sửa Thông Tin Sản Phẩm:</h2>
  <form action="" method="POST">
    <?php
        require ('../connect.php');
            $id_update = $_GET['id'];
            $query = "SELECT * FROM books WHERE id = '$id_update'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                $name = $row['booktitle'];
                $desc = $row['describes'];
                $price = $row['category_id'];
            }
    ?>
    <div class="form-group">
      <label for="name">Tên Sản Phẩm:</label>
      <input type="name" class="form-control" id="name" value="<?php echo $name;   ?>" name="name">
    </div>
    <div class="form-group">
      <label for="name">Mô Tả:</label>
      <input type="name" class="form-control" id="name" value="<?php echo $desc;   ?>" name="desc">
    </div>
    <div class="form-group">
      <label for="name">Giá Sản Phẩm:</label>
      <input type="name" class="form-control" id="name" value="<?php echo $price;   ?>" name="price">
    </div>
    <div class="form-group">
      <label for="name">Chọn Thương Hiệu:</label>
      <?php
        require ('../DataBase.php');
        $arr =  getArr();
        $xau = '<select id="brand" class="form-control" name="brand">';
        for($i=0; $i<count($arr); $i++){
            $xau.='<option value="'.$arr[$i]->id.'">'.$arr[$i]->booktitle.'</option>';
        }
        $xau.='</select>';
        echo $xau;
        // print_r($arr);
        ?>
    </div>
    
    
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
<?php 
    require ('../connect.php');
	if (isset($_POST['submit'])) {
            $ten = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $brand = $_POST['brand'];
			$queryUpdate = "UPDATE books 
                            SET booktitle = '$ten', describes = '$desc', price= '$price', category_id = '$brand' 
                            WHERE id = '$id_update'";
			
			if ($conn->query($queryUpdate) === TRUE) {
    			header("Location: ../BookAdmin.php", false, 307);
			} else {
    			echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	}


?>