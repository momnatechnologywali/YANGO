<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'driver') {
    header("Location: login.php");
    exit();
}
require_once 'db.php';
 
$requests = $conn->query("SELECT * FROM bookings WHERE driver_id IS NULL AND status = 'pending'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yango Clone - Driver Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background: linear-gradient(90deg, #ff5e62, #f7b733);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .driver-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .request {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .request button {
            background-color: #f7b733;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .request button:hover {
            background-color: #ff5e62;
        }
        @media (max-width: 768px) {
            .driver-container {
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Driver Portal</h1>
    </header>
    <div class="driver-container">
        <h2>Available Requests</h2>
        <?php while ($row = $requests->fetch_assoc()): ?>
            <div class="request">
                <p><strong>Type:</strong> <?php echo htmlspecialchars($row['type']); ?></p>
                <p><strong>Pickup:</strong> <?php echo htmlspecialchars($row['pickup']); ?></p>
                <p><strong>Drop-off:</strong> <?php echo htmlspecialchars($row['dropoff']); ?></p>
                <form action="accept_request.php" method="POST">
                    <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Accept</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
    <script>
        function navigate(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
