<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createCategory'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "INSERT INTO `categories` (`categorieName`, `categorieDesc`, `categorieCreateDate`) VALUES ('$name', '$desc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $catId = $conn->insert_id;
        if($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newfilename = "card-".$catId.".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/xMAG/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('Categoria a fost creată cu succes!');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Eroare la crearea categoriei!');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Te rugăm selectează o imagine pentru a fi încărcată!");
                    </script>';
            }
        }
    }
    if(isset($_POST['removeCategory'])) {
        $catId = $_POST["catId"];
        $filename = $_SERVER['DOCUMENT_ROOT']."/xMAG/img/card-".$catId.".jpg";
        $sql = "DELETE FROM `categories` WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCategory'])) {
        $catId = $_POST["catId"];
        $catName = $_POST["name"];
        $catDesc = $_POST["desc"];

        $sql = "UPDATE `categories` SET `categorieName`='$catName', `categorieDesc`='$catDesc' WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Categoria a fost actualizată cu succes!');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Eroare la actualizarea categoriei!');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCatPhoto'])) {
        $catId = $_POST["catId"];
        $check = getimagesize($_FILES["catimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'card-'.$catId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/xMAG/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Imaginea a fost încărcată cu succes!');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Eroare la încărcarea imaginii!');
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