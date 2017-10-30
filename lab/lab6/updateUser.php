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
    
    function getUserInfo($userId) {
        global $conn;
    
        $sql = "SELECT *
                FROM `tc_user`
                WHERE userId = $userId";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    function checkIfSelected($option)
    {
        if ($option == $_GET['role'])
        {
            return "selected";
        }
    }
    
    if (isset($_GET['updateUserForm'])) {
        $sql = "UPDATE `tc_user`
                SET firstName = :fName,
                    lastName = :lName
                WHERE userId = :userId";
                
        $namedParameters = array();
        $namedParameters[":fName"] = $_GET['firstName'];
        $namedParameters[":lName"] = $_GET['lastName'];
        $namedParameters[":userId"] = $_GET['userId'];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
                
        
    }
    
    if (isset($_GET['userId'])) {
        $userInfo = getUserInfo($_GET['userId']);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        
        <h1> Admin Section </h1>
        <h1> Updating User Info </h1>
        
        <fieldset>
            <legend> Updating User </legend>
            
            <form method="GET">
                
                <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
                First Name: <input type="text" name="firstName" value="<?=$userInfo['firstName']?>" required /> <br />
                Last Name: <input type="text" name="lastName" value="<?=$userInfo['lastName']?>" required /> <br />
                Email: <input type="text" name="email" value="<?=$userInfo['email']?>" required /> <br />
                University Id: <input type="text" name="universityId" value="<?=$userInfo['universityId']?>" required /> <br />
                Phone: <input type="text" name="phone" value="<?=$userInfo['phone']?>" required /> <br />
                Gender: <input type="radio" name="gender" value="F" id="genderF" <?= ($userInfo['gender']=='F')?"checked":"" ?> required />
                         <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM" <?= ($userInfo['gender']=='M')?"checked":"" ?> required />
                         <label for="genderM">Male</label> <br />
                Role:   <select name="role" required >
                            <option value="">- Select One -</option>
                            <option <?=checkIfSelected('Faculty')?> >Faculty</option>
                            <option <?=checkIfSelected('Student')?> >Student</option>
                            <option <?=checkIfSelected('Staff')?> >Staff</option>
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
                <input type="submit" name="updateUserForm" value="Update User!"/>
            </form>
        </fieldset>

    </body>
</html>