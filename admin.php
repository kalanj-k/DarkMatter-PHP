<?php  
  include("head.php");
  include("connection.php");
  include("nav.php");
 if (!isset($_SESSION['user']) && $_SESSION['user']->role_id != 4) { 
    header("Location: index.php");
  }

  //messages

    $msgquery = "SELECT * FROM messages";
    $msgprep = $con->prepare($msgquery);
    $msgprep->execute();
    $messages = $msgprep->fetchAll();

  //users

  $userquery = "SELECT * FROM user";
  $userprep = $con->prepare($userquery);
  $userprep->execute();
  $users = $userprep->fetchAll();

  //products
  $productquery = "SELECT * FROM products";
  $proprep = $con->prepare($productquery);
  $proprep->execute();
  $products = $proprep->fetchAll();

?>
<div class="container-fluid" id="content">
</div>
<div class="container-fluid pb-5">
      <div class="container">
        <div class="row d-flex text-left justify-content-start">
          <div class="col-12 col-sm-4 title">
            <h2 class="mt-3 pb-2">Admin Panel</h2>
          </div>
        </div>
        <div class="container-fluid text-center p-3">
        <h5 class="mb-3">MESSAGES</h5>
        <div class="table-responsive">
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">NAME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">SUBJECT</th>
              <th scope="col">MESSAGE</th>
              <th scope="col">X</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($messages as $m): ?>
                <tr class="cartRow" data-rowid="<?= $m->id; ?>">
                    <td valign="center"><?= $m->name; ?></td>
                    <td valign="center"><?= $m->mail; ?></td>
                    <td valign="center"><?= $m->subject; ?></td>
                    <td valign="center"><?= $m->msg; ?></td>
                    <td valign="center"><button type="button" class="btn btn-dark mt-2 msgRem" data-id="<?= $m->id; ?>">X</button>
            </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <span id="msgDel"></span>
      </div>
    </div>
    <!-- USERS -->
    <div class="container-fluid text-center p-3">
        <h5 class="mb-3">USERS</h5>
        <div class="table-responsive">
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">USERNAME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">PASSWORD</th>
              <th scope="col">ROLE</th>
              <th scope="col">X</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $u): ?>
                <tr class="cartRow" data-rowid="<?= $u->id; ?>">
                    <td valign="center"><?= $u->id; ?></td>
                    <td valign="center" data-rowusername="<?= $u->username; ?>"><?= $u->username; ?></td>
                    <td valign="center" data-rowemail="<?= $u->email; ?>"><?= $u->email; ?></td>
                    <td valign="center" data-rowpassword="<?= $u->password; ?>"><?= $u->password; ?></td>
                    <td valign="center" data-rowrole="<?= $u->role_id; ?>"><?= $u->role_id; ?></td>
                    <td valign="center"><button type="button" class="btn btn-dark mt-2 useRem" data-id="<?= $u->id; ?>">X</button>
            </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <button type="button" class="btn btn-dark mt-2" id="btnAddShow">ADD NEW USER</button>
    <div class="container-fluid text-center col-12 col-md-5 mt-2" id="userAdd">
        <h5>Add User</h5>
        <div class="form-row col-12 mt-3">
                <label for="usernameAdd">Username :</label><br>
                <input type="text" class="form-control" id="usernameAdd" name="usernameAdd" placeholder="small letters or numbers, 4-20"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="emailAdd">Email :</label><br>
                <input type="text" class="form-control" id="emailAdd" name="emailAdd" placeholder="ex. imbatman@gmail.com"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="passwordAdd">Password :</label><br>
                <input type="text" class="form-control" id="passwordAdd" name="passwordAdd" placeholder="no less than 8 characters!"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="roleAdd">Role :</label><br>
                <select class="form-control" id='roleAdd'>
                    <option value='0'>Choose...</option>
                    <option value='3'>User</option>
                    <option value='4'>Admin</option>
                </select>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row d-flex justify-content-center mt-5">
              <button type="submit" class="btn btn-dark btn-lg" name="submit" id="addBtnForm" data-addid="1"><i
                  class="fas fa-paper-plane"></i></button><button type="submit" class="btn btn-dark btn-lg ml-2" id="hideUserAdd">HIDE</button><br>
                  <span id="useAdd"></span>
        </div>
    </div>
        
      </div>
    </div>
    
    <div class="container-fluid text-center p-3">
        <h5 class="mb-3">PRODUCTS</h5>
        <div class="table-responsive">
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NAME</th>
              <th scope="col">PRICE</th>
              <th scope="col">RECOMMENDED</th>
              <th scope="col">IN STOCK</th>
              <th scope="col"><i class="fas fa-pen"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($products as $p): ?>
                <tr class="cartRow" data-rowid="<?= $p->id; ?>">
                    <td valign="center"><?= $p->id; ?></td>
                    <td valign="center" ><?= $p->name; ?></td>
                    <td valign="center" ><?= $p->price; ?> €</td>
                    <td valign="center" ><?= $p->recommended; ?></td>
                    <td valign="center" ><?= $p->instock; ?></td>
                    <td valign="center"><button type="button" class="btn btn-dark mt-2 proEdit" data-id="<?= $p->id; ?>"><i class="fas fa-pen"></i></button></td>
            </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table></div>
        <div class="container-fluid text-center col-12 col-md-5 mt-2" id="proUp">
        <h5>Update Product</h5>
        <div class="form-row col-12 mt-3">
                <label for="idUpdate">ID :</label><br>
                <input type="text" class="form-control" id="idUpdate" name="idUpdate" value="" readonly><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="nameUpdate">Name :</label><br>
                <input type="text" class="form-control" id="nameUpdate" name="nameUpdate"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="priceUpdate">Price :</label><br>
                <input type="text" class="form-control" id="priceUpdate" name="priceUpdate" placeholder="20.99"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="recUpdate">Recommended :</label><br>
                <select class="form-control" id='recUpdate'>
                    <option value='0'>No</option>
                    <option value='1'>Yes</option>
                </select>
        </div>
        <div class="form-row col-12 mt-3">
                <label for="stockUpdate">In Stock :</label><br>
                <select class="form-control" id='stockUpdate'>
                    <option value='1'>Yes</option>
                    <option value='0'>No</option>
                </select>
        </div>
        <div class="form-row d-flex justify-content-center mt-5">
              <button type="submit" class="btn btn-dark btn-lg" name="submit" id="btnFormUpdate" data-addid="1"><i
                  class="fas fa-paper-plane"></i></button><button type="submit" class="btn btn-dark btn-lg ml-2" id="hideProUp">HIDE</button>
        </div>
        
      
    </div>
      </div>
    </div>
    </div>
</div>




<?php
    include("footer.php");
?>
<script src="assets/js/admin.js" type="text/javaScript"></script>
</body>
</html>