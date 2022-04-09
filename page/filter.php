<form action="">
	<?php 
	if(isset($_GET['page'])) 
		echo '<input type="hidden" name="page" value="'.$_GET['page'].'" />'; 
	?>
	<div class="d-flex align-items-center">
		<div class="mr-2">Dari</div>
		<input type="date" class="mr-2" name="dari" value="<?php echo isset($_GET['dari']) ? $_GET['dari']: '' ?>" required />
		<div class="mr-2">Sampai</div>
		<input type="date" name="sampai" class="mr-2" value="<?php echo isset($_GET['sampai']) ? $_GET['sampai']: '' ?>" required />
		<button class="btn btn-primary mr-2" type="submit">Filter</button>
		<a href="index.php?<?php if(isset($_GET['page'])) echo 'page='.$_GET['page'] ?>" class="btn btn-danger">Reset</a>
	</div>
</form>
<?php
if(isset($_GET['dari']) && isset($_GET['sampai'])) {
	$sql = mysqli_query($koneksi, "select * from kas where jenis = '".$_GET['page']."' and tgl > '".$_GET['dari']."' and tgl < '".$_GET['sampai']."' ");
}
?>

