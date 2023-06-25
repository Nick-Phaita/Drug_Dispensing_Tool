<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pharmacy sign_up</h1>
    <form action="pharmacist_signup.php" method="post">
        <label for="">SSN</label>
        <input type="number" name="pSSN" id="pSSN" placeholder="Enter your SSN" required><br><br>
        <label for="">Name</label>
        <input type="text" name="phname" id="phname" placeholder="Enter your name" required><br><br>
        <label for="pname">Pharmacy name</label>
        <select name="pname" id="pname">
            <option value="" selected hidden>Pick the speciality</option>
            <?php
            require_once("connection.php");

            $sql="SELECT * FROM pharmacy";
            
            $result=$conn->query($sql);

            if($result=$conn->query($sql)){

                while($row = $result->fetch_assoc()){

                
            
            echo "
            <option value='$row[Pharname]'>$row[Pharname]</option>
            ";}}
            ?>
        </select><br><br>
        <label for="">Password</label>
        <input type="password" name="ppassword" id="ppassword" placeholder="******" required><br><br>
        <input type="submit" name="submit" id="">


    </form>
</body>
</html>