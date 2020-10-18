<?php

require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class AuthenticationService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
    $this->itemDetailPath = "/view/authentication/login.php";
  }

  function login($loginName , $pw)
  {

    $username = mysqli_real_escape_string($this->connection, $loginName);
    $password = mysqli_real_escape_string($this->connection, $pw);

	$sql = "SELECT * FROM users WHERE username ='$username'";
	$result = mysqli_query($this->connection, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck < 1) {
        header("Location: /view/authentication/login.php?login=error");
        exit();
    }else{
        if ($row = mysqli_fetch_assoc($result)) {
            if (md5($password) != $row['password']) {
                 header("Location: /view/authentication/login.php?login=failed");
                 exit();
            }else{
                $userId= $row['id'];
                $fullName = $row['full_name'];
                $role= $row['role'];
                $_SESSION['userId'] =  $userId ;
                $_SESSION['full_name'] = $fullName;
                $_SESSION['role'] = $role;
                header("Location: /view/home/home.php?user=$fullName");
                exit();
            }
        }
    }
  }

function registration($fullName, $username, $mobileNumber, $email, $address, $password , $confirmPassword, $role, $storeName , $storeEmail, $storeAddress){
    $fullName= mysqli_real_escape_string($this->connection, $fullName);
    $username = mysqli_real_escape_string($this->connection, $username);
    $mobileNumber= mysqli_real_escape_string($this->connection, $mobileNumber);
    $email= mysqli_real_escape_string($this->connection, $email);
    $address= mysqli_real_escape_string($this->connection, $address);
    $password = mysqli_real_escape_string($this->connection, $password);
    $confirmPassword = mysqli_real_escape_string($this->connection, $confirmPassword);
    $role = mysqli_real_escape_string($this->connection, $role);
    $storeName = mysqli_real_escape_string($this->connection, $storeName);
    $storeEmail = mysqli_real_escape_string($this->connection, $storeEmail);
    $storeAddress = mysqli_real_escape_string($this->connection, $storeAddress);

    $sql = "SELECT * FROM users WHERE username ='$username'";
    $result = mysqli_query($this->connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    	if ($resultCheck > 0) {
            header("Location: /view/authentication/registration.php?registration=userExist");
            exit();
        }else{
            $encryptedPassword = md5($password);
            $sql= "INSERT INTO users(`full_name`, `username`, `mobile_number`, `email`, `address`, `password`, `role`) VALUES ('$fullName','$username', $mobileNumber,'$email','$address','$encryptedPassword','$role')";
            mysqli_query($this->connection, $sql);

            if($role == 'seller'){
                $sql = "SELECT * FROM users WHERE username ='$username'";
                $result = mysqli_query($this->connection, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0) {
                     if ($row = mysqli_fetch_assoc($result)) {
                       $id = $row['id'];
                       $sql= "INSERT INTO seller(`userid`,`name`, `location`, `email`) VALUES ('$id','$storeName', '$storeEmail','$storeAddress')";
                       mysqli_query($this->connection, $sql);
                     }
                }
            }

            header("Location: /view/authentication/login.php?registration=success");
            exit();
        }
    }
}



if(isset($_POST['login'])){
    $AuthenticationService = new AuthenticationService();
    if(empty($_POST['username']) || empty($_POST['password'])){
    	header("Location: /view/authentication/login.php?login=empty");
    	exit();
    }
    $AuthenticationService->login($_POST['username'] , $_POST['password']);
}

if(isset($_POST['sign-up'])){
    $AuthenticationService = new AuthenticationService();
    $AuthenticationService->registration($_POST['fullName'], $_POST['username'], $_POST['phoneNumber'], $_POST['email'], $_POST['address'], $_POST['password'], $_POST['confirmedPassword'],isset($_POST['roles']) ? $_POST['roles'] : "empty",$_POST['storeName'],$_POST['storeEmail'],$_POST['storeAddress']);
}





