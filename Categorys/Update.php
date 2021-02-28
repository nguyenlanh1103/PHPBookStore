
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
<?php

require "../connect.php";
$idUpdate = $_GET['id'];

// sql to delete a record
$sql = "SELECT * FROM categorys WHERE id='$idUpdate'";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $name = $row['booktitle'];
    
}

$conn->close();
?>

<div class="container">
  <h2 class="text-center" style="margin: 20px 0px;">Thêm Thể Loại:</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Tên Thể Loại:</label>
      <input type="name" class="form-control" id="name" value="<?php echo $name;?>" placeholder="VD: thiếu nhi, SGK..." name="name">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
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
			$queryUpdate = "UPDATE categorys
                            SET booktitle = '$ten' 
                            WHERE id = '$idUpdate'";
			
			if ($conn->query($queryUpdate) === TRUE) {
    			header("Location: ../CategoryAdmin.php", false, 307);
			} else {
    			echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	}


?>