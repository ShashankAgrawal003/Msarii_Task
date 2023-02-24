<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Msarii_Task_2</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Pages Name</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Item Page</a></li>
            <li class="active"><a href="subitem.php">Subitem Page</a></li>   
            <li><a href="mainTask.html">Main Page</a></li>        
          </ul>
        </div>
      </nav>
    <div class="container mt-30">
        <h2 align="center">Insert SubItems:-</h2>
        <div class="form-group">
            <form name="add_subItem" id="add_subItem">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <input type="text" name="subItemName[]" id="subItemName" placeholder="Add SubItems:-"
                                    class="form-control name_list" />
                            </td>
                            <td>
                                <button type="button" name="add" id="add" class="btn btn-success">
                                    <i class="fa fa-plus" style="font-size:20px"></i>

                                </button>
                            </td>
                        </tr>
                    </table>
                    <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
        </div>

        <!-- dynamic table -->
        <div class="container">
            <h2>Dynamic Table View</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_item_list">
                    <thead class="thead-dark">
                        <tr class="d-flex justify-content-between">
                            <th>SR No</th>
                            <th>Item Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="dynamic_item_content">
                    <?php
                    
                    $conn = mysqli_connect("localhost", "root", "", "msarii_task_two");
                    if($conn->connect_error){
                        die("Connection failed: ".$conn->connect_error);
                    }
                    $result = mysqli_query($conn, "SELECT * FROM subitems");
                    $x=0;
                    while ($row = mysqli_fetch_assoc($result)) 
                    {   $x++;
                        echo "<tr>
                                <td>$x</td>
                                <td>$row[subItemName]</td>
                                <td><a class='btn btn-primary btn-sm' href='editSub.php?id=$row[id]'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
                                <td><a class='btn btn-danger btn-sm' href='deleteSub.php?id=$row[id]'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                        </tr>";
                    }
                    ?>
                        
                        
                    </tbody>

                </div>
            </div>

        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="subItemName[]" id="subItemName" placeholder="Add SubItems:-" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-minus" style="font-size:20px"></i></button></td></tr>');

        });
        $(document).on('click', '.btn_remove', function () {
            let button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $('#submit').click(function () {
            $.ajax({
                url: "subitemadditon.php",
                method: "POST",
                data: $('#add_subItem').serialize(),   //serialize all form data into array
                success: function (data) {
                    alert(data);
                    location.reload();
                    $('#add_subItem')[0].reset();
                }
            });
        });


    });


</script>