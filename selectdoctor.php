<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
    <title>Prescription</title>
  </head>
  <body>
  <br><br><br>
  <?php
    require_once('connect.php');
  ?>
<section class="login_form">
    <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
           <div class="col-lg-6">
             <div class=" doctorSelect">
             <form action="" method="POST">

                  <div class="doctorName">
                      <div class="row">
                    
                          <div class="col-lg-8">
                          <p>Select Doctor Name</p>
                         
                          <select class="form-control"name="doctor_name" onChange="getState(this.value);">
                                <?php
                                $select ="SELECT * FROM doctor_n_tbl";

                                $run =mysqli_query($con,$select);

                                while($rows = mysqli_fetch_array($run )){ ?>

                                <option value="<?php echo $rows['doctor_code']; ?>"><?php echo $rows['doctor_name'];?>
                                </option>
                                 <?php
                                } 
                                ?>
                                </select>
                             </div>
                
                          <div class="col-lg-4">
                             <p>Doctor Id</p> 
                              <select name="doctor_code" id="jela-list" class="form-control">
                              <option>Doctor Id</option>
                              </select>
                          </div>
                        
                      </div>
                  </div>
                    <p>Hospital Name</p> 
                        <select class="form-control" name="hospital">
                            <option selected>Hospital Name</option>
                            <option>Islamia hospital</option>
                            <option>Khidmah hospital</option>
                            <option>Mugda Hospital</option>
                        </select>
                    <button name="subbtn" class="btn btn-success btn-lg form-control">SUBMIT</button>
               </form>
             </div> 
         </div>
      <div class="col-lg-3"></div>
    </div>
</div>
</section>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>

  <script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'doctor_code='+val,
	success: function(data){
		$("#jela-list").html(data);
	}
	});
}

</script>
</html>

<?php
  if(isset($_POST['subbtn'])){
      $doctor_name = $_POST['doctor_name'];
      $doctor_code = $_POST['doctor_code'];
      $hospital = $_POST['hospital'];
     
      session_start();
			$_SESSION['doctor_code']="$doctor_code";
	

    $insertQ ="INSERT INTO doctor_all_info_tbl(doctor_code,dr_info_id1,hospital_name)values('$doctor_name','$doctor_code','$hospital')";
    $run = mysqli_query($con,$insertQ);
    if($run){
      header('location:detailpatient.php');
    }
  }

?>


