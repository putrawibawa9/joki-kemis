<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f3f3;
        }
        .container {
            width: 350px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form {
            display: none;
        }
        .form.active {
            display: block;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .toggle {
            text-align: center;
            margin-top: 15px;
        }
        .toggle a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .toggle a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="registerForm" class="form active">
            <form action="register.php" method="POST">
            <h2>Register</h2>
            <div class="form-group">
                <label for="registerUsername">Username</label>
                <input name="username" type="text" id="registerUsername" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="registerEmail">Email</label>
                <input name="email" type="email" id="registerEmail" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="registerPassword">Password</label>
                <input name="password" type="password" id="registerPassword" placeholder="Enter your password">
            </div>
            <button type="submit" >Register</button>
            <div class="toggle">
                Already have an account? <a href="#" onclick="toggleForms()">Login</a>
            </div>
            </form>
        </div>

        <div id="loginForm" class="form">
            <form action="login.php" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <label for="loginUsername">Username</label>
                <input name="username" type="text" id="loginUsername" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="loginPassword">Password</label>
                <input name="password" type="password" id="loginPassword" placeholder="Enter your password">
            </div>
            <button type="submit">Login</button>
            <div class="toggle">
                Don't have an account? <a href="#" onclick="toggleForms()">Register</a>
            </div>
            </form>
        </div>
    </div>

    <script>
        function toggleForms() {
            const registerForm = document.getElementById('registerForm');
            const loginForm = document.getElementById('loginForm');
            registerForm.classList.toggle('active');
            loginForm.classList.toggle('active');
        }
    </script>
</body>
</html>
