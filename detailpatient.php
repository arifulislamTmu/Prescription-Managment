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
<!-- search auto -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
   
<!-- search auto -->
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
     <form action=" " method="POST">
        <div class="row">
           <div class="col-lg">
              <div class="row py-3">
                 <div class="col-lg-3">
                
                    <div class="name_title">
                    <label>Patient Name</label>
                    <input type="text"class="form-control py-1" name="Pname">
                  </div>
                 </div>
                 <div class="col-lg-2">
                 <div class="age_title">
                    <label>Age</label>
                      <input type="text"class="form-control" name="age">
                  </div>
                 </div>
                 <div class="col-lg-1">
                  <div class="genter">
                    <label>Gender</label> 
                        <select class="form-control" name="gender_name">
                        <option selected></option>
                        <option >Male</option>
                        <option >Female</option>
                      </select>
                  </div>
                 </div>
                 <div class="col-lg-1">
                 <div class="Weight_title">
                    <label>Weight</label>
                    <input type="text"class="form-control" name="weight1">
                </div>
                </div>
                <div class="col-lg-2">
                  <div class="Cell_title">
                      <label>Phone No</label>
                      <input type="Number"class="form-control" name="Phone_No" >
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="Address_title">
                      <label>Address</label>
                      <input type="text"class="form-control" name="Address">
                  </div>
                </div>
           
                   
                <div class="col-lg-1">
                  <div class="Serial_number">
                      <label>Serial No</label>
                      <?php
                  $select ="SELECT * FROM patient_tbl order by ptn_id DESC LIMIT 1";

                  $run =mysqli_query($con,$select);

                  while($rows = mysqli_fetch_array($run )){ ?>
                      <input type="text"class="form-control" name="serial_no" value="<?php echo $rows['serial_no'] ?>">
                      <?php
                  }
                  ?>
                  </div>
                </div>
                 
               
              </div>
                <div class="row">
                   <div class="col-lg-3 border">
                     <label>Symptom</label>
                      <div class="symptom_title">
                        <textarea name="symptom" class="form-control" rows="2"></textarea>
                      </div>
                      <div class="bp">
                      <label>Blood Pressure</label>
                       <input class="form-control" type="text" name="bpname">
                      </div>
                      <div class="Diabetes">
                      <label>Diabetes</label>
                       <input class="form-control" type="text" name="diabetes">
                      </div>
                      <div class="advice_title">
                      <label>Advice</label>
                        <textarea name="advice" class="form-control" rows="2"></textarea>
                      </div>
                   </div>
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
                              <span>1.Medicine Name</span> 
                               <div class="col-lg-8">
                               <input type="text" name="medicine1" id="search_data" placeholder="" autocomplete="off" class="form-control input-lg" />
                             </div>
                               <div class="col-lg-4">
                               <select class="form-control " name="Douse_name">
                                    <option selected>Douses</option>
                                    <option>1+0+1 After meals </option>
                                    <option>0+1+0 After meals</option>
                                    <option>0+0+1 Before meals</option>
                                 </select>
                                 </div>
                              </div>
                            </div>
                            <input type="submit" class="btn btn-lg btn-success" name="subbtn" value="Add medicine">
                            <br />
                           <span id="medicine_name"></span>
                         </form>
                         
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

                        <?php
                        require_once("connect.php");
                          if(isset($_POST['subbtn'])){
                            $medicine1=$_POST['medicine1'];
                            $Douse_name = $_POST['Douse_name'];
                            $Pname = $_POST['Pname'];
                            $age = $_POST['age'];
                            $gender_name = $_POST['gender_name'];
                            $weight = $_POST['weight1'];
                            $Phone_No = $_POST['Phone_No'];
                            $Address = $_POST['Address'];
                            $symptom = $_POST['symptom'];
                            $bpname = $_POST['bpname'];
                            $diabetes = $_POST['diabetes'];
                            $advice = $_POST['advice'];
                            $serial_no = $_POST['serial_no'];
                            
                            $insertq = "INSERT INTO patient_tbl (medicine1,Douse_name,Pname,age,gender_name,weight1,Phone_No,Address,symptom,bpname,diabetes,advice,serial_no)values('$medicine1','$Douse_name','$Pname','$age','$gender_name','$weight','$Phone_No','$Address','$symptom','$bpname','$diabetes','$advice','$serial_no')";
                            $run = mysqli_query($con,$insertq);
                            if($run){
                              echo '<script>window.location="detailpatient.php"</script>';

                            }else{
                              echo"insert not";
                            }
                          
                          }
                        
                        
                        ?>

                         </div>
                         <div class="col-lg-4"></div>
                      </div>
                   </div>
                </div>

           </div>
          
        </div>
         <div class="row">
           <div class="col-lg-10"></div>
           <div class="col-lg-2">
              <div class="print_page">
              <a href="print.php"> <button class="btn btn-lg btn-success" >Print & View</button></a>
              </div>
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
<script>
  $(document).ready(function(){
      
    $('#search_data').tokenfield({
        autocomplete :{
            source: function(request, response)
            {
                jQuery.get('fetch.php', {
                    query : request.term
                }, function(data){
                    data = JSON.parse(data);
                    response(data);
                });
            },
            delay: 100
        }
    });

    $('#search').click(function(){
        $('#medicine_name').text($('#search_data').val());
    });

  });
  
    
</script>
