<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '12345';
$DATABASE_NAME = 'restaurant_project';


$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >0) {
    $user = $result->fetch_assoc(); 
    if ($password === $user['password']) {  
        session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		echo 'Welcome back, ' . htmlspecialchars($_SESSION['name'], ENT_QUOTES) . '!';
        echo json_encode(array("status" => "ok", "message" => "Login successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Incorrect password!"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Email not found or more than one user exists."));
}

$stmt->close();
$con->close();




// session_start();
// include 'connection.php';

// $email = $_POST['email'];
// // $password = md5($_POST['password']);
// $password = $_POST['password']; // Encrypting for security

// $query = "SELECT * FROM user WHERE email = ? AND password = ?"; // query for id and password input
// $stmt = $conn->prepare($query);
// $stmt->bind_param('ss', $email, $password); // helps protecting against sql injection
// $stmt->execute();
// $result = $stmt->get_result();


// if ($result->num_rows === 1) {
//     $user = $result->fetch_assoc(); 
//     if (password_verify($password, $user['password'])) {
//         echo json_encode(array("status" => "ok", "message" => "Login successful!"));
//     } else {
//         echo json_encode(array("status" => "error", "message" => "Incorrect password!"));
//     }
// } else {
//     echo json_encode(array("status" => "error", "message" => "Email not found or more than one user exists."));
// }

// if ($result->num_rows === 1) { // checks if the datatype and value matches or not
//     $user = $result->fetch_assoc(); // stores the result row as an associative array
//     $_SESSION['user_id'] = $user['user_id'];
//     $_SESSION['role'] = $user['role'];

//     // Redirect based on role
//     switch ($user['role']) {
//         case 'admin':
//             header('Location: /admin_dashboard.html');
//             break;
//         case 'restaurant_rep':
//             header('Location: ../html/restaurant_dashboard.html');
//             break;
//         case 'end_user':
//             header('Location: ../html/user_dashboard.html');
//             break;
//     }
// } else {
//     echo "Invalid email or password.";
// }



?>




