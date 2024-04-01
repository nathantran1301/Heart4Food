<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        header {
            position: absolute;
            font-size:30px;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        header img {
            width: 200px; /* Adjust the width as needed */
            height: auto; /* Automatically adjust height to maintain aspect ratio */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        #content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            position: relative;
        }

        #left-container,
        #right-container {
            width: 200px;
            height: 200px;
            margin: 0 20px;
            border: 1px solid #ccc;
            background-color: #fff; /* Add background color to make containers visible */
        }

        #left-container img,
        #right-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintain aspect ratio and fill container */
        }

        h2 {
            color: #300ACC;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #300ACC;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #300ACC;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4800a7;
        }
    </style>
</head>
<body>
    <header>
    <h1>Heart4Food</h1>
    </header>
    <div id="content-wrapper">
        <div id="left-container">
            <img src="images/HeartFood.png" alt="Left Image">       
            </div>
        <form action="login_handle.php" method="post">
            <fieldset>
                <legend>Login</legend>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" size="40" maxlength="20"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" size="40" maxlength="20"><br>
                <input type="submit" name="submit" value="Login">
            </fieldset>
        </form>
        <div id="right-container">
            <img src="images/HeartFood.png" alt="Right Image">
        </div>
    </div>
</body>
</html>

</html>

