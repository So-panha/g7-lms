<form class="form_add_employee grow" method="POST" action="controllers/employees/manager/update.infomation.member.controller.php">
  <?php
  $member = inforOfMember($memberId);
  ?>
  <h2>Employment details</h2>

  <input type="hidden" value="<?php echo $member['user_id']; ?>" name="user_id">
  <!-- username -->
  <div class="username">
    <input type="text" class="fname" value="<?php echo $member['fname']; ?>" id="fname" name="fname" placeholder="First name">
    <input type="text" class="lname" value="<?php echo $member['lname']; ?>" id="lname" name="lname" placeholder="Last name">
  </div>
  <!-- password -->
  <input type="password" class="password" value="<?php echo $member['password']; ?>" id="password" name="password" placeholder="Password">
  <!-- email -->
  <input type="email" class="email" value="<?php echo $member['email']; ?>" id="email" name="email" placeholder="Email">
  <!-- sendinvite -->
  <div class="checks">
    <input type="checkbox" class="check" id="check" name="sendInvite" <?php if ($member['sendInvite']) echo 'checked'; ?>>
    <label class="check-1" for="check">Send them an invite email so they can log in immediately</label>
  </div>
  <!-- gender -->
  <div class="gender">
    <input type="radio" id="male" name="gender" value="male" <?php if ($member['gender'] === 'Male') echo 'checked'; ?>>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female" <?php if ($member['gender'] === 'Female') echo 'checked'; ?>>
    <label for="female">Female</label><br>
  </div>
  <!-- employee from -->
  <select class="country" name="country">
    <option disabled selected>Country of employee</option>
    <option value="Cambodia" <?php if ($member['country'] === 'Cambodia') echo 'selected'; ?>>Cambodia</option>
    <option value="English" <?php if ($member['country'] === 'English') echo 'selected'; ?>>English</option>
    <option value="France" <?php if ($member['country'] === 'France') echo 'selected'; ?>>France</option>
  </select>
  <!-- role employees -->
  <select class="roles" name="role">
    <option disabled selected>Role</option>
    <option value="admin" <?php if ($member['role'] === 'admin') echo 'selected'; ?>>Admin</option>
    <option value="supermanager" <?php if ($member['role'] === 'supermanager') echo 'selected'; ?>>Super Manager</option>
    <option value="manager" <?php if ($member['role'] === 'manager') echo 'selected'; ?>>Manager</option>
    <option value="employee" <?php if ($member['role'] === 'employee') echo 'selected'; ?>>Employee</option>
  </select>
  <!-- Title job -->
  <select class="position" name="position_id">
    <option disabled selected>Position</option>
    <option value="1" <?php if ($member['position_name']) echo 'selected'; ?>>IT</option>
    <option value="2" <?php if ($member['position_name']) echo 'selected'; ?>>PL</option>
    <option value="3" <?php if ($member['position_name']) echo 'selected'; ?>>English</option>
    <option value="4" <?php if ($member['position_name']) echo 'selected'; ?>>Training</option>
    <option value="5" <?php if ($member['position_name']) echo 'selected'; ?>>Social Development</option>
  </select>
  <!-- place employee -->
  <select class="place" name="place">
    <option disabled selected>Place</option>
    <option value="Phnom Penh" <?php if ($member['place'] === 'Phnom Penh') echo 'selected'; ?>>Phnom Penh</option>
    <option value="Kampong Cham" <?php if ($member['place'] === 'Kampong Cham') echo 'selected'; ?>>Kampong Cham</option>
    <option value="Prey Veng" <?php if ($member['place'] === 'Prey Veng') echo 'selected'; ?>>Prey Veng</option>
    <option value="Tbong Khmom" <?php if ($member['place'] === 'Tbong Khmom') echo 'selected'; ?>>Tbong Khmom</option>
    <option value="Stung Treng" <?php if ($member['place'] === 'Stung Treng') echo 'selected'; ?>>Stung Treng</option>
    <option value="Rattanakiri" <?php if ($member['place'] === 'Rattanakiri') echo 'selected'; ?>>Rattanakiri</option>
    <option value="Mondulkiri" <?php if ($member['place'] === 'Mondulkiri') echo 'selected'; ?>>Mondulkiri</option>
    <option value="Kratie" <?php if ($member['place'] === 'Kratie') echo 'selected'; ?>>Kratie</option>
    <option value="Kampong Chhnang" <?php if ($member['place'] === 'Kampong Chhnang') echo 'selected'; ?>>Kampong Chhnang</option>
    <option value="Kandal" <?php if ($member['place'] === 'Kandal') echo 'selected'; ?>>Kandal</option>
    <option value="Preah Sihanouk" <?php if ($member['place'] === 'Preah Sihanouk') echo 'selected'; ?>>Preah Sihanouk</option>
    <option value="Kampong Speu" <?php if ($member['place'] === 'Kampong Speu') echo 'selected'; ?>>Kampong Speu</option>
    <option value="Takeo" <?php if ($member['place'] === 'Takeo') echo 'selected'; ?>>Takeo</option>
    <option value="Koh Kong" <?php if ($member['place'] === 'Koh Kong') echo 'selected'; ?>>Koh Kong</option>
    <option value="Kep" <?php if ($member['place'] === 'Kep') echo 'selected'; ?>>Kep</option>
    <option value="Siem Reap" <?php if ($member['place'] === 'Siem Reap') echo 'selected'; ?>>Siem Reap</option>
    <option value="Battambang" <?php if ($member['place'] === 'Battambang') echo 'selected'; ?>>Battambang</option>
    <option value="Preah Vihear" <?php if ($member['place'] === 'Preah Vihear') echo 'selected'; ?>>Preah Vihear</option>
    <option value="Banteay Meanchey" <?php if ($member['place'] === 'Banteay Meanchey') echo 'selected'; ?>>Banteay Meanchey</option>
    <option value="Kampong Thom" <?php if ($member['place'] === 'Kampong Thom') echo 'selected'; ?>>Kampong Thom</option>
    <option value="Oddar Meanchey" <?php if ($member['place'] === 'Oddar Meanchey') echo 'selected'; ?>>Oddar Meanchey</option>
    <option value="Pailin" <?php if ($member['place'] === 'Pailin') echo 'selected'; ?>>Pailin</option>
    <option value="Pursat" <?php if ($member['place'] === 'Pursat') echo 'selected'; ?>>Pursat</option>
    <option value="Svay Rieng" <?php if ($member['place'] === 'Svay Rieng') echo 'selected'; ?>>Svay Rieng</option>
  </select>
  <div class="button">
    <button type="submit" class="btn btn-warning">Update</button>
  </div>
</form>