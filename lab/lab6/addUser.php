<?php
    session_start();

    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    function getDepartmentInfo() {
        global $conn;
        
        $sql = "SELECT deptName, departmentId
                FROM `tc_department`";
                
        $statment = $conn->prepare($sql);
        $statment->execute();
        $departments = $statment->fetchAll(PDO::FETCH_ASSOC);
        
        return $departments;
    }
    
    if (isset($_GET['addUserForm'])) {
        //the administrator clicked on the "Add User" button
        $firstName = $_GET['firstName'];
        $lastName =  $_GET['lastName'];
        $email =     $_GET['email'];
        $universityId = $_GET['universityId'];
        $phone =     $_GET['phone'];
        $gender =    $_GET['gender'];
        $role =      $_GET['role'];
        $deptId =    $_GET['deptId'];
        
        $sql = "INSERT INTO `tc_user`
                (firstName, lastName, email, universityId, gender, phone, role, deptId)
                VALUES
                (:fName, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
                
        $namedParameters = array();
        $namedParameters[':fName']  = $firstName;
        $namedParameters[':lName']  = $lastName;
        $namedParameters[':email']  = $email;
        $namedParameters[':universityId'] = $universityId;
        $namedParameters[':gender'] = $gender;
        $namedParameters[':phone']  = $phone;
        $namedParameters[':role']   = $role;
        $namedParameters[':deptId'] = $deptId;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New User </title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        
        <h1> Admin Section </h1>
        <h1> Adding New Users </h1>
        
        <fieldset>
            <legend> Add New User </legend>
            
            <form method="GET">
                First Name: <input type="text" name="firstName" required /> <br />
                Last Name: <input type="text" name="lastName" required /> <br />
                Email: <input type="text" name="email" required /> <br />
                University Id: <input type="text" name="universityId" required /> <br />
                Phone: <input type="text" name="phone" required /> <br />
                Gender: <input type="radio" name="gender" value="F" id="genderF" required />
                         <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM" required />
                         <label for="genderM">Male</label> <br />
                Role:   <select name="role" required >
                            <option value="">- Select One -</option>
                            <option>Faculty</option>
                            <option>Student</option>
                            <option>Staff</option>
                        </select>
                <br />
                Department: <select name="deptId" required >
                                <option value="">- Select One -</option>
                                <?php
                                    $departments = getDepartmentInfo();
                                    foreach ($departments as $value) {
                                        echo "<option value='" . $value['departmentId'] . "'>" . $value['deptName'] . "</option>";
                                    }
                                ?>
                            </select>
                            <br />
                <input type="submit" name="addUserForm" value="Add User!"/>
            </form>
        </fieldset>

    </body>
</html>