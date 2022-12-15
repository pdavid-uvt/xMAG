<?php 
    $itemModalSql = "SELECT * FROM `orders` WHERE `userId`= $userId";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['orderId'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderid; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #A6FFFF;">
                <h5 class="modal-title" id="orderItem<?php echo $orderid; ?>">Detalii comandă</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="container">
                    <div class="row">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table text">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="px-3">Produs</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="text-center">Cantitate</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $mysql = "SELECT * FROM `orderitems` WHERE orderId = $orderid";
                                    $myresult = mysqli_query($conn, $mysql);
                                    while($myrow = mysqli_fetch_assoc($myresult)){
                                        $phoneId = $myrow['phoneId'];
                                        $itemQuantity = $myrow['itemQuantity'];
                                        
                                        $itemsql = "SELECT * FROM `phone` WHERE phoneId = $phoneId";
                                        $itemresult = mysqli_query($conn, $itemsql);
                                        $itemrow = mysqli_fetch_assoc($itemresult);
                                        $phoneName = $itemrow['phoneName'];
                                        $phonePrice = $itemrow['phonePrice'];
                                        $phoneModel = $itemrow['phoneModel'];
                                        $phoneSIM = $itemrow['phoneSIM'];
                                        $phoneDisplay = $itemrow['phoneDisplay'];
                                        $phoneDisplayRes = $itemrow['phoneDisplayRes'];
                                        $phoneStorage = $itemrow['phoneStorage'];
                                        $phoneStorageRAM = $itemrow['phoneStorageRAM'];
                                        $phoneCPUType = $itemrow['phoneCPUType'];
                                        $phoneCPU = $itemrow['phoneCPU'];
                                        $phoneCPUHz = $itemrow['phoneCPUHz'];
                                        $phoneCameraPrincip = $itemrow['phoneCameraPrincip'];
                                        $phoneCameraRes = $itemrow['phoneCameraRes'];
                                        $phoneCameraSelfie = $itemrow['phoneCameraSelfie'];
                                        $phoneBatteryFC = $itemrow['phoneBatteryFC'];
                                        $phoneBatteryWC = $itemrow['phoneBatteryWC'];
                                        $phoneBatteryCap = $itemrow['phoneBatteryCap'];
                                        $phoneOther = $itemrow['phoneOther'];
                                        $phoneOtherColor = $itemrow['phoneOtherColor'];
                                        $phoneOtherWeight = $itemrow['phoneOtherWeight'];
                                        $phoneQuaranty = $itemrow['phoneQuaranty'];
                                        $phoneCategorieId = $itemrow['phoneCategorieId'];

                                        echo '<tr>
                                                <th scope="row">
                                                    <div class="p-2">
                                                    <img src="/xMAG/img/phone-'.$phoneId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> '.$phoneName. '</h5><span class="text-muted font-weight-normal font-italic d-block">' .$phonePrice. ' RON</span>
                                                    </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle text-center"><strong>' .$itemQuantity. '</strong></td>
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
    }
?>