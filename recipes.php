<?php
// Retrieve posts from the database
$sql = "SELECT * FROM create_post";
$db_host = "localhost";
$db_username = "infost490s2402";
$db_password = "Ch@ngeM3now!";
$db_name = "infost490s2402_heartfood";
// Establishing a connection to the database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
$result = mysqli_query($conn,$sql); // Execute the query and store the result

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $recipe = isset($_POST["recipe"]) ? $_POST["recipe"] : "";
    $ingredients = isset($_POST["ingredients"]) ? $_POST["ingredients"] : "";
    $equipment = isset($_POST["equipment"]) ? $_POST["equipment"] : "";
    $image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : ""; // Assuming you're storing the image file locally
}
?>
<!DOCTYPE html>
<html lang="en">
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
            background-color: #ffdab9;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        
          header a img {
            width: 30px; /* Adjust size as needed */
            height: auto; /* Maintain aspect ratio */
        }
        
         /* CSS styles for the main content */
        main {
          
        }
        
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
        
        .container {
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            justify-content: space-around; /* Distribute items evenly */
            align-items: flex-start; /* Align items to the top */
            margin-bottom: 20px; /* Add space between container and footer */
        }
        
        .button-container {
            color: #ffdab9;
            display: flex;
            padding: 20px;
            font-size: 25px;
            justify-content: flex-end; /* Align items to the right */
            margin-bottom: 40px; /* Add space below the button */
        }

         /* Styles for the post-container */
        .post-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Responsive grid */
            gap: 20px; /* Gap between posts */
            padding: 20px; /* Padding around posts */
        }

        .post {
            background-color: #fff; /* Post background color */
            padding: 20px; /* Padding inside the post */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .post h2 {
            margin-top: 0; /* Remove default margin */
        }

        .post p {
            margin-bottom: 10px; /* Add space between paragraphs */
        }
        
        /* Style the images within posts */
    .post img {
        max-width: 100%; /* Ensure images don't exceed the width of their container */
        height: auto; /* Maintain aspect ratio */
        display: block; /* Prevents images from being affected by vertical-align */
        border-radius: 5px; /* Optional: Add rounded corners to images */
}
        
    </style>    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <header>
        <div style="display: flex; justify-content: flex-end;">
        <a href="landing_page.php"><img src="images/home-removebg-preview.png" alt="Home"></a></div></header>
    
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
    <div class="button-container">
        <button onclick="location.href='create_post.php';">Create Post</button>
    </div>  
    <div class="post-container">
    <?php
    // Display each post
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='post'>";
    echo "<h2>Title: " . $row['title'] . "</h2>";
    echo "<p>Recipe:" . $row['recipe'] . "</p>";
    echo "<p>Ingredients:" . $row['ingredients'] . "</p>";
    echo "<p>Equipment:" . $row['equipment'] . "</p>";

    // Display image if available
    if (!empty($row['image'])) {
        echo "<img src='images/" . $row['image'] . "' alt='Image'>";
        }   
    echo "</div>";
    }
?>
    </div>
        
    </main>
</html>
