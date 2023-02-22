<?php
  include("connection.php");
  include("head.php");
  include("nav.php");
?>

<div class="container">
    <div class="flex-column d-flex justify-content-center align-items-center mt-2 short p-2">
            <div class="title text-center mb-5"><h5>REGISTER</h5></div>
            <div>
                <form id="forma" action="regCheck.php" method="POST" onsubmit="return formCheck()">
            <div class="form-row col-12">
                <label for="ime">Username:</label><br>
                <input type="text" class="form-control" id="username" name="username" placeholder="small letters or numbers, 4-20"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row col-12 mt-3">
                <label for="email">Email :</label><br>
                <input type="text" class="form-control" id="email" name="email" placeholder="ex. imbatman@gmail.com"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row col-12 mt-3">
                <label for="ime">Password:</label><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="no less than 8 characters!"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row d-flex justify-content-center mt-5">
              <button type="submit" class="btn btn-primary btn-lg" name="submit" id="regBtn"><i
                  class="fas fa-paper-plane"></i></button>
            </div>
            </form>
            </div>
            
        </div>
</div>


<?php
    include("footer.php");
?>
<script src="assets/js/reg.js" type="text/javaScript"></script>
</body>
</html>