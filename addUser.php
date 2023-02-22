<?php
include("connection.php");

if($_POST['id']){
    echo $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

            $err = false;
            $reUser = "/^[a-z0-9]{4,20}$/";
            $reEmail = "/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
            $rePass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

            if(!preg_match($reUser,$username)){
                $err = true;
            }
            if(!preg_match($reEmail,$email)){
                $err = true;
            }
            if(!preg_match($rePass,$password)){
                $err = true;
            }

            if($err){
                echo "Something isn't quite right!";
            }
            else{
                $md5pass = md5($password);


                $query = "INSERT INTO user VALUES(NULL, :username, :email, :password, NULL, :role)";
                $prep = $con->prepare($query);
                $prep->bindParam(":username", $username);
                $prep->bindParam(":email", $email);
                $prep->bindParam(":password", $md5pass);
                $prep->bindParam(":role", $role);
                $result = $prep->execute();
                $message = "Uspesno dodat korisnik";
                if($result){
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode(['message' => $message]);
                }
            }
        }
?>