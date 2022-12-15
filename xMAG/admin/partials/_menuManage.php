<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description1 = $_POST["description1"];
        $description2 = $_POST["description2"];
        $description3 = $_POST["description3"];
        $description4 = $_POST["description4"];
        $description5 = $_POST["description5"];
        $description6 = $_POST["description6"];
        $description7 = $_POST["description7"];
        $description8 = $_POST["description8"];
        $description9 = $_POST["description9"];
        $description10 = $_POST["description10"];
        $description11 = $_POST["description11"];
        $description12 = $_POST["description12"];
        $description13 = $_POST["description13"];
        $description14 = $_POST["description14"];
        $description15 = $_POST["description15"];
        $description16 = $_POST["description16"];
        $description17 = $_POST["description17"];
        $description18 = $_POST["description18"];
        $description19 = $_POST["description19"];
        $categoryId = $_POST["categoryId"];
        

        $sql = "INSERT INTO `phone` (`phoneName`, `phonePrice`, `phoneModel`,`phoneSIM`,`phoneDisplay`,`phoneDisplayRes`,`phoneStorage`, `phoneStorageRAM`, `phoneCPUType`,`phoneCPU`,`phoneCPUHz`,`phoneCameraPrincip`,`phoneCameraRes`,`phoneCameraSelfie`,`phoneBatteryFC`,`phoneBatteryWC`,`phoneBatteryCap`,`phoneOther`,`phoneOtherColor`,`phoneOtherWeight`,`phoneQuaranty`, `phoneCategorieId`, `phonePubDate`) VALUES ('$name', '$price', '$description1', '$description2', '$description3', '$description4', '$description5', '$description6', '$description7', '$description8', '$description9', '$description10', '$description11', '$description12', '$description13', '$description14', '$description15', '$description16', '$description17', '$description18', '$description19',  '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $phoneId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'phone-'.$phoneId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/xMAG/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('Produsul a fost adăugat cu succes!');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Eroare la adăugarea produsului!');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Te rugăm selectează o imagine pentru a fi încărcată!");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('Eroare la adăugarea produsului!');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $phoneId = $_POST["phoneId"];
        $sql = "DELETE FROM `phone` WHERE `phoneId`='$phoneId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/xMAG/img/phone-".$phoneId.".jpg";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Produsul a fost șters cu succes!');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('Eroare la ștergerea produsului!');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
        $phoneId = $_POST["phoneId"];
        $phoneName = $_POST["name"];
        $phoneModel = $_POST["desc1"];
        $phoneSIM = $_POST["desc2"];
        $phoneDisplay = $_POST["desc3"];
        $phoneDisplayRes = $_POST["desc4"];
        $phoneStorage = $_POST["desc5"];
        $phoneStorageRAM = $_POST["desc6"];
        $phoneCPUType = $_POST["desc7"];
        $phoneCPU = $_POST["desc8"];
        $phoneCPUHz = $_POST["desc9"];
        $phoneCameraPrincip = $_POST["desc10"];
        $phoneCameraRes = $_POST["desc11"];
        $phoneCameraSelfie = $_POST["desc12"];
        $phoneBatteryFC = $_POST["desc13"];
        $phoneBatteryWC = $_POST["desc14"];
        $phoneBatteryCap = $_POST["desc15"];
        $phoneOther = $_POST["desc16"];
        $phoneOtherColor = $_POST["desc17"];
        $phoneOtherWeight = $_POST["desc18"];
        $phoneQuaranty = $_POST["desc19"];
        $phonePrice = $_POST["price"];
        $phoneCategorieId = $_POST["catId"];

        $sql = "UPDATE `phone` SET `phoneName`='$phoneName', `phonePrice`='$phonePrice', `phoneModel`='$phoneModel',`phoneSIM`='$phoneSIM',`phoneDisplay`='$phoneDisplay',`phoneDisplayRes`='$phoneDisplayRes',`phoneStorage`='$phoneStorage', `phoneStorageRAM`='$phoneStorageRAM', `phoneCPUType`='$phoneCPUType', `phoneCPU`='$phoneCPU', `phoneCPUHz`='$phoneCPUHz', `phoneCameraPrincip`='$phoneCameraPrincip', `phoneCameraRes`='$phoneCameraRes',`phoneCameraSelfie`='$phoneCameraSelfie', `phoneBatteryFC`='$phoneBatteryFC', `phoneBatteryWC`='$phoneBatteryWC', `phoneBatteryCap`='$phoneBatteryCap', `phoneOther`='$phoneOther', `phoneOtherColor`='$phoneOtherColor',`phoneOtherWeight`='$phoneOtherWeight', `phoneQuaranty`='$phoneQuaranty', `phoneCategorieId`='$phoneCategorieId' WHERE `phoneId`='$phoneId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Produsul a fost actualizat cu succes!');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Eroare la actualizarea produsului!');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateItemPhoto'])) {
        $phoneId = $_POST["phoneId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'phone-'.$phoneId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/xMAG/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Imaginea a fost actualizată cu succes!');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Eroare la actualizarea imaginii!');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Te rugăm selectează o imagine pentru a fi încărcată!");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>