<?php
session_start();
require_once 'db.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $role = $_POST['role'];
 
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $phone, $role);
 
    if ($stmt->execute()) {
        $_SESSION['message'] = "Sign-up successful! Please login.";
        header("Location: login.php");
        exit();
    } else {
        $error = "Error: Email already exists or database issue.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yango Clone - Sign Up</title>
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
        .signup-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .signup-container h2 {
            color: #ff5e62;
            margin-bottom: 20px;
        }
        .signup-container input, .signup-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .signup-container button {
            background-color: #f7b733;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .signup-container button:hover {
            background-color: #ff5e62;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        @media (max-width: 768px) {
            .signup-container {
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form id="signupForm" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <select name="role" required>
                <option value="user">User</option>
                <option value="driver">Driver</option>
            </select>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="#" onclick="navigate('login.php')">Login</a></p>
        </form>
        <p id="error" class="error"><?php echo isset($error) ? $error : ''; ?></p>
    </div>
    <script>
        function navigate(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
