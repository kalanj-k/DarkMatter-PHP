<?php
  include("connection.php");
  include("head.php");
  include("nav.php");
?>
<?php
    if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $err = false;

            //reg

            $reUser = "/^[a-z0-9]{4,20}$/";
            $rePass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

            if(!preg_match($reUser,$username)){
                $err = true;
            }
            if(!preg_match($rePass,$password)){
                $err = true;
            }

            if($err){
                echo "<div class=\"flex-column d-flex justify-content-center align-items-center mt-2 p-2\">
                <div class=\"title text-center mb-5\"><h5>Something went wrong. Try again!</h5></div>
                </div>";
            }
            else{
                $logquery="SELECT * FROM user WHERE username = :username AND password = :password";
                $preparelog = $con->prepare($logquery);
                $preparelog->bindParam(":username",$username);
                $preparelog->bindParam(":password",$password);
                $result=$preparelog->execute();
                
                if($result){
                        $stuff = $preparelog->fetch();
                        $_SESSION['user'] = $stuff;
                        if($_SESSION['user']->role_id==4){
                            header("Location: admin.php");
                        }
                        else if($_SESSION['user']->role_id==3){
                            header("Location: account.php");
                        }
                        else{
                            header("Location: index.php");
                        }
                    }
            }
    }
?>
<div class="container">
    <div class="flex-column d-flex justify-content-center align-items-center mt-2 short p-2">
            <div class="title text-center mb-5"><h5>LOG IN </h5></div>
            <div>
                <form id="forma" action="" method="POST">
            <div class="form-row col-12">
                <label for="username">Username:</label><br>
                <input type="text" class="form-control" id="username" name="username"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row col-12 mt-3">
                <label for="password">Password:</label><br>
                <input type="password" class="form-control" id="password" name="password"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row d-flex justify-content-center mt-5">
              <button type="submit" class="btn btn-primary btn-lg" name="submit" id="formBtn"><i
                  class="fas fa-paper-plane"></i></button>
            </div>
            </form>
            </div>
            
        </div>
</div>




<?php
    include("footer.php");
?>

</body>
</html>