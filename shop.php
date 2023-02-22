<?php  
  include("connection.php");
  include("head.php");
  include("nav.php");

  $params = "";
  $genreId = "";

  if (isset($_GET['ddGenre'])) {
    $genreId = $_GET['ddGenre'];
    $params .= "&ddGenre=$genreId";
  }

  $seriesIds="";
  $seriesIdsString= "";

  if (isset($_GET['chbSeries'])) {
    $seriesIds = $_GET['chbSeries'];
    foreach($seriesIds as $s) {
    $params .= "&chbSeries[]=$s";
    }
    $seriesIdsString = implode(", ", $seriesIds);
    }

    $by="";
  if (isset($_GET['ddSort'])) {
    $sort = $_GET['ddSort'];
    $by = explode("-", $sort)[1];
    $dir = explode("-", $sort)[0];
    $params .= "&ddSort=$sort";
    }
  //genres

  $genres = $con->query("SELECT * FROM genre")->fetchAll();
  $gen = !empty($genreId) ? "INNER JOIN product_genre pg ON p.id = pg.product_id WHERE pg.genre_id = $genreId AND" : "WHERE" ;
  
  //series

  $querySeries = "SELECT s.id, s.name, COUNT(p.id) AS num FROM series s
  LEFT JOIN products p ON s.id = p.id_series GROUP BY s.id";
  $series = $con->query($querySeries)->fetchAll();

  // pages

  $pg=0;
  if(isset($_GET['pg'])){
    $pg = ($_GET['pg']-1)*10;
  }

  //products

  $pquery = "SELECT p.id,p.name,p.price, p.src,p.alt,p.author,p.instock,p.pages,p.date,p.description FROM products p".($genreId ? " INNER JOIN product_genre pg ON p.id=pg.product_id" : " ") . ($seriesIdsString? " INNER JOIN series s ON p.id_series=s.id" : " ") . " WHERE " . ($genreId ? "pg.genre_id = $genreId" : " 1 ") . " AND ".
  ($seriesIdsString ? "p.id_series in($seriesIdsString)" : " 1 ") . " GROUP BY p.id " . ($by ? "ORDER BY $by $dir" : " ") . " LIMIT $pg,10";
  $res = $con->query($pquery);
  $num = $res->rowCount();
  $products = $res->fetchAll();
  $proNum=ceil($num/9);
  
?>
    
    <div class="container-fluid" id="shop">
      <div class="container">
        <div class="row d-flex text-left left-content-start">
          <div class="col-12 col-sm-4 title">
            <h2 class="mt-3 pb-2">SHOP</h2>
          </div>
        </div>
        <div class="row d-flex flex-column flex-md-row justify-content-center mt-3">
          <div class="row d-flex text-center justify-content-around col-12 col-md-9 order-2 order-md-1" id="proizvodi">
            <!--proizvodi-->
          <?php
          $write = "";
          if(count($products)){
            foreach($products as $p){
            $write .= "<div class=\"col-12 col-sm-6 d-flex col-lg-4\">
                    <div class=\"card pick bg-dark flex-fill mb-3 kartica\">";
            if($p->instock==0){
              $write .= "<div class=\"stock\"><p>OUT OF STOCK</p></div>";
            }        
            $write .= "<img class=\"card-img-top rounded img-fluid\" src=\"".$p->src."\" alt=\"".$p->alt."\">
                    <div class=\"card-body d-flex flex-column justify-content-between p-2\">
                    <h5 class=\"card-title\">".$p->name."</h5>
                    <div class=\"d-flex flex-column justify-content-between price\">
                    <div class=\"card-body d-flex flex-column justify-content-between p-1\">
                    <p class=\"card-subtitle\">".$p->price."€</p></div>
                    <div class=\"card-body d-flex align-items-center justify-content-center p-1 click\">
                    <span role=\"button\" value=\"".$p->id."\" class=\"btnCart1\" data-id=".$p->id."><i class=\"fas fa-shopping-cart pr-3\"></i> Add to cart</span>
                    &nbsp&nbsp<span data-toggle=\"modal\" data-id=\"".$p->id."\"data-target=\"#info\"><i class=\"far fa-question-circle\"></i></span>
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
          
          }
          else{
            $write .= "<span class=\"doesNotExist mt-5\">That product doesn't exist! Try again!</span>";
          }
          echo $write;
          ?>

          <!--paginacija-->
          <div class="container d-flex justify-content-center">
            <?php for($i=1; $i <= $proNum; $i++): ?>
                <li><a href="shop.php?pg=<?=$i . $params?>"><div class="btn btn-dark"> <?=$i?></div></a></li>
            <?php endfor; ?>
          </div>
          </div>
          <div class="row d-flex text-center justify-content-around col-12 col-md-3 order-1 order-nd-2">
            <form id="forma1" method="GET" action="">
              <div class="form-group">
                <select class="custom-select mt-2 mb-2" id="ddSort" name="ddSort">
                  <option value="ASC-id" selected>Sort By...</option>
                  <option value="ASC-name">Name</option>
                  <option value="DESC-date">Newest</option>
                  <option value="ASC-date">Oldest</option>
                  <option value="ASC-price">Price Ascending</option>
                  <option value="DESC-price">Price Descending</option>
                </select>
                <select class="custom-select mt-2 mb-2" id="ddGenre" name="ddGenre">
                  <option selected value="0">Genre...</option>
                  <?php foreach($genres as $g) : ?>
                    <option value="<?=$g->id?>" <?=$genreId == $g->id ? " selected" : "" ?> ><?=$g->name?></option>
                  <?php endforeach; ?>
                </select>
                <div class="text-left" id="series">
                  <ul>
                    <?php foreach($series as $sd): ?>
                    <li id="" class="series">
                      <input type="checkbox" class="form-check-input" name="chbSeries[]" value="<?=$sd->id?>" id="series-<?=$sd->id?>"
                      <?php if($seriesIds) echo (in_array($sd->id,$seriesIds) ? " checked" : "" ); ?>>
                      <?=$sd->name?> (<?=$sd->num?>)
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </div>
                <button type="submit" class="btn btn-dark mt-1 mb-2" id="btnSrc">SUBMIT</button>
                <button type="reset" class="btn btn-dark mt-1 mb-2" id="res">RESET</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
<?php
    include("footer.php");
?>
<script src="assets/js/script.js" type="text/javaScript"></script>

</body>
</html>