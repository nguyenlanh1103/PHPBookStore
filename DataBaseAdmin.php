<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách Tên Sách</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<a href="./Categorys/Create.php" class="btn btn-primary">Thêm Tên Sách</a>
						<table class="table table-bordered" style="margin-top:20px;">
							<thead>
								<tr class="bg-primary">
									<th>ID</th>
									<th>Book Title</th>
                                    <!-- <th width="20%">Ảnh sản phẩm</th> -->
                                    <th>Tùy Chọn</th>
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
												echo " <td><a href='admin/createbrands.php?id=" . $row['id'] . "' class='btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i> Sửa</a></td>";
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
