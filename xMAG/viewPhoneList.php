<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id="title">Brand-uri</title>
    <link rel = "icon" href ="img/xmag_icon.png" type = "image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <style>
    body {
        background-color: #EFFFFF;
    }
    
    .jumbotron {
        padding: 2rem 1rem;
    }
    #cont {
        min-height : 570px;
    }
    </style>
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categorieName'];
            $catdesc = $row['categorieDesc'];
        }
    ?>
  
    <!-- Detalii categorie -->
    <div class="container my-3" id="cont">
            <h5><em>&emsp;</em></h5>      
            <h2 class="text-center"><span id="catTitle">Produse</span></h2>
            <h5><em>&emsp;</em></h5> 
        <div class="row">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `phone` WHERE phoneCategorieId = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $phoneId = $row['phoneId'];
                $phoneName = $row['phoneName'];
                $phonePrice = $row['phonePrice'];
                $phoneModel = $row['phoneModel'];
				$phoneSIM = $row['phoneSIM'];
				$phoneDisplay = $row['phoneDisplay'];
				$phoneDisplayRes = $row['phoneDisplayRes'];
				$phoneStorage = $row['phoneStorage'];
				$phoneStorageRAM = $row['phoneStorageRAM'];
				$phoneCPUType = $row['phoneCPUType'];
				$phoneCPU = $row['phoneCPU'];
				$phoneCPUHz = $row['phoneCPUHz'];
				$phoneCameraPrincip = $row['phoneCameraPrincip'];
				$phoneCameraRes = $row['phoneCameraRes'];
				$phoneCameraSelfie = $row['phoneCameraSelfie'];
				$phoneBatteryFC = $row['phoneBatteryFC'];
				$phoneBatteryWC = $row['phoneBatteryWC'];
				$phoneBatteryCap = $row['phoneBatteryCap'];
				$phoneOther = $row['phoneOther'];
				$phoneOtherColor = $row['phoneOtherColor'];
				$phoneOtherWeight = $row['phoneOtherWeight'];
				$phoneQuaranty = $row['phoneQuaranty'];
            
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="card" style="width: 17.2rem;">
                            <img src="img/phone-'.$phoneId. '.jpg" class="card-img-top" alt="Imagine pentru produs" width="100px" height="350px">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #1bbca3">' .$phoneName. '</h5>
                                <h6 style="color: #ff0000"> '.$phonePrice. ' RON</h6>
                                <p class="card-text">' .$phoneModel. '</p>   
                                <div class="row justify-content-center">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE phoneId = '$phoneId' AND `userId`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="partials/_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="'.$phoneId. '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Adaugă în coș</button>';
                                    }else {
                                        echo '<a href="viewCart.php"><button class="btn btn-primary mx-2">Cumpără</button></a>';
                                    }
                                }
                                else{
                                    echo '<button class="btn btn-primary mx-2" data-toggle="modal" data-target="#loginModal">Adaugă în coș</button>';
                                }
                            echo '</form>                            
                                <a href="viewPhone.php?phoneid=' . $phoneId . '" class="mx-2"><button class="btn btn-primary">Detalii</button></a> 
                                </div>
                            </div>
                        </div>
                        <h5><em>&emsp;</em></h5> 
                    </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Ne cerem scuze! Pentru această categorie nu există încă produse.</p>
                        <p class="lead"> Revenim cu cele mai bune oferte!</p>
                    </div>
                </div> ';
            }
            ?>
        </div>
    </div>


    <?php require 'partials/_footer.php' ?>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
</body>
</html>