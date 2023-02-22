<?php  
  include("connection.php");
  include("head.php");
  include("nav.php");
?>

<div class="container-fluid pb-5" id="author">
      <div class="container">
        <div class="row d-flex text-left justify-content-start">
          <div class="col-12 col-sm-4 title">
            <h2 class="mt-3 pb-2">The Author</h2>
          </div>
        </div>
        <div class="flex-column d-flex flex-md-row text-left justify-content-start">
          <div class="flex-column mt-4 d-flex align-items-center text-center justify-content-center col-12 col-md-6">
            <div id="slikaautor">
              <img src="assets/img/self.jpg" id="self" alt="autor">
            </div>
          </div>
          <div class="flex-column mt-4 d-flex align-items-center text-center justify-content-center col-12 col-md-6">
            <div id="aboutTxt">
              <p>
                <h4>My name is Katarina Kalanj.</h4><br>
                I love to learn new things and I'm excited about making more interactive sites in the future. I've
                always loved being creative and challenging myself. I'm a team player and I know how to make your ideas
                a reality.
                I've pursued plenty of hobbies over the years, such as:
                drawing, sculpting, papercraft, being a pokemon master and an all around decent human being.
                Hit me up so we can make something amazing together!
              </p>
            </div>
            <div id="linkovi">
              <a href="https://katarinakalanj.netlify.com/" target="_blank"><button type="button"
                  class="btn btn-dark mt-4">PORTFOLIO</button></a><br>
              <div class="mt-4">
                <a href="sitemap.xml"><i class="fa fa-sitemap" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
    include("footer.php");
?>

</body>
</html>