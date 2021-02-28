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
							<div class="text">
								<hr class="line-brand ">
								<h2 class ="text-brand"> '.$row['booktitle'].' </h2>
								<hr class="line-brand">
							</div>
						</div>';
					$xau.= '<div class="container">';
					$xau.= '<div class="row">';
					$query1 = "SELECT * FROM books WHERE category_id = '$id'";
					$result1 = $conn->query($query1);
					while ($row1 = $result1->fetch_assoc()) {
						$xau.= '
							<div class="col-sm-3 ">
								<div class="book">
									<img src="'. $row1['image'].'" class="product-image">
									<p> '.$row1['booktitle'].' </p>
									<p style="margin-bottom: 5px;"> '.$row1['price'].' $ </p>
									<button type="button" class="btn btn-success">Mua Hàng</button>
								</div>	 
							</div>
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