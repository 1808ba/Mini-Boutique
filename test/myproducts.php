<?php
// Function to display product card
function displayProductPref($row){
    $image = htmlspecialchars($row[0]);
    $title = htmlspecialchars($row[1]);
    $desc = htmlspecialchars($row[2]);
    $category = htmlspecialchars($row[3]);
    $price = htmlspecialchars($row[4]);

    echo "<div class='full-card'>";
    echo "<div class='img-div'>";
    echo "<img src='$image' alt='' class='postImage'/>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h2 class='postTitle'>$title $price</h2>";
    echo "<p class='postBody'>$desc</p>";
    echo "<div>";
    echo "<a href='#' class='read-more'>Read more <span class='sr-only'></span></a>";
    echo "<button class='cardBtn edit btnStyle'></button>";
    echo "<button class='cardBtn deleteBtn btnStyle'></button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

session_start();
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: loginForm.php");
    exit;
}

$filePath1 = 'testfile.csv';
$file1 = fopen($filePath1, 'r');

$usersFile = 'users.csv';
$users = fopen($usersFile, 'r');
$checkboxValues = []; // Array to store user's preferences

// Get user's preferences
while (($row = fgetcsv($users)) !== false) {
    if ($row[0] === $_SESSION['username']) {
        $checkboxValues = explode(",", $row[3]);
        break;
    }
}
fclose($users);

// Display products based on user's preferences
if ($file1 !== false) {
    while (($row1 = fgetcsv($file1)) !== false) {
        $categories = explode(",", $row1[3]);
        foreach ($categories as $category) {
            if (in_array($category, $checkboxValues)) {
                displayProductPref($row1);
                break; // Move to the next product
            }
        }
    }
    fclose($file1);
} else {
    echo "Failed to open file: $filePath1";
}
?>
