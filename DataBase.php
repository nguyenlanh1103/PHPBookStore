<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.section-content h2 {
			font-size: 30px;
			text-transform: uppercase;
			position: relative;
			margin-top: 50px;
			line-height: normal;
			
		}
		.section-content h2::before {
			width: 50px;
		}
		.line {
			margin-top: 25px;
			width: 40px;
			height: 6px;
			background: #ccc;
			margin: 20px auto 0;
			margin-bottom: 25px;
		}
		.books-listing-4 {
			float: left;
			/* width: 100%; */
			padding: 30px 30px 50px 30px;
			border: solid 1px #d8d8d8;
			text-align: center;
			position: relative;
			margin-bottom: 30px;
		}
		.books-listing-4 .kode-thumb {
			box-shadow: none;
		}
		.books-listing-4 .kode-thumb {
			float: left;
			width: 100%;
			margin-bottom: 15px;
			position: relative;
			/* box-shadow: 28px 0px 0px -20px rgb(0 0 0 / 20%); */
		}
		.home-combo .kode-text {
			height: 80px;
		}
		.books-listing-4 .kode-text {
			float: left;
			width: 100%;
		}
	</style>
</head>
<body>
	
</body>
</html>
<?php
	class category{
		public $id;
		public $booktitle;
		function __construct($id, $booktitle){
			$this->id = $id; $this->booktitle=$booktitle;
		}
	}
	function getArr(){
		// require "connect.php";
		$conn = new mysqli("localhost","root","","quanlysach");
		$cr = $conn->query("select * from categorys"); 
		while($r=$cr->fetch_array()){
			$arr[]=new category($r["id"],$r["booktitle"]);
		}
		mysqli_close($conn);
		return $arr;
	}
	function content($query){
        require "connect.php";  
		$booktitle = '';
		$xau = '';
		// $query = "SELECT * FROM categorys";
		$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$id = $row['id']; 
					$xau .='
						<div class="container">
							<!--SECTION HEADING START-->
								<div class="section-content">
									<h2 class ="text-brand"> '.$row['booktitle'].' </h2>
									<div class="line"></div>
								</div>
							<!--SECTION HEADING END-->
						</div>';
					$xau.= '<div class="container">';
					$xau.= '<div class="row">';
					$query1 = "SELECT * FROM books WHERE category_id = '$id'";
					$result1 = $conn->query($query1);
					while ($row1 = $result1->fetch_assoc()) {
						$xau.= '
						<!--BOOK LISTING START-->
						<div class="col-md-3 col-sm-6 col-xs-6">
						   <div class="books-listing-4 home-combo ">
							  <div class="kode-thumb">
									
										<div class="book">
											<img src="'. $row1['image'].'" class="product-image">
											<p> '.$row1['booktitle'].' </p>
											<div class="kode-text">
												<form method="get" action="/phpbanhangsach/Login.php">
													<button type="submit" class="btn btn-success">Mượn sách</button>
												</form>
      										</div>
											
										</div>
								
							  </div>
							  
						   </div>
						</div>
						<!--BOOK LISTING END-->
						';
					}
					$xau.= '</div>';
					$xau.= '</div>';

				
				} 
			} else {
            } 
        return $xau;
	}
	
?>