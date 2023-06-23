<!DOCTYPE html>
<html>
    <head>table viewer</head>

    <body>
        <table>
            <tr>
                <th>SSN
                </th>
                <th>Names</th>
                <th>Speciality</th>
                <th>Years_of_experience</th>
                <th>Doctorpassword</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            session_start();
            require_once("connection.php");

            $sql="SELECT * FROM `doctors`";
            
            $result=$conn->query($sql);

            if($result=$conn->query($sql)){

                while($row = $result->fetch_assoc()){
            
            echo "
            <tr><td>$row[SSN]</td>
            <td>$row[Names]</td>
            <td>$row[Speciality]</td>
            <td>$row[Years_of_experience]</td>
            <td>$row[Doctorpassword]</td>
            <td><a href='edit.php?SSN=$row[SSN]'>Edit</a></td>
            <td><a href='delete.php?SSN=$row[SSN]'>Delete</a></td></tr>";

                }
            }
            ?>
        </table>
    </body>
</html>