<?php

include 'db.php';

//pass form values to register students function - remove whitespaces before saving in db
if(isset($_POST["register"])){
    $student_id = trim($_POST["student_id"]);
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $phone_number = trim($_POST["phone_number"]);
    $home_address = trim($_POST["home_address"]);

    register($student_id, $full_name, $email, $phone_number, $home_address);
} 
?>
<!-- form styling - focus on text box and error highlighting -->
<style>
.link{
    float: right;
    color: green;
}
.form-control:focus {
    border-color: #000;
    box-shadow: none;
}
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
}
.form-control.error {
    border-color: red;
    padding: .375rem .75rem;
}    
</style>

<!DOCTYPE html>
<html lang="en">
    <head>  
        <title>SOAP: Student Registration</title>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
        <style>
            .link {
                padding-right: 10px;
                text-decoration: none;
                font-weight: bold;
            }
        </style>
    </head>  
    <body>  
        <div class="container">
        <span class="text-info"><?php echo $conn_msg; ?></span> <!-- display success/error database connection message -->
            <div class="panel panel-default">
            <!-- registration form -->
                <div class="panel-heading">
                    Registration Form
                    <a class = "link" href="./client.php">Client</a>
                    <a class = "link" href="./read.php">Read</a>
                </div>
                    <div class="panel-body">
                        <form method="post" name="reg_form">
                            <div class="form-group">
                                <label>Student ID</label>
                                <input type="text" name="student_id" class="form-control" placeholder="example 123456" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" name="full_name" class="form-control" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="example@mail.com" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="example  07********" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label>Home Address</label>
                                <input type="text" name="home_address" class="form-control" placeholder="Post Code and Name" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="register" class="btn btn-success" value="Register" />
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </body>  
</html>