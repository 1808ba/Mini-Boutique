<?php
//  include("../includes/products.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Retrieve checkbox values and serialize them
    $checkboxValues = array();
    if(isset($_POST["category1"])) 
    $checkboxValues[] = $_POST["category1"];

    if(isset($_POST["category2"])) 
    $checkboxValues[] = $_POST["category2"];

    if(isset($_POST["category3"])) 
    $checkboxValues[] = $_POST["category3"];

     $checkboxData = implode(",", $checkboxValues);
     
    // CSV file path
    $filePath = 'users.csv';

    // Append data to CSV file
    $file = fopen($filePath, 'a');
    if ($file === false) {
        echo "Failed to open file: $filePath";
    } else {
        // Write data to CSV file
        fputcsv($file, array($name, $email, $password, $checkboxData));
        fclose($file);

        // echo $checkboxValues[1];

     
        echo "<div style='text-align: center;margin-top:20%;'>";
        echo "<h2 style='color: #007bff;'>Data saved successfully</h2><br>";
        echo "<a href='loginForm.php' style='text-decoration:none; background-color: #007bff; border: none; color: white; padding: 10px 20px; text-align: center; display: inline-block; font-size: 16px; margin-top: 20px; cursor: pointer; border-radius: 5px;'>Login</a>";
        echo "</div>";
        
        
    }
}


    
?>
