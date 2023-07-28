<?php
	// Include header and sidebar of templates
	include_once('../../../config/connection.php');
	include_once('../../templates/header.php');
	$sqlProducts = mysqli_query($connection, "SELECT * FROM products");
?>

<h3>Products</h3>
<hr>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  +Tambah
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<form action="../../../backend/create_products.php" method="POST">
			<div class="mb-3">
				<label for="inputNameProduct" class="form-label">Nama</label>
				<input type="text" class="form-control" id="inputNameProduct" name="name" placeholder="Masukkan nama product" required>
			</div>
			<div class="mb-3">
				<label for="inputPrice" class="form-label">Harga</label>
				<input type="text" class="form-control" id="inputPrice" name="price" placeholder="Masukkan harga product" required>
			</div>
			<div class="mb-3">
				<label for="inputVersion" class="form-label">Kategori</label>
				<select class="form-select" aria-label="Default select example" name="kategori" required>
					<option selected>Pilih kategori</option>
					<option value="Pakaian">Pakaian</option>
					<option value="Elektronik">Elektronik</option>
					<option value="Aksesoris">Aksesoris</option>
				</select>
			</div>			
			<div class="mb-3 text-center">
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>

<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Users By</th>
      <th scope="col">Created At</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	  <?php
		while ($rows = $sqlProducts->fetch_assoc()) {
			$sql = "SELECT * FROM users WHERE id =". $rows['users_by'];
			$userQuery = mysqli_query($connection, $sql);
			$user = mysqli_fetch_assoc($userQuery);
			$name = $rows['name'];
			$price = $rows['price'];
			$kategori = $rows['category'];
			$id = $rows['id'];

			echo("
			<tr>
				<td>".$rows['id']."</td>
				<td>".$rows['code']."</td>
				<td>".$rows['name']."</td>
				<td>".$rows['price']."</td>
				<td>".$rows['category']."</td>
				<td>".$user['username']."</td>
				<td>".$rows['created_at']."</td>
				<td>

					<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal1'>
						Update
					</button>
			  
					<div class='modal fade' id='exampleModal1' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
						<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'>Update Product</h1>
							<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
							</div>
							<div class='modal-body'>
							<form action='../../../backend/update_products.php' method='POST'>
								<input type='hidden' name='id' value='$id'>
								<div class='mb-3'>
									<label for='inputNameProduct' class='form-label'>Nama</label>
									<input type='text' class='form-control' id='inputNameProduct' name='name' value='$name' required>
								</div>
								<div class='mb-3'>
									<label for='inputPrice' class='form-label'>Harga</label>
									<input type='text' class='form-control' id='inputPrice' name='price' value='$price' required>
								</div>
								<div class='mb-3'>
									<label for='inputVersion' class='form-label'>Kategori</label>
									<select class='form-select' aria-label='Default select example' name='kategori'>
										<option selected>Pilih kategori</option>
										<option value='Pakaian'>Pakaian</option>
										<option value='Elektronik'>Elektronik</option>
										<option value='Aksesoris'>Aksesoris</option>
									</select>
								</div>			
								<div class='mb-3 text-center'>
									<button type='submit' class='btn btn-primary'>Update</button>
								</div>
							</form>
							</div>
						</div>
						</div>
					</div>
			  
				</td>
				<td>
					<form action='../../../backend/delete_products.php' method='POST'>
						<input type='hidden' name='id' value='$id'>
						<button class='btn btn-danger'>
							Delete
						</button>
					</form>
				</td>
			</tr>
			");			
		}  
	?>
  </tbody>
</table>

<?php
	// Include footer of templates
	include_once('../../templates/footer.php');
?>