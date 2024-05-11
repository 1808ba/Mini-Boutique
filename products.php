<?php 
function getProducts(){
$filePath = 'products.csv';
$file = fopen($filePath, 'r');
$test =true;
// $categories=['dressCat'];


if ($file === false) {
    echo "Failed to open file: $filePath";
} else {
   
    while (($row = fgetcsv($file)) !== false) {
        if($test){
           $test=false;
            continue;
        }
            displayProduct($row);
    }
    fclose($file);
}

}
    function displayProduct($row){

        $image=htmlspecialchars($row[0]);
        $title=htmlspecialchars($row[1]);
        $desc=htmlspecialchars($row[2]);
        $category=htmlspecialchars($row[3]);
        $price=htmlspecialchars($row[4]);

        echo "<div class='full-card'>";
        echo "<div class='img-div'>";
        echo "<img src='$image' alt='' class='postImage'/>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h2 class='postTitle'>$title $price</h2>";
        echo "<p class='postBody'>$desc</p>";
        echo "<div>";
        echo "<a href='#' class='read-more'>Read more <span class='sr-only'></span></a>";
        echo "<button class='btnStyle' '>add to card</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";


    }



    getProducts();
?>





