<?php  
  include("connection.php");
  include("head.php");
  include("nav.php");
  $query = "SELECT * FROM banner";
  $prep = $con->prepare($query);
  $prep->execute();
  $data = $prep->fetchAll();
?>

<div class="container-fluid" id="content">
    <div class="container-fluid">
      <div class="container" id="carousel">
        <div class="carousel slide" id="slide" data-ride="carousel">
          <div class="carousel-inner">
            <!--carousel items-->
              <?php 
                $i=1;
                $write="";
                foreach($data as $item){
                  $class = ($i == 1) ? 'carousel-item active' : 'carousel-item';
                  $write.= "<div class=\"".$class."\"><img src=".$item->src." class=\"d-block w-100\" alt=\"".$item->alt."\"></div>";
                  $i++;
                 }
                echo $write;
              ?>
          </div>
          <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="container">
        <div class="row d-flex text-left justify-content-start">
          <div class="col-12 col-sm-4 title">
            <h2 class="mt-3 pb-2">Comics For You</h2>
          </div>
        </div>
        <div class="row d-flex text-center justify-content-around" id="picked">
          <?php
          $recquery = "SELECT * FROM products WHERE recommended=1";
          $recprep = $con->prepare($recquery);
          $recprep->execute();
          $recdata = $recprep->fetchAll();
          $write = "";
          foreach($recdata as $rd){
            $write .= "<div class=\"col-12 col-sm-5 col-md-5 d-flex col-lg-3 col-xl-3\">
                    <div class=\"card pick bg-dark flex-fill mb-3 kartica\">";
            if($rd->instock==0){
              $write .= "<div class=\"stock\"><p>OUT OF STOCK</p></div>";
            }        
            $write .= "<img class=\"card-img-top rounded img-fluid\" src=\"".$rd->src."\" alt=\"".$rd->alt."\">
                    <div class=\"card-body d-flex flex-column justify-content-between p-2\">
                    <h5 class=\"card-title\">".$rd->name."</h5>
                    <div class=\"d-flex flex-column justify-content-between price\">
                    <div class=\"card-body d-flex flex-column justify-content-between p-1\">
                    <p class=\"card-subtitle\">".$rd->price."€</p></div>
                    <div class=\"card-body d-flex align-items-center justify-content-center p-1 click\">
                    <span role=\"button\" value=\"".$rd->id."\" class=\"btnCart1\" data-id=".$rd->id."><i class=\"fas fa-shopping-cart pr-3\"></i> Add to cart</span>
                    &nbsp&nbsp<span data-toggle=\"modal\" data-id=\"".$rd->id."\"data-target=\"#info\"><i class=\"far fa-question-circle\"></i></span>
                    </div>
                    </div>
                    </div>
                    </div>

<div class=\"modal fade\" id=\"info\" tabindex=\"-1\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <!--sadrzaj-->
            </div>
          </div>
        </div>


                  </div>";
          }
          echo $write;
          ?>
          
        </div>
        <!--modal-->
        
      </div>
    </div>
</div>
    
<?php
    include("footer.php");
?>
<script src="assets/js/script.js" type="text/javaScript"></script>
</body>
</html>