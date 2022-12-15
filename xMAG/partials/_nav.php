<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}


/* Bara de navigare */
echo '<nav class="navbar navbar-expand-lg " style="background-color: #171427; font-family: Bahnschrift; font-weight: 1000; font-size: 17px;>
      <a class="navbar-brand"><em>&emsp;</em></a> 
      <a class="navbar-brand" href="index.php"><img src="img/xmag_pic.png" style="width:100px; height:100px></a>
      <a class="navbar-brand"><em>&emsp;</em></a> 
      <a class="navbar-brand" href="index.php"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">ACASĂ <span class="sr-only">(current)</span></a>
          </li>
          <a class="navbar-brand"><em>&#20;</em></a> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              BRAND-URI
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            $sql = "SELECT categorieName, categorieId FROM `categories`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              echo '<a class="dropdown-item" href="viewPhoneList.php?catid=' .$row['categorieId']. '">' .$row['categorieName']. '</a>';
            }
            echo '</div>
          </li>
          <a class="navbar-brand"><em>&#20;</em></a> 
          <li class="nav-item">
            <a class="nav-link" href="viewOrder.php">COMENZILE MELE</a>
          </li>
          <a class="navbar-brand"><em>&#20;</em></a> 
          <li class="nav-item">
            <a class="nav-link" href="about.php">DESPRE NOI</a>
          </li>
          <a class="navbar-brand"><em>&#20;</em></a> 
          <li class="nav-item">
            <a class="nav-link" href="contact.php">CONTACTEAZĂ-NE</a>
          </li>
          
        </ul>
        <form method="get" action="/xMAG/search.php" class="form-inline my-2 my-lg-0 mx-3">
          <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Caută" aria-label="Search" required>
          <button class="btn btn-outline-success my-2 my-sm-0  type="submit"><i class="fas fa-search"></i></button>
        </form>';

        $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`itemQuantity`)'];
        if(!$count) {
          $count = 0;
        }
        echo '<a href="viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart">
    
          <i class="fas fa-shopping-bag"></i>  ' .$count. '</i>
        </button></a>';

        if($loggedin){
          echo '<ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> ' .$username. '</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="partials/_logout.php">Deconectare</a>
              </div>
            </li>
          </ul>
          <a class="navbar-brand"><em>&emsp;</em></a>';
        }
        else {
          echo '
          <button type="button" class="btn btn-success mx-2" data-toggle="modal" data-target="#loginModal">Conectare</button>
          <a class="navbar-brand"><em>&emsp;</em></a> ';
          
        }
            
  echo '</div>
    </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Te-ai înregistrat cu succes!</strong> Acum te poți conecta.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Eroare la crearea contului!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Te-ai autentificat cu succes!</strong> Spor la cumpărături!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Eroare la autentificare!</strong> Nume de utilizator sau parolă incorecte.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>

