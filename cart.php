<?php  
  include("connection.php");
  include("head.php");
  include("nav.php");
?>

<div class="container-fluid" id="content">
<div class="container-fluid short" id="chckOut">
      <div class="table-responsive">
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">PRODUCT</th>
              <th scope="col">PRICE</th>
              <th scope="col">AMOUNT</th>
              <th scope="col">X</th>
            </tr>
          </thead>
          <tbody id="cart">
          </tbody>
        </table>
      </div>
      <div class="text-right">
        <button type="button" class="btn btn-dark mt-2" id="btnClear">CLEAR CART</button>
        <button type="button" class="btn btn-dark mt-2" id="btnRes">ADJUST CART</button>
        <a href="account.php"><button type="button" class="btn btn-dark mt-2" id="btnRes">ORDER</button></a>
      </div>
    </div>
</div>


    
<?php
    include("footer.php");
?>
<script src="assets/js/cartscript.js" type="text/javaScript"></script>
</body>
</html>