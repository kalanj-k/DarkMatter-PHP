<?php  
  include("head.php");
  include("connection.php");
  include("nav.php");
  if (!isset($_SESSION['user'])) { 
    header("Location: index.php");
  }

  //pitanja

  $questionquery = "SELECT * FROM survey_questions";
  $questionprep = $con->prepare($questionquery);
  $questionprep->execute();
  $questions = $questionprep->fetchAll();

  $answerquery = "SELECT * FROM survey_answers";
  $answerprep = $con->prepare($answerquery);
  $answerprep->execute();
  $answers = $answerprep->fetchAll();

?>

<div class="container-fluid pb-5 short">
      <div class="container">
        <div class="row d-flex text-left justify-content-start">
          <div class="col-12 col-sm-4 title">
            <h2 class="mt-3 pb-2">Your Account</h2>
          </div>
        </div>
        <div class="flex-column d-flex flex-md-row text-left justify-content-start">
          <div class="flex-column mt-4 d-flex align-items-center text-center justify-content-center col-12 col-md-8">
          <div class="container-fluid" id="chckOut">
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
        <a><button type="button" class="btn btn-dark mt-2" id="btnBase">COMPLETE YOUR ORDER</button></a>
      </div>
    </div>
          </div>
          <div class="flex-column mt-4 d-flex align-items-center text-center justify-content-center col-12 col-md-3">
            <div><form action="" method="POST" onsubmit="return questionCheck();">
              <p>
                <h4>Hey.<br>Could you answer some questions for us?</h4><br>
                <?php
                  if(isset($_SESSION['user'])){
                    $existquery = "SELECT * FROM survey_user WHERE user_id = :user_id";
                $existprep = $con->prepare($existquery);
                $existprep->bindParam(':user_id', $_SESSION['user']->id);
                $existprep->execute();
                $doesexist = $existprep->fetch();
                if($doesexist) {
                  echo "Hm. Looks like you already have. This is awkward.";
                }
                else{
                  foreach($questions as $q){
                  
                  echo $q->question;
                  echo "<br>";
                  foreach($answers as $a){
                   if($a->question_id==$q->id){
                      echo "<input type=\"radio\" id=\"".$a->id."\"
                      name=\"".$q->id."\" class=\"qbtn\" value=\"".$a->id."\">
                       <label for=\"".$a->id."\">".$a->answer."</label><br>";
                    }
                  }
                }
                echo "<span id=\"nope\"></span><br><input type=\"submit\" class=\"btn btn-dark\" id=\"btnQuiz\" name=\"btnQuiz\" value=\"SUBMIT\">";
                }
              }
                
                ?>
                </form>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php

if(isset($_POST['btnQuiz'])){
  $basequery = "INSERT INTO survey_user (user_id) VALUES (:user_id)";
  $baseprep = $con->prepare($basequery);
  $baseprep->bindParam(':user_id', $_SESSION['user']->id);
  $baseprep->execute();
}
  include("footer.php");
?>
<script src="assets/js/cartscript.js" type="text/javaScript"></script>

</body>
</html>