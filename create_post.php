<?php
ob_start(); // Start output buffering

$dbc = mysqli_connect('localhost', 'infost490s2402', 'Ch@ngeM3now!', 'infost490s2402_heartfood');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $recipe = isset($_POST["recipe"]) ? $_POST["recipe"] : "";
    $ingredients = isset($_POST["ingredients"]) ? $_POST["ingredients"] : "";
    $equipment = isset($_POST["equipment"]) ? $_POST["equipment"] : "";

    // Check if image is uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $image = $_FILES["image"]["name"];
        $imagePath = 'images/' . $image;
        
        // Move uploaded image to designated folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            // Insert form data into the database
            $sql = "INSERT INTO create_post (title, recipe, ingredients, equipment, image) 
                    VALUES ('$title', '$recipe', '$ingredients', '$equipment', '$image')";
            
            if (mysqli_query($dbc, $sql)) {
                echo $title . " has been added to the database"; // Optional success message
                header("Location: recipes.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
            }
        } else {
            echo "Error uploading image."; // Error message if image upload fails
        }
    } else {
        echo "Image upload failed or no image selected."; // Error message if no image uploaded or upload failed
    }
}

ob_end_flush(); // Flush output buffer
?>



<!DOCTYPE html>
<html lang="en">
<style>
      h1 {
            text-align: center;
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
            padding: 20px;
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            justify-content: space-around; /* Distribute items evenly */
            align-items: flex-start; /* Align items to the top */
            margin-bottom: 20px; /* Add space between container and footer */
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
            width: 170px;
            height: 300px;
            margin: 0 20px;
            border: 3px solid #ffdab9;
            background-color: #fff; /* Add background color to make containers visible */
        }

        #left-container img,
        #right-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintain aspect ratio and fill container */
        }
        
        
         footer {
            background-color: #ffdab9;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
    
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
        <button onclick="window.location.href = 'recipes.php';">Back</button>
        </div>
        <div>
        <a href="landing_page.php"><img src="images/home-removebg-preview.png" alt="Home"></a>
        </div>
    </div>
    </header>
    
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="connect.php">Connect</a></li>
            <li><a href="marketplace.php">Marketplace</a></li>
            <li><a href="recipes.php">Recipes</a></li>
            <!-- Dropdown menu on each tabs? -->
        </ul>
    </nav>
    
    <main>
        <!-- Could not implement video input as max file size is 8MB for the CPANEL Database -->
    <h1> Create Post</h1>    
    <div id="content-wrapper">
        <div id="left-container">
<video width="100%" height="100%" autoplay muted loop>
            <source src="videos/scrolling.mp4" type="video/mp4">
            </div>
        <div class="container">
            <form action="create_post.php" method="post" enctype="multipart/form-data"">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br><br>
                
                
                <label for="recipe">Recipe:</label><br>
                <textarea id="recipe" name="recipe" rows="10" cols="50" required></textarea><br><br>

                <label for="ingredients">Ingredients:</label><br>
                <textarea id="ingredients" name="ingredients" rows="10" cols="50" required></textarea><br><br>

                <label for="equipment">Equipment:</label><br>
                <textarea id="equipment" name="equipment" rows="10" cols="50" required></textarea><br><br>

                <label for="image">Image URL:</label><br>
                <input type="file" id="image" name="image"><br><br>

                <input type="submit" value="Submit">
            </form>
            
        </div>
        <div id="right-container">
            <video width="100%" height="100%" autoplay muted loop>
            <source src="videos/scrolling.mp4" type="video/mp4">
        </div>
    </main>
    
    <footer>
        <p>&copy; 2024 Food4Hearts. All rights reserved.</p>
    </footer>
</body>
</html>

