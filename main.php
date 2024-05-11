<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
    rel="stylesheet"
  />
 
    <link rel="stylesheet" href="styles/index.css" />
</head>
<body style="background-color: #fff;">

    <nav>
        <div class="nav__content">
          <div class="logo"><a href="#">Mitchell</a></div>
          <label for="check" class="checkbox">
            <i class="ri-menu-line"></i>
          </label>
          <input type="checkbox" name="check" id="check" />
          <ul>
            <li><a href="#">Home</a></li>

            <li><a href="test/myproducts.php">my products</a></li>
            <li><a href="test/registerForm.php">register</a></li>
            <li><a href="test/loginForm.php">login</a></li>

  
          </ul>
          <form method="GET" action="">
                    <div id="form1">
                      <!-- <input type="search" name="search" id="search_input" placeholder="Search by Title" /> -->
                      <a class="btnSearch" href="search.php">Search</a>
                    </div>
                  </form>
        </div>
      </nav> 
      <!-- <h1>hello</h1> -->

      
      <div class="containerPage" >
        <div class="cards-section">

        <?php include("products.php"); ?>


        </div> 
      </div>  

    
</body>
</html>