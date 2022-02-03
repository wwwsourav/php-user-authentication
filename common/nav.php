<nav class="navbar navbar-light bg-warning" style="margin-top: 15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="show.php">Show data</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li>
        <?php
       // print_r($_)+
        if (isset($_SESSION['id'])) {
          $name=explode(' ', $_SESSION['name']);
          echo "<span class='glyphicon glyphicon-user'>Welcome:&nbsp".strtoupper($name[0]);
        }
        else{
        ?>

        <a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
      <?php } ?>
      </li>

      <li>
        <?php
        if (isset($_SESSION['id'])) {?>
          
        
      
        <a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
        <?php } else{?>
      </li>

      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <?php } ?>
      </li>
    </ul>
  </div>
</nav>