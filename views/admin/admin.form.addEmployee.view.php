<form class="form_add_employee grow" method="POST" action="controllers/admin/create.emplyee.controller.php">
  <h2>Employment details</h2>
  <!-- username -->
  <div class="username">
    <input type="text" class="fname" id="fname" name="fname" placeholder="First name" require>
    <input type="text" class="lname" id="lname" name="lname" placeholder="Last name" require>
  </div>
  <!-- password -->
  <input type="password" class="password" id="password" name="password" placeholder="Password" require>
  <!-- email -->
  <input type="email" class="email" id="email" name="email" placeholder="Email" require>
  <div class="checks">
    <input type="checkbox" class="check" id="check" name="send_invite">
    <label class="check-1" for="check1">Send them an invite email so they can log in immediately</label>
  </div>
  <!-- gender -->
  <div class="gender">
    <input type="radio" id="male" name="gender" value="Male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label><br>
  </div>
  <!-- employee from -->
  <select class="country" name="country">
    <option disabled>Country of employee</option>
    <option value="Cambodia">Cambodia</option>
    <option value="English">English</option>
    <option value="France">France</option>
  </select>
  <!-- role employees -->
  <select class="roles" name="role">
    <option disabled selected>Role</option>
    <option value="manager">Manager</option>
    <option value="employee">Employee</option>
  </select>
  <!-- Title job -->
  <select class="position" name="position">
    <option disabled selected>Positions</option>
    <?php for ($i = 0; $i < count($positions); $i++) : ?>
      <option value="<?= $positions[$i]['position_id'] ?>"><?= $positions[$i]['position_name'] ?></option>
    <?php endfor; ?>
  </select>

  <!-- place employee -->
  <select class="manager" name="manager">
    <option disabled selected>Manager</option>
    <?php for ($i = 0; $i < count($managers); $i++) : ?>
      <option value="<?= $managers[$i]['user_id'] ?>"><?= $managers[$i]['fname'] . " " . $managers[$i]['lname'] ?></option>
    <?php endfor; ?>
  </select>
  <input type="number" class="amount" id="amount" name="amount" placeholder="Amount">
  <select class="place" name="place">
    <option selected>Place</option>
    <option value="Phnom Penh">Phnom Penh</option>
    <option value="Kampong Cham">Kampong Cham</option>
    <option value="Prey Veng">Prey Veng</option>
    <option value="Tbong Khmom">Tbong Khmom</option>
    <option value="Stung Treng">Stung Treng</option>
    <option value="Rattanakiri">Rattanakiri</option>
    <option value="Mondulkiri">Mondulkiri</option>
    <option value="Kratie">Kratie</option>
    <option value="Kampong Chhnang">Kampong Chhnang</option>
    <option value="Kandal">Kandal</option>
    <option value="Preah Sihanouk">Preah Sihanouk</option>
    <option value="Kampong Speu">Kampong Speu</option>
    <option value="Takeo">Takeo</option>
    <option value="Koh Kong">Koh Kong</option>
    <option value="Kep">Kep</option>
    <option value="Siem Reap">Siem Reap</option>
    <option value="Battambang">Battambang</option>
    <option value="Preah Vihear">Preah Vihear</option>
    <option value="Banteay Meanchey">Banteay Meanchey</option>
    <option value="Kampong Thom">Kampong Thom</option>
    <option value="Oddar Meanchey">Oddar Meanchey</option>
    <option value="Pailin">Pailin</option>
    <option value="Pursat">Pursat</option>
    <option value="Svay Rieng">Svay Rieng</option>
  </select>
  <div class="button">
    <button type="submit" class="btn btn-warning">Add employee</button>
  </div>
</form>