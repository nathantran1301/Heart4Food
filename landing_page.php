<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food4Hearts</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            position: relative; /* Make body a positioning context */
        }

        header {
            background-color: #FFFFFF;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        header .placeholder-image {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin-bottom: 20px; /* Add space below the logo */
        }

        header img {
            width: 300px;
            height: auto;
        }
        
        footer {
            background-color: #ffdab9;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
        
    /* ----------------------Header/Footer Section---------------------- */ 
        
        
    /* ----------------------Login Button may be taken out---------------------- */ 

        .login-button {
            position: absolute;
            top: 20px; /* Adjust the top position */
            right: 20px; /* Adjust the right position */
            background-color: #007bff; /* Blue color for button */
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
        
        /*------------------------------------------------------------------ */
        
        /*-----------------------Navigation Bar----------------------------- */
        nav {
            background-color: #ffdab9;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox */
            justify-content: space-evenly; /* Evenly distribute items */
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #f8f9fa; /* Change color on hover */
        }

         .welcome-message {
           position: absolute;
           color:#ffdab9;
           top: 20px; /* Adjust the top position */
           right: 20px; /* Adjust the right position */
           font-weight: bold; /* Bold text */
           font-size: 40px; /* Larger font size */
        }

       /*--------------------- Containers------------------------------ */
      .video-photo-container {
        display: flex; /* Use flexbox */
        }

        .video-container,
    .photo-container {
        flex: 1; /* Each container takes up equal space */
        padding: 10px;
        }

        .video-container video,
    .photo-container img {
        width: 100%; /* Make the video and photo fill their containers */
        height: 100%; /* Fill the entire height of the container */
        object-fit: cover; /* Maintain aspect ratio and cover the container */
    }
        
        .container {
            display: flex;
            flex-direction: column;
            width: 80%;
            font-size: 20px;
            align-items: center; /* Center items horizontally */
            margin-bottom: 20px; /* Add space between container and footer */
           
        }
        
        .mid-container {
            display: flex;
            justify-content: space-around; /* Evenly distribute columns */
            margin-bottom: 30px;
        }
        
        .column {
            text-align: center;
        }

        .column img {
            width: 100%;
            border:5px solid #ffdab9;
            max-width: 300px; /* Adjust as needed */
            height: auto;
            margin-bottom: 10px;
        }
        
         .container-contact {
            display:flex;
            padding: 30px;
            flex-direction: row;
            flex-wrap: wrap; /* Allow wrapping to form columns */
            justify-content: center; /* Center items horizontally */
        }
        
        .profile-container {
            margin-top: 20px;
            text-align: center;
        }

        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Make the image round */
            padding: 60px;
        }

        .profile-container p {
            margin-top: 10px;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
    <header>
        <div class="placeholder-image">
            <!-- Placeholder for logo -->
            <img src="images/HeartFood.png" alt="placeholder image">
        </div>
        <?php 
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<span class='welcome-message'>Welcome <span style='font-size: 40px;'>$username</span>!</span>";
            } else {
                echo "<button class='login-button' onclick=\"window.location.href = 'login.php';\">Login</button>";
            }
        ?>
    </header>

    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="connect.php">What's Near Me</a></li>
            <li><a href="marketplace.php">Marketplace</a></li>
            <li><a href="recipes.php">Recipes</a></li>
            <!-- Dropdown menu on each tabs? -->
        </ul>
    </nav>
    
    <main>
        <!-- Main body of website -->
        <div class="video-photo-container">
        <div class="video-container">
            <video autoplay muted loop>
                <source src="videos/video.mp4" type="video/mp4">
            </video>
        </div>
        <div class="photo-container">
            <!-- Photo content -->
            <img src="images/photo.jpg" alt="Landing_photo">
        </div>
    </div>
        <h2> The Goal</h2>
        
        <div class="container">
            <div class="description">
                <p>At Heart4Food, our goal is to bridge cultures through the universal language of food. We aim to celebrate the rich tapestry of global cuisines, inviting individuals from all backgrounds to embark on a flavorful journey of discovery.</p>
                <p>Through our platform, we strive to showcase the diverse culinary traditions, recipes, and cooking techniques that define cultures around the world. Whether you're a seasoned chef or a kitchen novice, our community offers a welcoming space to explore new flavors, learn authentic cooking methods, and connect with like-minded food enthusiasts.Join our community and embark on a delicious journey of exploration and discovery!</p>
            </div>
        </div>
        
        <h2>  Why Us? </h2>
    <div class="mid-container">
        <div class="column">
            <img src="images/cooking_together2.jpg" alt="Image 1">
            <p>Connect With Your Community</p>
        </div>
        <div class="column">
            <img src="images/food_together.jpg" alt="Image 2">
            <p>Expand your Culinary Pallet</p>
        </div>
        <div class="column">
            <img src="images/online_shopping2.jpg" alt="Image 3">
            
            <p>Commited to Provide Authentic & Quality Goods</p>
        </div>
    </div>
        
        <h2>About Us </h2>
    <div class="container">
            <p> At Food4Hearts, we are passionate about the culinary arts and the stories they tell. Our journey began with a simple idea: to create a space where food lovers from all walks of life could come together to celebrate their shared love for delicious cuisine.</p>
                <p> With a team of dedicated professionals and enthusiasts, we curate a diverse collection of recipes, cooking tips, and cultural insights from around the globe. From traditional family recipes passed down through generations to innovative fusion creations, our platform offers a rich tapestry of culinary experiences.</p>
                
         <h2>Contact Us </h2>
    </div>
       
        
        <!-- Four containers for profile pictures -->
            <div class="container-contact">
                <div class="profile-container">
                    <img src="images/Tran.png" alt="Tran Profile">
                    <p>Nathan | Hacker </p>
                </div>
                <div class="profile-container">
                    <img src="images/Adrian.png" alt="Adrian Picture 2">
                    <p>Adrian | Handler</p>
                </div>
                <div class="profile-container">
                    <img src="images/profile3.jpg" alt="Profile Picture 3">
                    <p>Name </p>
                </div>
                <div class="profile-container">
                    <img src="images/profile4.jpg" alt="Profile Picture 4">
                    <p> Name </p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Heart4Food. All rights reserved.</p>
    </footer>
</body>
</html>

