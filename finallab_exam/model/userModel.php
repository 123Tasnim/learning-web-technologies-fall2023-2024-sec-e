<?php

    require_once('db.php');

    

    function login($username, $password)
    {
        $con = getConnection();
        echo $username, $password;
        $sql = "SELECT * FROM employees WHERE username = '$username' and password = '$password'; ";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user)
        {
            $status = array(
                'success' => true,
                'id' => $user['id'],
                'type' => $user['user_type']
            );
            return $status;
        } 
        else 
        {
            return array('success' => false);
        }
    }

    function employerReg($empdata) 
    {
        $conn = getConnection();
    
        $a1 = $empdata['e1'];
        $a2 = $empdata['e2'];
        $a3 = $empdata['e3'];
        $a4 = $empdata['e4'];
    
        $sql = "INSERT INTO employees (employee_name, contact_no, username, password)
        VALUES ('$a1', '$a2', '$a3', '$a4');";
    
        $result = mysqli_query($conn, $sql);
        
        if ($result) 
        {
            return true;
        } else {
            return false;
        }
    }

    function getAllUser()
    {
        $con = getConnection();
        $sql = "SELECT * FROM employees";
        $result = mysqli_query($con, $sql);
        $info = [];
        
        while($user = mysqli_fetch_assoc($result))
        {
            array_push($info, $user); // Corrected variable name
        }
        
        return $info;
    }

    function deleteUser($userId) 
    {
        $conn = getConnection();
    
        $sql = "DELETE FROM employees WHERE id = $userId";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }





    function searchemp($username)
    {
        $conn = getConnection();
    
        $sql = "SELECT * FROM employees WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $userinfo = mysqli_fetch_assoc($result);
        
        return $userinfo;
        
    }
    

?>