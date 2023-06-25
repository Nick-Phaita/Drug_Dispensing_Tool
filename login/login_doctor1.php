<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Doctor login</h1>

    <form action="/project-drug-dispenser/Drug_Dispensing_Tool/login_doctor.php" method="post">
        <?php
        
        session_start();

        if(isset($_SESSION['else'])){
            echo $_SESSION['else'];
            echo "<br><br>";
        }
        unset($_SESSION['else']);
        ?>
        <label for="SSN">SSN</label>
        <input type="number" name="SSN" id="SSN" required><br><br>
        <label for="dpass">Password</label>
        <input type="text" name="dpass" id="dpass" required> <br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>