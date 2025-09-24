<?php
session_start();
require_once 'db.php';
 
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'driver') {
    header("Location: login.php");
    exit();
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];
    $driver_id = $_SESSION['user_id'];
 
    $stmt = $conn->prepare("UPDATE bookings SET driver_id = ?, status = 'accepted' WHERE id = ? AND driver_id IS NULL");
    $stmt->bind_param("ii", $driver_id, $booking_id);
 
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $_SESSION['message'] = "Request accepted successfully!";
        header("Location: driver.php");
        exit();
    } else {
        $error = "Error accepting request or already taken.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yango Clone - Accept Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f4f4f9, #e0e0e0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            text-align: center;
        }
        .message-container p {
            color: <?php echo isset($error) ? 'red' : 'green'; ?>;
            font-size: 1.2em;
        }
        .message-container a {
            color: #f7b733;
            text-decoration: none;
        }
        .message-container a:hover {
            color: #ff5e62;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <p><?php echo isset($error) ? $error : $_SESSION['message']; ?></p>
        <p><a href="#" onclick="navigate('driver.php')">Return to Driver Portal</a></p>
    </div>
    <script>
        function navigate(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
