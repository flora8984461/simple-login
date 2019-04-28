<?php

if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //check for empty fields
    if(empty($name) || empty($email) || empty($uid) || empty($pwd) ){
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/",$name) ){
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else{ if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?signup=invalidEMAIL");
            exit();
        } else{$sql="SELECT*FROM users WHERE user_uid ='$uid'";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck>0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                    } else{
                            //Hashing the password
                            $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
                                //Insert the user into the db
                                $sql="INSERT INTO users(user_name,user_email,user_uid,user_pwd) VALUES('$name','$email','$uid','$hashedPwd');";
                                mysqli_query($conn,$sql);
                           /*     $try = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                                mysqli_free_result($try); */
                      header("Location: ../signup.php?signup=success");
                                exit();
                            }
                }
        }

    }



} else{
    header("Location: ../signup.php");
    exit();
}