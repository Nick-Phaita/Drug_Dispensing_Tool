
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
<td><a href='table_editing/edit_doctors.php?SSN=$row[SSN]'>Edit</a></td>
<td><a href='table_editing/delete_doctors.php?SSN=$row[SSN]'>Delete</a></td></tr>";

    }
}
?>
</table>

<a href="/adminpage_clones/doctor_signup.html"><button>Register doctor</button></a>   

<br><br><br><br>

<table>
            <tr>
                <th>SSN</th>
                <th>Names</th>
                <th>Pharmacy name</th>
                <th>Pharmacist password</th>
                
            </tr>
            <?php
            
            require_once("connection.php");

            $sql="SELECT * FROM pharmacist";
            
            $result=$conn->query($sql);

            if($result=$conn->query($sql)){

                while($row = $result->fetch_assoc()){
            
            echo "
            <tr><td>$row[SSN]</td>
            <td>$row[Names]</td>
            <td>$row[Pharmacy_name]</td>
            <td>$row[Pharmacistpassword]</td>
            <td><a href='edit.php?SSN=$row[SSN]'>Edit</a></td>
            <td><a href='table_editing/delete_pharmacists.php?SSN=$row[SSN]'>Delete</a></td></tr>";

                }
            }
            ?>
        </table>

        <a href="/adminpage_clones/pharmacist_signup1.php"><button>Register pharmacist</button></a>
        <br><br><br><br>

        <table>
            <tr>
                <th>SSN</th>
                <th>Names</th>
                <th>Gender</th>
                <th>Allergies</th>
                <th>Height(cm)</th>
                <th>Weight(kg)</th>
                <th>Patient address</th>
                <th>Date of birth</th>
                <th>Userpassword</th>
            </tr>
            <?php
            
            require_once("connection.php");

            $sql="SELECT * FROM patients";
            
            $result=$conn->query($sql);

            if($result=$conn->query($sql)){

                while($row = $result->fetch_assoc()){
            
            echo "
            <tr><td>$row[SSN]</td>
            <td>$row[Names]</td>
            <td>$row[Gender]</td>
            <td>$row[Allergies]</td>
            <td>$row[HeightinCm]</td>
            <td>$row[WeightinKg]</td>
            <td>$row[PatientAddress]</td>
            <td>$row[DateOfBirth]</td>
            <td>$row[UserPassword]</td>
            <td><a href='edit.php?SSN=$row[SSN]'>Edit</a></td>
            <td><a href='/table_editing/delete_patients.php?SSN=$row[SSN]'>Delete</a></td></tr>";

                }
            }
            ?>
        </table>

        <a href="/adminpage_clones/patient_signup.html"><button>Register patient</button></a>

        <br><br><br><br>

        <table>
            <tr>
                <th>CompanyID</th>
                <th>Pharmacy name</th>
                <th>Address</th>
                <th>Phone_no</th>
                
            </tr>
            <?php
            
            require_once("connection.php");

            $sql="SELECT * FROM pharmacy";
            
            $result=$conn->query($sql);

            if($result=$conn->query($sql)){

                while($row = $result->fetch_assoc()){
            
            echo "
            <tr>
            <td>$row[CompanyID]</td>
            <td>$row[Pharname]</td>
            <td>$row[Addresss]</td>
            <td>$row[Phone_no]</td>
            <td><a href='edit.php?CompanyID=$row[CompanyID]'>Edit</a></td>
            <td><a href='table_editing/delete_pharmacy.php?CompanyID=$row[CompanyID]'>Delete</a></td></tr>";

                }
            }
            ?>
        </table>

        <a href="/registration_and_signup/pharmacy_register.html"><button>Register pharmacy</button></a>

