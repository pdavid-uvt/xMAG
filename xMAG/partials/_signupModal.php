  <!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(111 202 203);">
            <h5 class="modal-title" id="signupModal">Înregistrare cont nou</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleSignup.php" method="post">
              <div class="form-group">
                  <b><label for="username">Nume de utilizator</label></b>
                  <input class="form-control" id="username" name="username" placeholder="Alege un nume de utilizator unic" type="text" required minlength="3" maxlength="20">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <b><label for="firstName">Nume:</label></b>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nume" required>
                </div>
                <div class="form-group col-md-6">
                  <b><label for="lastName">Prenume:</label></b>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Prenume" required>
                </div>
              </div>
              <div class="form-group">
                  <b><label for="email">Adresa de email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Introduceți o adresă de email validă" required>
              </div>
              <div class="form-group">
                <b><label for="phone">Număr telefon:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+40</span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Introduceți un număr de telefon valid" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="text-left my-2">
                  <b><label for="password">Parola:</label></b>
                  <input class="form-control" id="password" name="password" placeholder="Introduceți parola" type="password" required data-toggle="password" minlength="8" maxlength="20">
              </div>
              <div class="text-left my-2">
                  <b><label for="password1">Reintroducere parola:</label></b>
                  <input class="form-control" id="cpassword" name="cpassword" placeholder="Reintroduceți parola" type="password" required data-toggle="password" minlength="8" maxlength="20">
              </div>
              <button type="submit" class="btn btn-success">Înregistrare</button>
            </form>
            <p class="mb-0 mt-1">Ai deja un cont? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Conectare</a>.</p>
          </div>
        </div>
      </div>
    </div>
