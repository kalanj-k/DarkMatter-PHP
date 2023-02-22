<?php
        include("connection.php");
        include("head.php");
        include("nav.php");

        //
        if(isset($_POST["submit"])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $err = false;

            //reg

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
               $mailquery = "SELECT * FROM user WHERE email = :email";
                $preparemail = $con->prepare($mailquery);
                $preparemail->bindParam(":email",$email);
                $preparemail->execute();
                $doesExist= $preparemail->fetch();
                if($doesExist){
                echo "<div class=\"container\">
                <div class=\"flex-column d-flex justify-content-center align-items-center mt-2 short p-2\">
                <div class=\"title text-center mb-5\">
                <h5>A user with that email already exists! Did you mean to <a href=\"login.php\">log in?</a></h5>
                </div>
                </div>
                </div>";
                }
                else{
                $query = "INSERT INTO user (id,username,email,password,role_id) VALUES (NULL, :username, :email, :password, 3)";
                $prep = $con->prepare($query);
                $prep->bindParam(":username", $username);
                $prep->bindParam(":email", $email);
                $prep->bindParam(":password", $password);
                $done = $prep->execute();

                    if($done){
                    echo "<div class=\"container\">
                    <div class=\"flex-column d-flex justify-content-center align-items-center mt-2 short p-2\">
                    <div class=\"title text-center mb-5\"><h5>You have been registered.<br>
                    <span class=\"goback\"><a href=\"login.php\">Log in!</a></span></h5></div>
                    </div>
                    </div>";
                    }
                } 
            }
            
        }
?>
<?php
    include("footer.php");
?>

</body>
</html>