<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart4Food</title>
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
            background-color: #ffdab9;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }


        header img {
            width: 300px;
            height: auto;
        }
        
          header a img { /* home icon image */
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

        main {
            padding: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            justify-content: space-around; /* Distribute items evenly */
            align-items: flex-start; /* Align items to the top */
            margin-bottom: 20px; /* Add space between container and footer */
        }
        
        .product-container {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    padding: 20px;
    margin-bottom: 20px;
    width: 30%; /* Set the width of each container */
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    flex: 1; /* Make each container grow to fill available space */
    margin-right: 20px; /* Add spacing between containers */
    max-width: 30%; /* Maximum width of each container */
}

        footer {
            background-color: #ffdab9;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
        
        /* CSS styles for the search form */
    .search-form {
        display: flex;
        align-items: center;
    }

    .search-container {
        display: flex;
        justify-content: center; /* Center horizontally */
        margin-bottom: 20px; /* Add some space below the search bar */
    }

    .search-input {
        width: 300px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    .search-button {
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-button:hover {
        background-color: #0056b3;
    }

        
    /* Styles for the product containers */
    .product-container {
        background-color: #ffffff;
        border: 1px solid #dddddd;
        padding: 20px;
        margin-bottom: 20px;
        width: 30%; /* Set the width of each container */
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        flex: 0 0 calc(30% - 40px); /* Flexible width calculation */
        margin-right: 20px; /* Add spacing between containers */
        }

    .product {
        display: flex;
        flex-direction: column;
        align-items: center;
        }

    .product img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        }

    .product-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        }

    .product-description {
        font-size: 16px;
        margin-bottom: 10px;
        }

    .product-price {
        font-size: 18px;
        font-weight: bold;
        color: #28a745; /* Green color for price */
        }
        
      .product-inventory {
            font-size: 20px;
            color: #28a745; /* Dark gray color for inventory */
        }
    
    
    /* ChatGPT Interface */
    
    .chatbot-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        height: 400px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        display: none; /* Initially hidden */
        z-index: 9998;
    }
    
    .chatbot-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }
    
    .chatbot-messages { 
        
    }
    
    .chatbot-button {
        
    }
    
    
    
        </style>
</head>
<body>
    <header>
    <div style="display: flex; justify-content: flex-end;">
        <a href="landing_page.php"><img src="images/home-removebg-preview.png" alt="Home"></a>
    </div>
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
    <div class="search-container">
    <form method="GET" action="marketplace.php" class="search-form">
        <input type="text" name="search_query" class="search-input" placeholder="Search for products...">
        <button type="submit" class="search-button">Search</button>
    </form>
</div>   
    <div class="container">
    <?php
        include('mysqli_connect.php'); // Connect to the database

        // Query to retrieve all products
        $query = "SELECT * FROM groceries";
        $result = mysqli_query($dbc, $query);
        
    // Check if the search query is set
    if(isset($_GET['search_query'])) {
    // Sanitize the user input to prevent SQL injection
        $search_query = mysqli_real_escape_string($dbc, $_GET['search_query']);
    
    // Query to retrieve products matching the search query
    $query = "SELECT * FROM groceries WHERE grocery_name LIKE '%$search_query%' OR description LIKE '%$search_query%'";
    $result = mysqli_query($dbc, $query);

    // Check if there are any matching products
    if(mysqli_num_rows($result) > 0) {
        // Start the container for products
        echo '<div class="container">';

        // Loop through each row in the result set
        while($row = mysqli_fetch_assoc($result)) {
            // Start a product container
            echo '<div class="product-container">';
            echo '<div class="product">';
            if (file_exists('images/' . $row['image_url'])) {
                echo '<img src="images/' . $row['image_url'] . '" alt="' . $row['grocery_name'] . '">';
            } else {
                echo '<img src="images/default.jpg" alt="Default Image">';
            }
            echo '<h2 class="product-title">' . $row['grocery_name'] . '</h2>';
            echo '<p class="product-origin">Origin: ' . $row['origin'] . '</p>';
            echo '<p class="product-price">$' . $row['price'] . '</p>';
            echo '<p class="product-description">' . $row['description'] . '</p>';
            // End the product container
            echo '</div>';
            echo '</div>';
        }
        // End the container for products
        echo '</div>';
    } else {
        // If no matching products are found, display a message
        echo '<p>No products found</p>';
    }
} else {
    // If no search query is provided, display all products
    // Query to retrieve all products
    $query = "SELECT * FROM groceries";
    $result = mysqli_query($dbc, $query);

    // Check if there are any products
    if(mysqli_num_rows($result) > 0) {
        // Start the container for products
        echo '<div class="container">';

        // Loop through each row in the result set
        while($row = mysqli_fetch_assoc($result)) {
            // Start a product container
            echo '<div class="product-container">';
            echo '<div class="product">';
            if (file_exists('images/' . $row['image_url'])) {
                echo '<img src="images/' . $row['image_url'] . '" alt="' . $row['grocery_name'] . '">';
            } else {
                echo '<img src="images/default.jpg" alt="Default Image">';
            }
            echo '<h2 class="product-title">' . $row['grocery_name'] . '</h2>';
            echo '<p class="product-origin">Origin: ' . $row['origin'] . '</p>';
            echo '<p class="product-price">$' . $row['price'] . '</p>';
            echo '<p class="product-description">' . $row['description'] . '</p>';
            echo '<p class="product-inventory">Inventory: ' . $row['Inventory'] . '</p>';

            
            // End the product container
            echo '</div>';
            echo '</div>';
        }
        // End the container for products
        echo '</div>';
    } else {
        // If there are no products, display a message
        echo '<p>No products found</p>';
    }
}
?>       

<div class="chatbot-container" id="chatbotContainer">
    <div class="chatbot-header" onclick="toggleChatbot()">Chatbot</div>
    <div class="chatbot-messages" id="chatbotMessages">
        <!-- Chatbot messages will be displayed here -->
    </div>
    <input type="text" class="chatbot-input" id="userInput" placeholder="Type your message..." onkeypress="handleKeyPress(event)">
</div>

    </main>
    
<script>
    // Function to toggle the chatbot container visibility
    function toggleChatbot() {
        var chatbotContainer = document.getElementById('chatbotContainer');
        var chatbotMessages = document.getElementById('chatbotMessages');

        if (chatbotContainer.style.height === '400px') {
            // Minimize chatbot container
            chatbotContainer.style.height = '40px';
            chatbotMessages.style.display = 'none';
        } else {
            // Maximize chatbot container
            chatbotContainer.style.height = '400px';
            chatbotMessages.style.display = 'block';
        }
    }
    
    
    
    
    
    
    
</script>

    <footer>
        <p>&copy; 2024 Food4Hearts. All rights reserved.</p>
    </footer>
</body>
</html>
