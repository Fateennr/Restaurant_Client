<?php
// Start the session
// session_start();

// // Include necessary files and database connection
// include('db_connection.php'); // Your database connection file

// // Initialize variables
// $totalAdmins = 0;
// $totalRestaurants = 0;
// $totalPosts = 0;
// $totalRequests = 0;

// Fetch data from the database
// $query = "SELECT COUNT(*) as count FROM admins";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
// $totalAdmins = $row['count'];

// $query = "SELECT COUNT(*) as count FROM restaurants";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
// $totalRestaurants = $row['count'];

// $query = "SELECT COUNT(*) as count FROM posts";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
// $totalPosts = $row['count'];

// $query = "SELECT COUNT(*) as count FROM requests";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
// $totalRequests = $row['count'];
?>

<?php
// Start the session
session_start();

// Check if the user is logged in by checking the session
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}
?>
