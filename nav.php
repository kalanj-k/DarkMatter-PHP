<?php
    $query = "SELECT * FROM nav";
    $prep = $con->prepare($query);
    $prep->execute();
    $data = $prep->fetchAll();
?>
<div class="container" id="top">
    <div class="container col-12 justify-content-between d-flex">
        <div>
        <a href="dokumentacijaphp1.pdf" target="_blank">DOCUMENTATION</a>
        </div>
        <div>

        <?php
        
        $logged = false;

        if(isset($_SESSION['user'])){
          $logged = true;
        }

        //logovan admin
        if($logged){
          if($_SESSION['user']->role_id==4){
            echo "<a href=\"admin.php\">ADMIN</a> | ";
          }
          else{
            echo "";
          }
        }

        //logovan korisnik
        if($logged){
          echo "<a href=\"account.php\">YOUR ACCOUNT</a> | <a href=\"logout.php\">LOGOUT</a>";
          echo "<input type=\"hidden\" id=\"userBuyId\" name=\"userBuyId\" value=\"".$_SESSION['user']->id."\">";
        }
        //ako nije logovan
        if(!$logged){
          echo "<a href=\"login.php\">LOGIN</a> | <a href=\"register.php\">REGISTER</a>";
        }
        ?>
        
        </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
          <img src="assets/img/wlogo.png" width="40" height="40" alt="skull">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" id="topnav">
        <?php foreach($data as $item){
            echo "<li class=\"nav-item active\"><a class=\"nav-link\" href=".$item->src.">".$item->name."</a></li>";
        }
        ?>
        </ul>
    </div>
  </nav>
</div>
<div id="backToTop"><i class="fab fa-airbnb"></i></div>