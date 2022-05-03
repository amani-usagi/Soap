<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>SOAP: Client</title>
    <style>
        .link {
            padding: 10px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
    </div>
    <div class="panel panel-heading">
        <h2>Student Search</h2>
        <a class="link" href="./register.php">Register</a>
        <a class="link" href="./client.php">Client</a>
    </div>
    <div class="panel panel-body">
        <form class="form-inline" action="" method="POST">
            <div class="form-group">
                <label for="name">Student Number</label>
                <input type="text" name="student_id" class="form-control" placeholder="Student ID" autocomplete="off" required>
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="panel panel-body">
        <p>&nbsp;</p>

        <?php
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn,'soap');

        if(isset($_POST['submit'])){
            $sid = $_POST['student_id'];
            $query = "SELECT * FROM student_records WHERE student_id='$sid' ";
            $qrun = mysqli_query($conn, $query);

            if($row = mysqli_fetch_array($qrun)){
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Student Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Home Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['student_id']; ?> </td>
                            <td><?php echo $row['full_name']; ?> </td>
                            <td><?php echo $row['email']; ?> </td>
                            <td><?php echo $row['phonenumber']; ?> </td>
                            <td><?php echo $row['home_address']; ?> </td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }
            else
                    echo "Details do not exist :-(";
        }
        ?>
    </div>
</body>
</html>