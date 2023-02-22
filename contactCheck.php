<?php
        include("connection.php");
        include("head.php");
        include("nav.php");


        // provera


        $name = $_POST['ime'];
        $mail = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['txtarea'];

        $reName = "/^[A-Z][a-z]{2,9}(\s[A-Z][a-z]{2,14})+$/";
        $reMail = "/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";

        $err = false;

        if(!preg_match($reName, $name)){
            $err = true;
        }
        if(!preg_match($reMail, $mail)){
            $err = true;
        }
        if($subject==""){
            $err = true;
        }
        if($msg == ""){
            $err = true;
        }

        if(!$err){
            include("connection.php");
            $query = "INSERT INTO messages(name,mail,subject,msg) VALUES (:name, :mail, :subject, :msg)";
            $prep = $con->prepare($query);
            $prep->bindParam(":name",$name);
            $prep->bindParam(":mail",$mail);
            $prep->bindParam(":subject",$subject);
            $prep->bindParam(":msg",$msg);
            $prep->execute();
        }
?>

<div class="container">
    <div class="flex-column d-flex justify-content-center align-items-center mt-2 short p-2">
    <div class="title text-center mb-5"><h5>Your message has been delivered, we'll reply shortly.<br>
    <span class="goback"><a href="shop.php">While you're waiting, check out our shop!</a></span></h5></div>
    </div>
</div>

<?php
    include("footer.php");
?>

</body>
</html>