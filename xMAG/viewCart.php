<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Import Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Coșul meu de cumpărături</title>
    <link rel = "icon" href ="img/xmag_icon.png" type = "image/x-icon">
    <style>
    #cont{
        min-height : 626px;
    }
    </style>
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>
    <?php 
    if($loggedin){
    ?>
    
    <div class="container" id="cont">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-3">
                <h1 style="font-family: Bahnschrift;">Coșul meu de cumpărături</h1>
            </div>
            <div class="col-lg-8">
                <div class="card wish-list mb-3">
                    <table class="table text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Număr</th>
                                <th scope="col">Nume produs</th>
                                <th scope="col">Preț produs</th>
                                <th scope="col">Cantitate</th>
                                <th scope="col">Preț total</th>
                                <th scope="col">
                                    <form action="partials/_manageCart.php" method="POST">
                                        <button name="removeAllItem" class="btn btn-sm btn-outline-danger">Ștergere totală</button>
                                        <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId']; echo $userId ?>">
                                    </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM `viewcart` WHERE `userId`= $userId";
                                $result = mysqli_query($conn, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $phoneId = $row['phoneId'];
                                    $Quantity = $row['itemQuantity'];
                                    $mysql = "SELECT * FROM `phone` WHERE phoneId = $phoneId";
                                    $myresult = mysqli_query($conn, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $phoneName = $myrow['phoneName'];
                                    $phonePrice = $myrow['phonePrice'];
                                    $total = $phonePrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                    echo '<tr>
                                            <td>' . $counter . '</td>
                                            <td>' . $phoneName . '</td>
                                            <td>' . $phonePrice . '</td>
                                            <td>
                                                <form id="frm' . $phoneId . '">
                                                    <input type="hidden" name="phoneId" value="' . $phoneId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" class="text-center" onchange="updateCart(' . $phoneId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td>
                                                <form action="partials/_manageCart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger">Șterge</button>
                                                    <input type="hidden" name="itemId" value="'.$phoneId. '">
                                                </form>
                                            </td>
                                        </tr>';
                                }
                                if($counter==0) {
                                    ?><script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"> <div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <h3><strong>Coșul de cumpărături este gol!</strong></h3><h4>Profită de cele mai tari oferte și umple coșul!</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Vezi produse</a> </div></div></div></div>';</script> <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card wish-list mb-3">
                    <div class="pt-4 border bg-light rounded p-3">
                        <h5 class="mb-3 text-uppercase font-weight-bold text-center">COMANDA DVS.</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">PREȚ TOTAL<span> <?php echo $totalPrice ?> RON</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Taxă de livrare<span> 0 RON </span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                <div>
                                    <strong>TOTAL</strong>
                                </div>
                                <span><strong> <?php echo $totalPrice ?> RON</strong></span>
                            </li>
                        </ul>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Plata la livrare
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Plata online 
                            </label>
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">Plasează comanda</button>
                    </div>
                </div>
         
            </div>
        </div>
    </div>
                                
    <?php 
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Înainte de a plătii trebuie să te <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">loghezi</a></strong></center></font>
        </div></div>';
    }
    ?>
    <?php require 'partials/_checkoutModal.php'; ?>
    <?php require 'partials/_footer.php' ?>
    
    <!-- Import jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }
        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data:$("#frm"+id).serialize(),
                success:function(res) {
                    location.reload();
                } 
            })
        }
    </script>
</body>
</html>