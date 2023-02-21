<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>
    .gradient-custom {
        background: #f6d365;
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }
</style>


<body>

    <?php require 'profile.php'?>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img id="image-preview" src="imagesSer/<?php echo $loginnedImage;?>" alt="Avatar" class="img-fluid my-5"
                                    style="width: 100px; height:100px;border-radius: 50%;" />
                                <h5><?php echo $loginnedName; ?></h5>
                                
                                <i class="fa fa-edit mb-5 edit-name" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8">
                                <form action="edit.php" method="post">
                                    <div class="card-body p-4">
                                        <h6>Information</h6>
                                        <hr class="mt-0 mb-4">                                   
                                        <div class="col-6">
                                            <h6>Email</h6>
                                            <div class="d-flex justify-content-between">   
                                                
                                                <p class="text-muted" id="emailChangedtext"><?php echo $loginnedEmail; ?></p>
                                                                                            
                                                
                                                <!-- <i class="fa fa-edit mt-2 edit-email" aria-hidden="true"></i>   -->
                                                
                                                                                          
                                                                                              
                                            </div>
                                        </div>                                   
                                        <h6>Other Information</h6>
                                        <hr class="mt-0 mb-4">                                       
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <div class="d-flex justify-content-between">                                                   
                                                <p class="text-muted"><?php echo $loginnedPhoneNo; ?></p>
                                                                                               
                                                <!-- <i class="fa fa-edit mt-2 edit-phoneNo" aria-hidden="true"></i>                                                 -->
                                            </div>                                            
                                        </div>
                                        <div>
                                           <input type="submit" value="Edit" class="btn btn-success" />
                                            <!-- <button class="btn btn-success" id="submit-btn" >Save</button> -->
                                        </div>
                                    </form>
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
