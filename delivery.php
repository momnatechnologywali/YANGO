<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yango Clone - Parcel Delivery</title>
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
        .delivery-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .delivery-container input, .delivery-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .delivery-container button {
            background-color: #f7b733;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .delivery-container button:hover {
            background-color: #ff5e62;
        }
        #map {
            height: 300px;
            margin: 20px 0;
            background: #e0e0e0;
            border-radius: 5px;
        }
        #fare {
            font-size: 1.2em;
            color: #ff5e62;
        }
        @media (max-width: 768px) {
            .delivery-container {
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Parcel Delivery</h1>
    </header>
    <div class="delivery-container">
        <form id="deliveryForm" action="book_delivery.php" method="POST">
            <input type="text" name="pickup" placeholder="Pickup Location" required>
            <input type="text" name="dropoff" placeholder="Drop-off Location" required>
            <textarea name="package_details" placeholder="Package Details" required></textarea>
            <p id="fare">Estimated Fare: Calculating...</p>
            <button type="submit">Book Delivery</button>
        </form>
        <div id="map">Map Placeholder (Tracking)</div>
        <p id="tracking">Waiting for courier...</p>
    </div>
    <script>
        function calculateFare() {
            const pickup = document.querySelector('input[name="pickup"]').value;
            const dropoff = document.querySelector('input[name="dropoff"]').value;
            if (pickup && dropoff) {
                const distance = Math.random() * 10 + 1; // Simulated distance
                const fare = (distance * 1.5).toFixed(2);
                document.getElementById('fare').textContent = `Estimated Fare: $${fare}`;
            }
        }
        function trackDelivery() {
            let progress = 0;
            const tracking = document.getElementById('tracking');
            const interval = setInterval(() => {
                progress += 10;
                tracking.textContent = `Courier is ${progress}% on the way...`;
                if (progress >= 100) {
                    tracking.textContent = 'Package delivered!';
                    clearInterval(interval);
                }
            }, 1000);
        }
        document.getElementById('deliveryForm').addEventListener('submit', () => {
            trackDelivery();
        });
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', calculateFare);
        });
    </script>
</body>
</html>
