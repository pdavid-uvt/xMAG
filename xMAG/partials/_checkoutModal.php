<!-- Plasează comanda -->

<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Câmpurile cu datele de livrare ale utilizatorului. -->
        <div class="modal-header" style="background-color: #1bbca3;">
            <h5 class="modal-title" id="checkoutModal">Introdu datele tale:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Datele introduse în câmpurile de mai jos sunt inserate în tabela aferentă prin acțiunea post to _manageCart.php . -->
            <form action="partials/_manageCart.php" method="post">
                <div class="form-group">
                    <b><label for="address">Adresă:</label></b>
                    <input class="form-control" id="address" name="address" placeholder="Mun. București, Jud. Ilfov" type="text" required minlength="3" maxlength="500">
                </div>
                <div class="form-group">
                    <b><label for="address1">Adresă livrare:</label></b>
                    <input class="form-control" id="address1" name="address1" placeholder="Str. Principală, Nr. 170, Bl. 10, Sc. A, Ap. 3" type="text">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="phone">Număr telefon:</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon">+40</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="zipcode">Cod poștal:</label></b>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">                    
                    </div>
                </div>
                <div class="form-group">
                    <b><label for="password">Parolă:</label></b>    
                    <input class="form-control" id="password" name="password" placeholder="Introduceți parola" type="password" required minlength="4" maxlength="21" data-toggle="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Renunță</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="btn btn-success">Plasează comanda</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>