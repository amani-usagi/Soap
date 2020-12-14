<?php

// database connection credentials
$servername = "localhost";
$port = "3306"; 
$username = "root";
$password = "";
$db = "soap";

//test connection
try{
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$db", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // turn on error mode for debugging errors
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // get maximum sql injection protection
    $conn_msg = "Database Connection Successful!";
} 
catch(Exception $e){
    $conn_msg = "Connection failed: " . $e->getMessage();
}

//save student details upon student registration
function register($StdID, $full_name, $email, $phone_number, $address){	
    global $conn;
    global $conn_msg;

	$query = $conn->prepare('INSERT INTO student_records (student_id, full_name, email, phonenumber, home_address) VALUES (?, ?, ?, ?, ?)');
	$query->bindParam(1,$StdID, PDO::PARAM_INT);
	$query->bindParam(2,$full_name, PDO::PARAM_STR);
    $query->bindParam(3,$email, PDO::PARAM_STR);
    $query->bindParam(4,$phone_number, PDO::PARAM_STR);
    $query->bindParam(5,$address, PDO::PARAM_STR);
    
    try {
        $query->execute();
        echo '<script language="javascript">';
        echo 'alert("Registration Complete!");';
        echo "location.href='./register.php';";
        echo '</script>';
    }
    catch (Exception $e){
        echo '<script language="javascript">';
        echo 'alert("An error occurred while registering! Please try again :-)");';
        echo '</script>';
        $conn_msg = $e->getMessage();
    } 
}

// fetch student from db using admission number - SOAP service function
function get_student_details($student_id){
    global $conn;
    global $conn_msg;
    try {
        $query = $conn->prepare('SELECT * FROM student_records WHERE student_id =  ?');
        $query->bindParam(1, $student_id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
    
        if (empty($result)){
            return "<label class = 'text-danger'> The provided Student Number does not exist $student_id <label>";
        }
        else {
        return "<label>Student Details</label></br>
                Student Number : ".$result['student_id']."</br>
                Name : ". $result['full_Name']."</br>
                Email : ". $result['email']."</br>
                Phone Number : ".$result['phone_number']."</br>
                Home Address : ".$result['home_address']."";   
        }
    } 
    catch (Exception $e){
        echo '<script language="javascript">';
        echo 'alert("An error occurred white collecting results! Please try again :-)");';
        echo '</script>';
        $conn_msg = $e->getMessage();
    } 	 	 
}


?>