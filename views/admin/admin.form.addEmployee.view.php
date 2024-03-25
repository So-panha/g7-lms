<div class="col-xl-9 col-lg-8 col-md-12">
  <form class="form_add_employee ctm-border-radius shadow-sm grow" action="../../controllers/admin/create.emplyee.controller.php" method="post">
    <h2 style="font-family: 'Times New Roman', Times, serif; font-weight:bold;">Employment details</h2>
    <!-- username -->
    <div class="username">
      <div class="firstname">
        <label for="fname">First name:</label>
        <input type="text" class="fname" id="fname" name="fname" placeholder="Fist name">
      </div>
      <div class="lastname">
        <label for="fname">Last name:</label>
        <input type="text" class="lname" id="lname" name="lname" placeholder="Last name">
      </div>
    </div>
    <!-- password -->
    <label for="password">Password:</label>
    <input type="password" class="password" id="password" name="password" placeholder="Password">
    <!-- email -->
    <label for="email">Email:</label>
    <input type="email" class="email" id="email" name="email" placeholder="Email">
    <div class="checks">
      <input type="checkbox" class="check" id="check" name="send_invite">
      <label class="check-1" for="check1">Send them an invite email so they can log in immediately</label>
    </div>
    <!-- gender -->
    <div class="gender">
      <label for="">Gender:</label>
      <input type="radio" id="gender" name="gender" value="Male">
      <label for="male">Male</label><br>
      <input type="radio" id="gender" name="gender" value="female">
      <label for="female">Female</label><br>
    </div>
    <!-- employee from -->
    <label for="country">Place Born:</label>
    <select class="country" name="country">
      <option value="">Country of employee</option>
      <option value="Cambodia">Cambodia</option>
      <option value="English">English</option>
      <option value="France">France</option>
    </select>
    <!-- role employees -->
    <label for="role">Role:</label>
    <select class="roles" name="role">
      <option value="">Role</option>
      <option value="employee">Employee</option>
      <option value="admin">Admin</option>
      <option value="manager">Manager</option>
    </select>
    <!-- manager -->
    <label for="Manager">Manager</label><br>
    <div class="card-position">
      <div class="flex-row list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="active list-group-item" id="v-pills-home-tabs" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="filterManagers('IT')">IT</a>
        <a class="list-group-item" id="v-pills-home-tabs" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="filterManagers('PL')">PL</a>
        <a class="list-group-item" id="v-pills-home-tabs" data-toggle="pill" href="#v-pills-english" role="tab" aria-controls="v-pills-english" aria-selected="false" onclick="filterManagers('English')">English</a>
        <a class="list-group-item" id="v-pills-home-tabs" data-toggle="pill" href="#v-pills-trainer" role="tab" aria-controls="v-pills-trainer" aria-selected="false" onclick="filterManagers('Training')">Training</a>
        <a class="list-group-item" id="v-pills-home-tabs" data-toggle="pill" href="#v-pills-social" role="tab" aria-controls="v-pills-social" aria-selected="false" onclick="filterManagers('Social Development')">Social Development</a>
      </div>
    </div>

    <select class="manager" name="manager" id="manager">
      <option disabled selected>Manager</option>
    </select>

    <script>
      window.onload = function() {
        filterManagers('IT');
      };

      function filterManagers(position) {
        var managers = <?php echo json_encode($managers); ?>;
        var select = document.getElementById('manager');
        select.innerHTML = '<option disabled selected>Manager</option>';
        for (var i = 0; i < managers.length; i++) {
          if (managers[i]['position_name'] === position) {
            var option = document.createElement('option');
            option.value = managers[i]['user_id'];
            option.textContent = managers[i]['fname'] + ' ' + managers[i]['lname'];
            option.style.textTransform = 'uppercase';
            select.appendChild(option);
          }
        }
      }
    </script>

    <!-- Title job -->
    <label for="position">Position:</label>
    <select class="position" name="position">
      <option value="">Possition</option>
      <option value="1">IT</option>
      <option value="2">PL</option>
      <option value="3">English</option>
      <option value="4">Tranning</option>
      <option value="5">Socail development</option>
    </select>
    <!-- place employee -->
    <label for="place">Place:</label>
    <select class="roles" name="place">
      <option value="">Place</option>
      <option value="phnom Penh">Phnom Penh</option>
      <option value="kampong cham">Kampong Cham</option>
      <option value="prey veng">Prey Veng</option>
      <option value="tbong khmom">Tbong Khmom</option>
      <option value="stung treng">Stung Treng</option>
      <option value="rattanakiri">Rattanakiri</option>
      <option value="mondulkiri">Mondulkiri</option>
      <option value="krate">Krate</option>
      <option value="kampong chhnang">Kampong Chhnamg</option>
      <option value="kandal">Kandal</option>
      <option value="preak sihanouk">Preak Sihanouk</option>
      <option value="kampong speu">Kampong Speu</option>
      <option value="takeo">Takeo</option>
      <option value="koh kong">Koh Kong</option>
      <option value="kep">Kep</option>
      <option value="siem reap">Siem Reap</option>
      <option value="battambang">Battambang</option>
      <option value="preah vihear">Preah Vihear</option>
      <option value="bantey meanchey">Bangtey Meanchey</option>
      <option value="kampong thom">Kampong Thom</option>
      <option value="odor meanchey">Odor Meanchey</option>
      <option value="pailin">Pailin</option>
      <option value="pursat">Pursat</option>
      <option value="svay rieng">Svay rieng</option>
    </select>
    <div class="button">
      <button type="submit" class="btn-form btn-warning" id="update_btn">Add employee</button>
    </div>
  </form>
</div>