 <?php
     session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];

    if($username == "" || $password == "" || $email == "" ||$gender=="" ||$day=="" ||$month==""||$year=="" ){ 
       
       header('location: Reg.php?error=null');
        
    }    
    else if($password!=$confirmPassword){     
            
       header('location: Reg.php?error=no_match');
    }else{
        $user = ['username'=> strim($username), 'password'=>strim($password), 'email'=>strim($email), 'gender'=>strim($gender),'day'=>strim($day),'month'=>strim($month),'year'=>strim($year) ];

        $_SESSION['user'] = $user;
        header('location: Login.php');                      
    }

?> 
