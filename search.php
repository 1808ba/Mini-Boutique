<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <style>
        /* here--> */
        *{
  font-family: "Poppins", sans-serif;

        }
        .search1 {
            justify-content: center;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .input-search {
            outline: none;
            border-radius: 10px;
            width: 30%;
            height: 50px;
            background-color: #55c1f7;
            color: #000;
            border: none;
        }

        .input-search:focus {
            border: 2px solid #9BA986;

        }

        .submit-search {
            border-radius: 10px;
            width: 100px;
            height: 50px;
            border: none;
            background-color: #55c1f7;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-search:hover {
            background-color: #808969;
        }

        /* Styles pour le filtre */
        .filter-form {
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .filter-form select,
        .filter-form input[type="number"] {
            margin-right: 10px;
        }

        .filter-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .links_bold{
            text-decoration:none;
            font-weight:bold;
            /* padding: 0.5rem 1rem; */
            border: 2px solid transparent;
            text-decoration: none;
            font-weight: 600;
            color: var(--text-dark);
            transition: 0.3s;
            text-align: center;
            margin-left: 50%;
            margin-right: 50%;
            font-size: 25px;
        }
        
.linkss .links_bold:hover {
  border-top-color: #ca8a04;;
  border-bottom-color: #ca8a04;;
  color: #ca8a04;;
}
    </style>
    <title>search</title>
</head>
<body>
    <nav class="nav_links">
        <div class="container_nav">
            <!-- logo -->
            <div class="tt" id="logo--text">
                <h4>Mitchell</h4>
            </div>
            <!-- links -->
            <div class="linkss" id="linkss">
                <a href="main.php" class="links_bold">Home</a>
            </div>

            <!-- icon links -->
            <div class="last_links_icon">
                <!-- icon favourite product -->
                <a href="#" id="linkLast"><img src="picture/heart.svg" alt="" /></a>
                <!-- icon panier -->
                <a href="#" id="linkLast"><img src="picture/shopping cart.svg" alt="" /></a>
            </div>
        </div>
        </div>
        <hr class="hr1">
    </nav>

        <form action="search.php" method="get">
            <div class="search1">
                <input class="input-search" type="text" name="q" placeholder="Rechercher un produit...">
                <input class="submit-search" type="submit" value="Rechercher">
            </div>
        </form>
    <!-- filter -->
    
       
    </body>

</html>


<?php
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $searchTerm = $_GET['q'];

    $file = 'products.csv';
    $products = [];

    if (($handle = fopen($file, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            if (stripos($data[1], $searchTerm) !== false) {
                $products[] = $data;
            }
        }
        fclose($handle);
    }
    if (!empty($products)) {
        echo '<ul>';
        foreach ($products as $product) {
             
            $image=htmlspecialchars($product[0]);
            $title=htmlspecialchars($product[1]);
            $desc=htmlspecialchars($product[2]);
            $category=htmlspecialchars($product[3]);
            $price=htmlspecialchars($product[4]);
    
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
        echo '</ul>';
    } else {
        echo 'Aucun produit trouvé.';
    }
}
?>

</body>

</html>