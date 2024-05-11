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
$categories=['dressCat','pcCat','pantsCat'];


if ($file === false) {
    echo "Failed to open file: $filePath";
} else {
    echo "<table border='1'>";
    while (($row = fgetcsv($file)) !== false) {
        if($test){
            // display column headers as the first row
           
            $test=false;
            continue;
        }
        echo "\t".$row[3];
        echo json_encode($row[3]);
        foreach($categories as $category){
            if($row[3] === $category){
        
                foreach ($row as $index => $cell ) {
               
                    if ($index === 0 && !empty($cell)) { // Assuming the image URL is in the 4th column (index 3)
                        echo "<td><img src='" . htmlspecialchars($cell) . "' alt='Image'></td>";
                    } else {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                }
            }
        }
       
       
        echo "</tr>";
    }
    echo "</table>";
    fclose($file);
}
?>

</body>
</html>

