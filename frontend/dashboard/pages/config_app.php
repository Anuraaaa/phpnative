<?php
	// Include header and sidebar of templates
  include_once('../../templates/header.php');
  include_once('../../../config/connection.php');

  $sql = mysqli_query($connection, "SELECT * FROM config_app");
  $result = mysqli_fetch_assoc($sql);
?>

<h3>Config App</h3>
<hr>
<?php
if (isset($_SESSION['updated']) && $_SESSION['updated'] === true) {
  echo("
   <div class='alert alert-info'>
       Berhasil, perubahan disimpan
   </div>");
   unset($_SESSION['updated']);
}
?>
<form action="../../../backend/update_config.php" method="POST">
  <div class="mb-3">
    <label for="inputNameApp" class="form-label">Nama Aplikasi</label>
    <input type="text" class="form-control" id="inputNameApp"  name="name" value="<?php echo($result['name'])?>" required>
  </div>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="inputDescription" rows="3" name="description" required><?php echo($result['description'])?></textarea>
  </div>
  <div class="mb-3">
    <label for="inputVersion" class="form-label">Version</label>
    <input type="text" class="form-control" maxlength="3" id="inputVersion" name="version" value="<?php echo($result['version'])?>" required>
  </div>
  
  <div class="d-grid">  
    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
  </div>
</form>

<?php
	// Include footer of templates
	include_once('../../templates/footer.php');
?>