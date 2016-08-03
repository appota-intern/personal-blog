<?php
 echo '<h3>Xin chào</h3> ' . $_SESSION['username'] . '! ';
?>
<!--<a href="logout">Logout <span class="badge">logout</span></a><br>-->
<form action="logout" method="post"><input class="btn btn-primary" type="submit" value="Log out"></form><br />
 

 <div class="container-fluid text-center bg-grey">
  <h2>Portfolio</h2>
  <h4>What we have created</h4>
  <div class="row text-center">
    <div class="col-sm-3">
      <div class="thumbnail">
        <img src="../public/images/3.jpg" alt="Paris">
        <p><strong>Paris</strong></p>
        <p>Yes, we built Paris</p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="thumbnail">
        <img src="../public/images/4.jpg" alt="New York">
        <p><strong>New York</strong></p>
        <p>We built New York</p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="thumbnail">
        <img src="../public/images/3.jpg" alt="San Francisco">
        <p><strong>San Francisco</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="thumbnail">
        <img src="../public/images/4.jpg" alt="San Francisco">
        <p><strong>San Francisco</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>
</div>

