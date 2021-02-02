<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
    <title>Prescription</title>
  </head>
  <body>
  <br><br><br>
<section class="login_form">
    <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
           <div class="col-lg-6">
             <div class="class-form ">
               <form action="" method="POST">
                    <p>User Name</p>
                    <input type="text" name="user_name" placeholder="User Name">
                    <p>Password</p>
                    <input type="password" name="user_pass" placeholder="Password">
                    <button class="btn btn-success btn-md btn-block" type="submit" name="subbtn" >Log In</button>
               </form>
             </div> 
             <?php
              require_once('connect.php');
            
                  if(isset($_POST['subbtn'])) { 
                  
                    $user_name = $_POST['user_name'];
                    $user_pass = $_POST['user_pass'];
                        
                          $select ="SELECT * FROM user_tbl WHERE user_name ='$user_name' AND user_pass='$user_pass'";
                        
                          $run = mysqli_query($con,$select);

                          $count = mysqli_num_rows($run);

                          if($count){
                              header('location:selectdoctor.php');
                          }else{
                              echo"Your user name Or password incorrect !";
                            }
               }
             ?> 

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
</html>       
