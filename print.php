<?php
require_once("connect.php");
	session_start();
    $doctor_code =$_SESSION['doctor_code'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>patient Details</title>
  </head>

  <body>
     <section class="patent_section">
        <div class="container">
          <div class="row">
            <div class="col-lg bg-light">
                <?php
                    $seclect = "SELECT * FROM doctor_all_info_tbl
                    INNER JOIN doctor_n_tbl on doctor_all_info_tbl.doctor_code = doctor_n_tbl.doctor_code
                    INNER JOIN doctor_info_tbl ON doctor_all_info_tbl.dr_info_id1=doctor_info_tbl.dr_info_id
                    WHERE dr_info_id1 ='$doctor_code' order by sl_id DESC LIMIT 1";

                    $run = mysqli_query($con,$seclect);

                    while($rows = mysqli_fetch_array($run)){ ?>
                     
               <div class="hospital_name text-center">
                 <h1><?php echo $rows['hospital_name'];?></h1>
               </div>
               <div class="doctor_name text-center">
                  <h3><?php echo $rows['doctor_name'];?></h3>
                  <h4><?php echo $rows['degree'];?></h4>
               </div>
            </div>
          </div>
          <?php 
             }
           ?>
        </div>
     <div class="container pb-2 bg-light">

<?php
    $select ="SELECT * FROM patient_tbl order by ptn_id DESC LIMIT 1";
    $run =mysqli_query($con,$select);
    while($rows = mysqli_fetch_array($run )){ 
            $serial =$rows['serial_no'];
            }
        $select ="SELECT * FROM patient_tbl where serial_no='$serial' order by ptn_id ASC LIMIT 1";
        $run =mysqli_query($con,$select);
        while($rows = mysqli_fetch_array($run )){ 
        $serial =$rows['serial_no'];
            ?>
        
        <div class="row">
           <div class="col-lg">
              <div class="row py-3">
                 <div class="col-lg-3">
                
                    <div class="name_title">
                    <label>Patient Name: </label>
                        <?php echo $rows['Pname']?>
                     </div>
                     
                 </div>
                 <div class="col-lg-2">
                 <div class="age_title">
                    <label>Age: </label>
                    <?php echo $rows['age']?>
                         </div>
                 </div>
                 
                 <div class="col-lg-1">
                  <div class="genter">
                    <label>Gender: </label> 
                    <?php echo $rows['gender_name']?>
                  </div>
                 </div>
                 <div class="col-lg-1">
                 <div class="Weight_title">
                    <label>Weight: </label>
                    <?php echo $rows['weight1']?>
                    </div>
                </div>
                <div class="col-lg-2">
                  <div class="Cell_title">
                      <label>Phone No: </label>
                      <?php echo $rows['Phone_No']?>
                      </div>
                </div>
                <div class="col-lg-2">
                  <div class="Address_title">
                      <label>Address:</label>
                      <?php echo $rows['Address']?>
                      </div>
                </div>
           
                  
                <div class="col-lg-1">
                  <div class="Serial_number">
                      <label>Serial No:</label>
                       <?php echo $rows['serial_no']?>
                  </div>
                </div>
                 
                
              </div>
                <div class="row">
                   <div class="col-lg-3 border">
                      <div class="symptom_title">
                        <label>Symptom: </label>
                        <?php echo $rows['symptom']?>
                     </div>
                      <div class="bp">
                      <label>Blood Pressure: </label>
                      <?php echo $rows['bpname']?>
                       </div>
                      <div class="Diabetes">
                        <label>Diabetes: </label>
                        <?php echo $rows['diabetes']?>
                       </div>
                      <div class="advice_title">
                             <label>Advice : </label>
                             <?php echo $rows['advice']?>
                     </div>
                   </div>
                   <?php
                  }
                 ?>
                   <div class="col-lg-9 border">
                      <div class="row">
                         <div class="col-lg-12">
                           <div class="rx_logo">
                             <label>Rx</label>
                           </div>
                         </div>
                      </div>
                      <div class="row">
 

                      <div class="col-lg-8">
                            <div class="medicine py-2">
                              <div class="row">
                               <div class="col-lg-8">
                               <?php
                                    $select ="SELECT * FROM patient_tbl order by ptn_id DESC LIMIT 1";

                                    $run =mysqli_query($con,$select);

                                    while($rows = mysqli_fetch_array($run )){ 
                                        $serial =$rows['serial_no'];
                                   }
                 
                                $select ="SELECT * FROM patient_tbl where serial_no='$serial'";

                                $run =mysqli_query($con,$select);
                                $count= 1;

                                while($rows = mysqli_fetch_array($run )){ ?>
                                  <?php echo $count; $count++;?>.
                                 <?php echo $rows['medicine1'] ?> (

                                  <?php echo $rows['Douse_name'] ?>)<br>

                                  <?php
                                    }
                                    ?>

                                </div>
                               
                                 </div>
                              </div>
                            </div>
                            
                           <span id="medicine_name"></span>
                         </form>
        
                         </div>
                         <div class="col-lg-4"></div>
                      </div>
                   </div>
                </div>

           </div>
           <div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print Prescription</button>
      </div>
        </div>
        
      </div>
</section>



    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>

