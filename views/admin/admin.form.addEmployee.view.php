<form class="form_add_employee grow" method="POST" action="controllers/admin/create.emplyee.controller.php">
  <h2>Employment details</h2>
  <!-- username -->
  <div class="username">
    <input type="text" class="fname" name="fname" id="fname" placeholder="First name">
    <input type="text" class="lname" name="lname" id="lname" placeholder="Last name">
  </div>
  <!-- email -->
  <input type="email" class="email" name="email" id="email" placeholder="Email">
  <div class="checks">
    <input type="checkbox" class="check" name="send_invite" id="check">
    <label class="check-1" for="check1">Send them an invite email so they can log in immediately</label>
  </div>
  <!-- employee from -->
  <select class="country" name="country">
    <option value="">Country of employee</option>
    <option value="Cambodia">Cambodia</option>
    <option value="English">English</option>
    <option value="France">France</option>
  </select>
  <!-- role employees -->
  <select class="roles" name="role">
    <option value="">Role</option>
    <option value="employee">Employee</option>
    <option value="admin">Admin</option>
    <option value="manager">Manager</option>
    <option value="supermanager">Super Manager</option>
  </select>
  <!-- Title job -->
  <select class="position" name="position">
    <option value="">Position</option>
    <option value="it">IT</option>
    <option value="english">English</option>
    <option value="pl">PL</option>
    <option value="training">Training</option>
    <option value="social development">Social Development</option>
  </select>
  <!-- place employee -->
  <input type="number" class="amount" name="amount" id="amount" placeholder="Amount">
  <select class="places" name="place">
    <option value="">Place</option>
    <option value="phnom Penh">Phnom Penh</option>
    <option value="kampong cham">Kampong Cham</option>
    <option value="prey veng">Prey Veng</option>
    <option value="tbong khmom">Tbong Khmom</option>
    <!-- other options -->
  </select>
  <div class="btnAdd">
    <button type="submit" class="btn btn-warning mt-2">Add Employee</button>
  </div>
</form>