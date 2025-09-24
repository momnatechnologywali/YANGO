<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yango Clone - Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: linear-gradient(90deg, #ff5e62, #f7b733);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        nav {
            background-color: #333;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.1em;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #f7b733;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            flex: 1;
            min-width: 300px;
            text-align: center;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h2 {
            color: #ff5e62;
        }
        .card button {
            background-color: #f7b733;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .card button:hover {
            background-color: #ff5e62;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            nav a {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Yango Clone</h1>
        <p>Your one-stop solution for ride-hailing and parcel delivery</p>
    </header>
    <nav>
        <a href="#" onclick="navigate('index.php')">Home</a>
        <a href="#" onclick="navigate('signup.php')">Sign Up</a>
        <a href="#" onclick="navigate('login.php')">Login</a>
        <a href="#" onclick="navigate('ride.php')">Book Ride</a>
        <a href="#" onclick="navigate('delivery.php')">Parcel Delivery</a>
        <a href="#" onclick="navigate('driver.php')">Driver Portal</a>
        <a href="#" onclick="navigate('payment.php')">Payment</a>
    </nav>
    <div class="container">
        <div class="card">
            <h2>Ride-Hailing</h2>
            <p>Book a ride to your destination with ease and track your driver in real-time.</p>
            <button onclick="navigate('ride.php')">Book Now</button>
        </div>
        <div class="card">
            <h2>Parcel Delivery</h2>
            <p>Send packages quickly and reliably with our delivery service.</p>
            <button onclick="navigate('delivery.php')">Send Parcel</button>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Yango Clone. All rights reserved.</p>
    </footer>
    <script>
        function navigate(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
