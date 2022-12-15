<?php
include '_dbconnect.php';
session_start();
        /* Adăugare produs în coș.*/
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        /* Verific dacă există produse
        Dacă există trimit mesaj de alertă și reîncarc pagina.
        Dacă nu există, inserez datele produsului în baza de date și practic adaug produsul în coș.
        */
        $existSql = "SELECT * FROM `viewcart` WHERE phoneId = '$itemId' AND `userId`='$userId'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Produsul se află deja în coșul dvs. de cumpărături!');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `viewcart` (`phoneId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$userId', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    /* Ștergere produs din coș.*/
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `phoneId`='$itemId' AND `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Produsul a fost eliminat din coșul dvs. de cumpărături!');
                window.history.back(1);
            </script>";
    }
    /* Ștergerea toate produselor din coș.*/
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Toate produsele au fost eliminate din coșul dvs. de cumpărături!');
                window.history.back(1);
            </script>";
    }
    /* Acțiune plasează comanda.
    Se ompletează câmpurile cu detalii despre adresa de livrare a utilizatorului.
    */
    if(isset($_POST['checkout'])) {
        $amount = $_POST["amount"];
        $address1 = $_POST["address"];
        $address2 = $_POST["address1"];
        $phone = $_POST["phone"];
        $zipcode = $_POST["zipcode"];
        $password = $_POST["password"];
        $address = $address1.", ".$address2;
        
        $passSql = "SELECT * FROM users WHERE id='$userId'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        $userName = $passRow['username'];
        /* Acțiune plasează comanda.
        Dacă parola este corectă se continuă acțiunea.
        */
        if (password_verify($password, $passRow['password'])){ 
            $sql = "INSERT INTO `orders` (`userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderDate`) VALUES ('$userId', '$address', '$zipcode', '$phone', '$amount', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $orderId = $conn->insert_id;
            /* Acțiune plasează comanda.
            Se inserează în tabela cu comenzi detaliile despre comanda plasată.
            */
            if ($result){
                $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
                $addResult = mysqli_query($conn, $addSql);
                while($addrow = mysqli_fetch_assoc($addResult)){
                    $phoneId = $addrow['phoneId'];
                    $itemQuantity = $addrow['itemQuantity'];
                    $itemSql = "INSERT INTO `orderitems` (`orderId`, `phoneId`, `itemQuantity`) VALUES ('$orderId', '$phoneId', '$itemQuantity')";
                    $itemResult = mysqli_query($conn, $itemSql);
                }
                /* Acțiune plasează comanda.
                Se curăță coșul (deoarece comanda a fost deja plasată și se poate vizualiza acum în tabela de comenzi și practic în meniurile aferente).
                Se trimite un mesaj de alertă care ne confirmă că plasarea comenzii a fost făcută cu succes și are un ID unic de urmărire.
                */
                $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
                $deleteresult = mysqli_query($conn, $deletesql);
                echo '<script>alert("XMAG îți mulțumește! ID-ul comenzii tale este ' .$orderId. '.");
                    window.location.href="http://localhost/xMAG/index.php";  
                    </script>';
                    exit();
            }
        } 
        /* Acțiune plasează comanda.
        Dacă parola este incorectă se trimite un mesaj de alertă care ne avertizează de acest lucru.
        Se revine la pagina anterioară.
        */
        else{
            echo '<script>alert("Parolă incorectă! Introdu o parolă corectă!");
                    window.history.back(1);
                    </script>';
                    exit();
        }    
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $phoneId = $_POST['phoneId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `phoneId`='$phoneId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }
    
}
?>