<?php include 'profile.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PAGE</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

</head>

<body>
    <section class="vh-100" style="background-color: #D3D3D3;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Page</p>
                                    <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="editedName" name="editedName" value="<?php echo $loginnedName;?>"
                                                    class="form-control" required />
                                                
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="editedEmail" name="editedEmail" value="<?php echo $loginnedEmail;?>"
                                                    class="form-control" required />
                                                
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="editedPhoneNo" name="editedPhoneNo" value="<?php echo $loginnedPhoneNo;?>"
                                                    class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="editedPassword" name="editedPassword" value="<?php echo $loginnedPassword;?>"
                                                    class="form-control" maxlength="10" required />
                                            </div>
                                        </div>
                                        <!-- image -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-file fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="file" id="file-upload" name="file-upload"
                                                    class="form-control"required />
                                            </div>
                                        </div>

                                        

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            
                                            <input type="submit" value="Save Changes" 
                                                class="btn btn-primary btn-lg" />
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="imagesMy/image1.jpg" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php

if(isset($_POST['editedName'])){
    $runned=false;
    $DATABASE_HOST="localhost";
    $DATABASE_USER="root";
    $DATABASE_PASS="";
    $DATABASE_NAME="msarri_task_one";
    $sessionId=$_SESSION['user_id'];
    //echo $sessionId;

    $img=$_FILES['file-upload']['name'];
    //echo "image_path".$img;
    if(isset($img)){
        $tmpName=$_FILES['file-upload']['tmp_name'];
        $uploadDir="imagesSer/";
        move_uploaded_file($tmpName,$uploadDir.$img);
    }
    
    $con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
    if(mysqli_connect_error()){
        exit('Error connection to the Database'.mysqli_connect_error());
    }
    if($stmt=$con->prepare('update msariiuser set name=?,email=?,phoneNo=?,password=?,image=? where id=?')){
        $stmt->bind_param('ssissi',$_POST['editedName'],$_POST['editedEmail'],$_POST['editedPhoneNo'],$_POST['editedPassword'],$img,$sessionId);
        $stmt->execute();
        //echo 'Successfully Edited'.'<br/>';    
        //echo $img.'<br/>';

        if ($stmt->execute()) {
            echo "Statement executed successfully.";
            $runned=true;
            // header("location: home.php");     error from header ie already done above while showing profile.php data
            // exit;

        } else {
            echo "Error executing statement: " . $stmt->errorInfo();
        }
        
        }
    else{
        echo 'Error Occurred';
        }
    $stmt->close();
    $con->close();
    if($runned){
        //header("location:home.php");
        //exit;
        ?>  
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal({                          
                title: 'Edited successfully / Data inserted successfully !',
                text: 'You will now be redirected to the Home page.',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: false
            });                
                setTimeout(function() {
                window.location.href = 'home.php';     
                }, 3000);
                
            </script>


            <?php
    }
}
?>



