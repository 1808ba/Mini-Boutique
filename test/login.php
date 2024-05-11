<?php

function displayProductPref($row){

    $image=htmlspecialchars($row[0]);
    $title=htmlspecialchars($row[1]);
    $desc=htmlspecialchars($row[2]);
    $category=htmlspecialchars($row[3]);
    $price=htmlspecialchars($row[4]);
    echo "Your ";
    echo "<div class='full-card'>";
    echo "<div class='img-div'>";
    echo "<img src='$image' alt='' class='postImage'/>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h2 class='postTitle'>$title $price</h2>";
    echo "<p class='postBody'>$desc</p>";
    echo "<div>";
    echo "<a href='#' class='read-more'>Read more <span class='sr-only'></span></a>";
    echo "<button class='cardBtn edit btnStyle' '></button>";
    echo "<button class='cardBtn deleteBtn btnStyle' '></button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}


$filePath1 = 'testfile.csv';
$file1 = fopen($filePath1, 'r');

$usersFile = 'users.csv';
$users = fopen($usersFile, 'r');
$logStatu=false;
$error_message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    
if ($users === false) {
    echo "Failed to open file: $usersFile";
} else {
    while (($row = fgetcsv($users)) !== false) {
       
    $checkboxValues = explode(",",$row[3]);
       
        if($row[0] === $username && $row[2] === $password ){
           $logStatu=true;

          break;
        
        }else{
            $error_message = "Incorrect username or password. Please try again.";
        }
       
    }
    if($logStatu){
        while (($row1 = fgetcsv($file1)) !== false) {
            $categories = explode(",", $row1[3]);
            foreach ($categories as $category) {
                // Check if the category from CSV matches any of the checkbox values
                foreach ($checkboxValues as $checkbox) {
                    if($category === $checkbox) {
                        displayProductPref($row1);
                        header("location:../main.php");
                        exit;
                        //  echo "hello";

                    }
                }
            }
        }
    }else {
        include 'loginForm.php'; 
    }
    fclose($users);
}

}
fclose($file1);

// If login is successful, hide the login form
// if ($logStatu) {
//     // include '../main.php'; 
//     header("location:../main.php");
//     exit;
// } else {
//     include 'loginForm.php'; 
// }
?>
