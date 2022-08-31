<?php

//memasukkan file config.php
include('src/config.php');

print_r($_POST);
$var1 = json_encode($_POST);
echo $var1;
?>
 
    <div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NCBI ID</th>
					<th>Linkage</th>
					<th>Description</th>
					<th>Wikipedia</th>
					<th>Referensi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database 
				$sql = mysqli_query($koneksi, "SELECT * FROM vegetasi WHERE taxonomy_id='$var1'") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
				while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$data['taxonomy_id'].'</td>
							<td>'.$data['kingdom'].'</td>
							<td>'.$data['description'].'</td>
							<td>'.$data['wikipedia'].'</td>
							<td>'.$data['reference'].'</td>
						</tr>
						';
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>

<?php
/*
print_r($_POST);

$var1 = isset($_POST['code']);
print_r($var1);

  $getvalue="SELECT * from vegetasi WHERE taxonomy_id='$var1'";
  $result=mysqli_query($koneksi, $getvalue) or die(mysql_error());


  while($row=mysql_fetch_array($result)){
       extract($row);
       echo $kingdom; 
  } */
?>  
