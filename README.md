# Mini-Boutique
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display CSV Data with Images</title>
</head>
<body>

<h1>CSV Data with Images</h1>
    
<?php
$filePath = 'testfile.csv';
$file = fopen($filePath, 'r');
$test =true;
$categories=['dressCat'];


if ($file === false) {
    echo "Failed to open file: $filePath";
} else {
    echo "<table border='1'>";
    while (($row = fgetcsv($file)) !== false) {
        if($test){
            // display column headers as the first row
            echo "<thead>";
            echo "<tr>";

            foreach ($row as $value) {
                echo "<th>".$value."</th>";
            }
            echo "</tr>";

            echo "</thead>\n";
            $test=false;
            continue;
        }
        echo "<tr>";
        // echo json_encode($row[3]);
        // if($row[3] === $categories[0]){
        
            foreach ($row as $index => $cell ) {
           
                if ($index === 0 && !empty($cell)) { // Assuming the image URL is in the 4th column (index 3)
                    echo "<td><img src='" . htmlspecialchars($cell) . "' alt='Image'></td>";
                } else {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
            // }
        }
       
        echo "</tr>";
    }
    echo "</table>";
    fclose($file);
}
?>

</body>
</html>

