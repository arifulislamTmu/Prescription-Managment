
<?php
require_once("connect.php");
		$query ="SELECT * FROM doctor_info_tbl WHERE doctor_code = '" . $_POST["doctor_code"] . "'";
			$results = mysqli_query($con,$query);
		?>
		<?php
			while($rs=mysqli_fetch_array($results)) {
		?>
			<option value="<?php echo $rs["dr_info_id"]; ?>"><?php echo $rs["doctor_code"]; ?></option>
<?php

}
?>
