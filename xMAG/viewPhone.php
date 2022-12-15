<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id=title>phone</title>
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

    #cont {
        min-height : 500px;
    }
    </style>

    
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-4" id="cont">
        <div class="row jumbotron" style="background-color: #FFFFFF;">
        <?php
            $phoneId = $_GET['phoneid'];
            $sql = "SELECT * FROM `phone` WHERE phoneId = $phoneId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
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
            $phoneCategorieId = $row['phoneCategorieId'];
            
        ?>

<?php 
        $sql = "SELECT * FROM `categories`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['categorieId'];
          $cat = $row['categorieName'];
          $desc = $row['categorieDesc'];
        }
      ?>

        <script> document.getElementById("title").innerHTML = "<?php echo $phoneName; ?>"; </script> 
        <?php
        echo  '<div class="col-md-4">
                <img src="img/phone-'.$phoneId. '.jpg" width="330px" height="500px">
                <h5><em>&emsp;</em></h5>
                <a class="card-img-top" href="viewPhoneList.php?catid=' . $phoneCategorieId . '"><img src="img/card-'.$phoneCategorieId. '.jpg" alt="Imagini pentru categorie" width="330px" height="150px"></a>
                <h5><em>&emsp;</em></h5>
                <img src="img/xmag_pic.png" width="340px" height="120px">
                <h5><em>&emsp;</em></h5>
                <h6 class="my-1"> Vreau să consult: </h6>
                <div class="mx-4">
                <a href="viewPhoneList.php?catid=' . $phoneCategorieId . '" class="mx-4">
                    <i class="fas fa-qrcode"></i>
                        <span>Oferte produse</span>
                    </a>
                </div>
                <div class="mx-4">
                <a href="index.php" class="mx-4">
                    <i class="fas fa-qrcode"></i>
                        <span>Oferte brand-uri</span>
                    </a>
                </div>
            </div>
            
            
            <div class="col-md-8 my-4">
                <h3 style="color: #1bbca3" ><strong>' . $phoneName . '</strong></h3>
                <h5 style="color: #ff0000">'.$phonePrice. ' RON</h5>
                <h5><em>______________________________________________</em></h5>
                <h4><strong>Caracteristici generale</strong></h4>
                <p class="mb-0">Model: ' .$phoneModel .' </p>
                <p class="mb-0">Sloturi SIM: ' .$phoneSIM .' </p>
                <h5></h5>
                <h4><strong>Ecran</strong></h4>
                <p class="mb-0">Dimensiune ecran: ' .$phoneDisplay .' Inch</p>
                <p class="mb-0">Rezolutie ecran: ' .$phoneDisplayRes .' Pixeli</p>
                <h5></h5>
                <h4><strong>Memorie</strong></h4>
                <p class="mb-0">Capacitate stocare: ' .$phoneStorage .' GB</p>
                <p class="mb-0">Memorie RAM: ' .$phoneStorageRAM .' GB</p>
                <h5></h5>
                <h4><strong>Procesor</strong></h4>
                <p class="mb-0">Tip procesor: ' .$phoneCPUType .' </p>
                <p class="mb-0">Procesor: ' .$phoneCPU .' </p>
                <p class="mb-0">Frecvență: ' .$phoneCPUHz .' Ghz</p>
                <h5></h5>
                <h4><strong>Foto video</strong></h4>
                <p class="mb-0">Camera principală: ' .$phoneCameraPrincip .' </p>
                <p class="mb-0">Rezoluție (Mp): ' .$phoneCameraRes .' </p>
                <p class="mb-0">Selfie Camera: ' .$phoneCameraSelfie .' </p>
                <h5></h5>
                <h4><strong>Baterie</strong></h4>
                <p class="mb-0">Fast Charging: ' .$phoneBatteryFC .' </p>
                <p class="mb-0">Wireless Charging: ' .$phoneBatteryWC .' </p>
                <p class="mb-0">Capacitate baterie: ' .$phoneBatteryCap .' mAh</p>
                <h5></h5>
                <h4><strong>Altele</strong></h4>
                <p class="mb-0">Accesorii: ' .$phoneOther .' </p>
                <p class="mb-0">Culoare: ' .$phoneOtherColor .' </p>
                <p class="mb-0">Greutate: ' .$phoneOtherWeight .' g</p>
                <h5></h5>
                <h4><strong>Garanție</strong></h4>
                <p class="mb-0">Garanție comercială: ' .$phoneQuaranty .' luni</p>
                <h2> </h2>';
                

                if($loggedin){
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE phoneId = '$phoneId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    if($quaExistRows == 0) {
                        echo '<form action="partials/_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="'.$phoneId. '">
                              <button type="submit" name="addToCart" class="btn btn-primary my-2">Adaugă în coș</button>';
                    }else {
                        echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Cumpără</button></a>';
                    }
                }
                else{
                    echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Cumpără</button>';
                }
                echo '</form>
                
            </div>'

            
        ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

    <!-- jQuery, tPopper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>