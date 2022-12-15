<div class="container-fluid" style="margin-top:98px">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
				<div class="card mb-3">
					<div class="card-header" style="background-color: rgb(111 202 203);">
						Adăugare produs nou
				  	</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Nume: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Model: </label>
								<textarea cols="30" rows="1" class="form-control" name="description1" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Sloturi SIM: </label>
								<textarea cols="30" rows="1" class="form-control" name="description2" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Dimensiune ecran: </label>
								<textarea cols="30" rows="1" class="form-control" name="description3" placeholder="Inch" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Rezolutie ecran: </label>
								<textarea cols="30" rows="1" class="form-control" name="description4" placeholder="Pixeli" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Capacitate stocare: </label>
								<textarea cols="30" rows="1" class="form-control" name="description5" placeholder="GB" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Memorie RAM: </label>
								<textarea cols="30" rows="1" class="form-control" name="description6" placeholder="GB" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Tip procesor: </label>
								<textarea cols="30" rows="1" class="form-control" name="description7" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Procesor: </label>
								<textarea cols="30" rows="1" class="form-control" name="description8" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Frecventa: </label>
								<textarea cols="30" rows="1" class="form-control" name="description9" placeholder="Ghz" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Camera principală: </label>
								<textarea cols="30" rows="1" class="form-control" name="description10" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Rezoluție (Mp): </label>
								<textarea cols="30" rows="1" class="form-control" name="description11" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Selfie Camera: </label>
								<textarea cols="30" rows="1" class="form-control" name="description12" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Fast Charging: </label>
								<textarea cols="30" rows="1" class="form-control" name="description13" placeholder="Da/Nu" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Wireless Charging: </label>
								<textarea cols="30" rows="1" class="form-control" name="description14" placeholder="Da/Nu" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Capacitate baterie: </label>
								<textarea cols="30" rows="1" class="form-control" name="description15" placeholder="mAh" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Accesorii: </label>
								<textarea cols="30" rows="1" class="form-control" name="description16" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Culoare: </label>
								<textarea cols="30" rows="1" class="form-control" name="description17" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Greutate: </label>
								<textarea cols="30" rows="1" class="form-control" name="description18" placeholder="g" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Garanție comercială: </label>
								<textarea cols="30" rows="1" class="form-control" name="description19" placeholder="luni" required></textarea>
							</div>
                            <div class="form-group">
								<label class="control-label">Pret: </label>
								<input type="number" class="form-control" name="price" required min="1">
							</div>	
							<div class="form-group">
								<label class="control-label">Categorie: </label>
								<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								<option hidden disabled selected value>None</option>
                                <?php
                                    $catsql = "SELECT * FROM `categories`"; 
                                    $catresult = mysqli_query($conn, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['categorieId'];
                                        $catName = $row['categorieName'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
								</select>
							</div>
							
							<div class="form-group">
								<label for="image" class="control-label">Imagine</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">A se încărca un fișier .jpg!</small>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="mx-auto">
								<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Adăugare produs </button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(111 202 203);">
								<tr>
									<th class="text-center" style="width:7%;">ID Categorie</th>
									<th class="text-center">Imagine produs</th>
									<th class="text-center" style="width:58%;">Specificații produs</th>
									<th class="text-center" style="width:18%;">Acțiuni element produs</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $sql = "SELECT * FROM `phone`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
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
                                    $phoneCategorieId = $row['phoneCategorieId'];

                                    echo '<tr>
                                            <td class="text-center">' .$phoneCategorieId. '</td>
                                            <td>
                                                <img src="/xMAG/img/phone-'.$phoneId. '.jpg" alt="Imagine pentru produs" width="150px" height="150px">
                                            </td>
                                            <td>
                                                <p>Nume: <b>' .$phoneName. '</b></p>
                                                <p>Model: <b class="truncate">' .$phoneModel. '</b></p>
												<p>Sloturi SIM: <b class="truncate">' .$phoneSIM. '</b></p>
												<p>Dimensiune ecran: <b class="truncate">' .$phoneDisplay. '</b></p>
												<p>Rezolutie ecran: <b class="truncate">' .$phoneDisplayRes. '</b></p>
												<p>Capacitate stocare: <b class="truncate">' .$phoneStorage. '</b></p>
												<p>Memorie RAM: <b class="truncate">' .$phoneStorageRAM. '</b></p>
												<p>Tip procesor: <b class="truncate">' .$phoneCPUType. '</b></p>
												<p>Procesor: <b class="truncate">' .$phoneCPU. '</b></p>
												<p>Frecvență: <b class="truncate">' .$phoneCPUHz. '</b></p>
												<p>Camera principală: <b class="truncate">' .$phoneCameraPrincip. '</b></p>
												<p>Rezoluție (Mp): <b class="truncate">' .$phoneCameraRes. '</b></p>
												<p>Selfie Camera: <b class="truncate">' .$phoneCameraSelfie. '</b></p>
												<p>Fast Charging: <b class="truncate">' .$phoneBatteryFC. '</b></p>
												<p>Wireless Charging: <b class="truncate">' .$phoneBatteryWC. '</b></p>
												<p>Capacitate baterie: <b class="truncate">' .$phoneBatteryCap. '</b></p>
												<p>Accesorii: <b class="truncate">' .$phoneOther. '</b></p>
												<p>Culoare: <b class="truncate">' .$phoneOtherColor. '</b></p>
												<p>Greutate: <b class="truncate">' .$phoneOtherWeight. '</b></p>
												<p>Garanție comercială: <b class="truncate">' .$phoneQuaranty. '</b></p>
                                                <p>Preț: <b>' .$phonePrice. '</b></p>
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:150px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$phoneId. '">Editează</button>
													<form action="partials/_menuManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Șterge</button>
														<input type="hidden" name="phoneId" value="'.$phoneId. '">
													</form>
												</div>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $phonesql = "SELECT * FROM `phone`";
    $phoneResult = mysqli_query($conn, $phonesql);
    while($phoneRow = mysqli_fetch_assoc($phoneResult)){
        $phoneId = $phoneRow['phoneId'];
        $phoneName = $phoneRow['phoneName'];
        $phonePrice = $phoneRow['phonePrice'];
        $phoneCategorieId = $phoneRow['phoneCategorieId'];
		$phoneModel = $phoneRow['phoneModel'];
		$phoneSIM = $phoneRow['phoneSIM'];
		$phoneDisplay = $phoneRow['phoneDisplay'];
		$phoneDisplayRes = $phoneRow['phoneDisplayRes'];
		$phoneStorage = $phoneRow['phoneStorage'];
		$phoneStorageRAM = $phoneRow['phoneStorageRAM'];
		$phoneCPUType = $phoneRow['phoneCPUType'];
		$phoneCPU = $phoneRow['phoneCPU'];
		$phoneCPUHz = $phoneRow['phoneCPUHz'];
		$phoneCameraPrincip = $phoneRow['phoneCameraPrincip'];
		$phoneCameraRes = $phoneRow['phoneCameraRes'];
		$phoneCameraSelfie = $phoneRow['phoneCameraSelfie'];
		$phoneBatteryFC = $phoneRow['phoneBatteryFC'];
		$phoneBatteryWC = $phoneRow['phoneBatteryWC'];
		$phoneBatteryCap = $phoneRow['phoneBatteryCap'];
		$phoneOther = $phoneRow['phoneOther'];
		$phoneOtherColor = $phoneRow['phoneOtherColor'];
		$phoneOtherWeight = $phoneRow['phoneOtherWeight'];
		$phoneQuaranty = $phoneRow['phoneQuaranty'];
        $phoneCategorieId = $phoneRow['phoneCategorieId'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $phoneId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $phoneId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateItem<?php echo $phoneId; ?>">ID Produs: <?php echo $phoneId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Imagine</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">A se încărca un fișier .jpg!</small>
					<input type="hidden" id="phoneId" name="phoneId" value="<?php echo $phoneId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Actualizează imagine</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/xMAG/img/phone-<?php echo $phoneId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Nume: </label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $phoneName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Preț: </label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $phonePrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">ID Categorie: </label></b>
                	<input class="form-control" id="catId" name="catId" value="<?php echo $phoneCategorieId; ?>" type="number" min="1" required>
				</div>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Model: </label></b>
                <textarea class="form-control" id="desc1" name="desc1" rows="1" required minlength="1"><?php echo $phoneModel; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Sloturi SIM: </label></b>
                <textarea class="form-control" id="desc2" name="desc2" rows="1" required minlength="1"><?php echo $phoneSIM; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Dimensiune ecran: </label></b>
                <textarea class="form-control" id="desc3" name="desc3" rows="1" required minlength="1"><?php echo $phoneDisplay; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Rezolutie ecran: </label></b>
                <textarea class="form-control" id="desc4" name="desc4" rows="1" required minlength="1"><?php echo $phoneDisplayRes; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Capacitate stocare: </label></b>
                <textarea class="form-control" id="desc5" name="desc5" rows="1" required minlength="1"><?php echo $phoneStorage; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Memorie RAM: </label></b>
                <textarea class="form-control" id="desc6" name="desc6" rows="1" required minlength="1"><?php echo $phoneStorageRAM; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Tip procesor: </label></b>
                <textarea class="form-control" id="desc7" name="desc7" rows="1" required minlength="1"><?php echo $phoneCPUType; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Procesor: </label></b>
                <textarea class="form-control" id="desc8" name="desc8" rows="1" required minlength="1"><?php echo $phoneCPU; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Frecvență: </label></b>
                <textarea class="form-control" id="desc9" name="desc9" rows="1" required minlength="1"><?php echo $phoneCPUHz; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Camera principală: </label></b>
                <textarea class="form-control" id="desc10" name="desc10" rows="1" required minlength="1"><?php echo $phoneCameraPrincip; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Rezoluție (Mp): </label></b>
                <textarea class="form-control" id="desc11" name="desc11" rows="1" required minlength="1"><?php echo $phoneCameraRes; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Selfie Camera: </label></b>
                <textarea class="form-control" id="desc12" name="desc12" rows="1" required minlength="1"><?php echo $phoneCameraSelfie; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Fast Charging: </label></b>
                <textarea class="form-control" id="desc13" name="desc13" rows="1" required minlength="1"><?php echo $phoneBatteryFC; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Wireless Charging: </label></b>
                <textarea class="form-control" id="desc14" name="desc14" rows="1" required minlength="1"><?php echo $phoneBatteryWC; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Capacitate baterie: </label></b>
                <textarea class="form-control" id="desc15" name="desc15" rows="1" required minlength="1"><?php echo $phoneBatteryCap; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Accesorii: </label></b>
                <textarea class="form-control" id="desc16" name="desc16" rows="1" required minlength="1"><?php echo $phoneOther; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Culoare: </label></b>
                <textarea class="form-control" id="desc17" name="desc17" rows="1" required minlength="1"><?php echo $phoneOtherColor; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Greutate: </label></b>
                <textarea class="form-control" id="desc18" name="desc18" rows="1" required minlength="1"><?php echo $phoneOtherWeight; ?></textarea>
            </div>
			<div class="text-left my-2">
                <b><label for="desc">Garanție comercială: </label></b>
                <textarea class="form-control" id="desc19" name="desc19" rows="1" required minlength="1"><?php echo $phoneQuaranty; ?></textarea>
            </div>
            <input type="hidden" id="phoneId" name="phoneId" value="<?php echo $phoneId; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Actualizează</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>