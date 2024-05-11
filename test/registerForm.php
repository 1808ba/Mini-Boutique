<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
    <form action="saveData.php" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
        <label>Category:</label><br>
        <input type="checkbox" id="category1" name="category1" value="dressCat">
        <label for="category1">Dresses</label><br>
        <input type="checkbox" id="category2" name="category2" value="pantsCat">
        <label for="category2">Pants</label><br>
        <input type="checkbox" id="category3" name="category3" value="pcCat">
        <label for="category3">Laptops</label><br><br>
     </div>
    
     <button type="submit">Register</button>
    </form>
</body>
</html>
