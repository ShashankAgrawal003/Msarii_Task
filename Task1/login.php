<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
  $email = $_POST['email'];
  $password = $_POST['password'];
  echo $email;
  echo $password;
  $db = new PDO('mysql:host=localhost;dbname=msarri_task_one', 'root', '');
  $query = $db->prepare("SELECT * FROM msariiuser WHERE email = :email AND password = :password");
  $query->bindParam(':email', $email);
  $query->bindParam(':password', $password);
  $query->execute();
  $user = $query->fetch();
  if ($user) {   
    session_start();
    $_SESSION['user_id'] = $user['id'];     // storing the id for future retrieval

    // swal yaha ayega
    ?>            
    <script>
      swal({                          
      title: 'Logged In successfully!',
      text: 'You will now be redirected to the home page.',
      icon: 'success',
      timer: 3000, 
      showConfirmButton: false
      });                
      setTimeout(function() {
      window.location.href = 'home.php';     // because previously header.location disturbing the work of swal ie immediate switch.
      }, 3000);
                
    </script>


    <?php
    //header('Location:home.html');    // successFully logined then this page will open
    exit();
  } else {
    echo $email;
    echo $password;
    echo "Invalid username or password.";
    ?>            
    <script>
      swal({                          
        title: 'Invalid username or password!',
        text: 'You will now be redirected to the loginpage.',
        icon: 'error',
        timer: 3000, 
        showConfirmButton: false
      });                
        setTimeout(function() {
          window.location.href = 'login.html';     // because previously header.location disturbing the work of swal ie immediate switch.
        }, 3000);
                
    </script>


    <?php
  }   
?>