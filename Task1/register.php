<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
$DATABASE_HOST="localhost";
$DATABASE_USER="root";
$DATABASE_PASS="";
$DATABASE_NAME="msarri_task_one";
// session_destroy();

$con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Error connection to the Database'.mysqli_connect_error());
}

if($stmt=$con->prepare('Select id, password from msariiuser where name=?')){
    $stmt->bind_param('s',$_POST['name']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        echo 'Username Already Exists. Try  Again';
        ?>            
            <script>
                swal({                          
                title: 'Username Already Exists. Try  Again',
                text: 'You will now be redirected to the Registrationpage.',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: false
            });                
                setTimeout(function() {
                window.location.href = 'index.html';     // because previously header.location disturbing the work of swal ie immediate switch.
                }, 3000);
                
            </script>


            <?php

    }
    else{
        if($stmt=$con->prepare('insert into msariiuser(name,email,phoneNo,password) values (?,?,?,?)')){
            $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
            // $stmt->bind_param('ssis',$_POST['name'],$_POST['email'],$_POST['phoneNo'],$password);   // for encryting and storing on DB. But login password checking issue.
            $stmt->bind_param('ssis',$_POST['name'],$_POST['email'],$_POST['phoneNo'],$_POST['password']);
            $stmt->execute();
            echo 'Successfully Registered';
            ?>            
            <script>
                swal({                          
                title: 'Registrated successfully / Data inserted successfully !',
                text: 'You will now be redirected to the loginpage.',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: false
            });                
                setTimeout(function() {
                window.location.href = 'login.html';     
                }, 3000);
                
            </script>


            <?php
            //header('Location: login.html');
        }
        else{
            echo 'Error Occurred';
        }
    }
    $stmt->close();

}
else{
    echo 'Error Occurred';
}
$con->close();
?>
