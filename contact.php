<?php  
  include("connection.php");
  include("head.php");
  include("nav.php");
?>
    <div class="container-fluid" id="contact">
      <div class="container">
        <div class="row d-flex text-left justify-content-start">
          <div class="col-12 col-sm-4 title">
            <h2 class="mt-3 pb-2">CONTACT US</h2>
          </div>
        </div>
        <div class="container-fluid flex-column flex-md-row d-flex text-center justify-content-around mt-3" id="contact">
        <div>
            <form id="forma" action="contactCheck.php" method="POST" onsubmit="return formCheck()">
            <div class="form-row col-12">
                <label for="ime">Your Name:</label><br>
                <input type="text" class="form-control" id="ime" name="ime" placeholder="ex. Bruce Wayne"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row col-12 mt-3">
                <label for="email">Email:</label><br>
                <input type="text" class="form-control" id="email" name="email" placeholder="ex. imbatman@gmail.com"><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row col-12 mt-3">
                <label for="email">Subject:</label><br>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="ex. I'm cuirous about..."><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row col-12 mt-3">
                <label for="txtarea">Your message:</label>
                <textarea class="form-control" id="txtarea" name="txtarea" rows="3"></textarea><br>
                <span class="text-center feedbackGood">Good job!</span>
                <span class="text-center feedbackBad">Try again!</span>
            </div>
            <div class="form-row d-flex justify-content-center mt-5 mb-5">
              <button type="submit" class="btn btn-primary btn-lg" id="contactBtn"><i
                  class="fas fa-paper-plane"></i></button>
            </div>
            </form>
            </div>
          <div class="col-12 col-md-5 d-flex justify-content-center">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.340635090182!2d20.481691315407097!3d44.81462467909863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a9609031735%3A0xc17ed71f59ac4725!2sICT%20College!5e0!3m2!1sen!2srs!4v1583974182266!5m2!1sen!2srs"
              width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
              tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
    
<?php
    include("footer.php");
?>
<script src="assets/js/contact.js" type="text/javaScript"></script>

</body>
</html>