<div class="grow col-xl-9 col-lg-8 col-md-12">
  <form class="form_add_employee bg-white form ctm-border-radius grow" method="POST" action="controllers/employees/employee/update.information.controller.php">

    <?php
    $user = $_SESSION['user'];

    ?>
    <h2 style="font-family: 'Times New Roman', Times, serif; font-weight:bold;">Employment details</h2>

    <input type="hidden" value="<?php echo $user['user_id']; ?>" name="user_id">
    <!-- username -->
    <div class="username">
      <div class="firstname">
        <label for="fname">First Name:</label>
        <input type="text" class="fname" value="<?php echo $user['fname']; ?>" id="fname" name="fname" placeholder="First name">
      </div>
      <div class="lastname">
        <label for="lname">Last Name:</label>
        <input type="text" class="lname" value="<?php echo $user['lname']; ?>" id="lname" name="lname" placeholder="Last name">
      </div>
    </div>
    <!-- password -->
    <label for="password">Password:</label>
    <input type="password" value="<?= $user['password'] ?>" hidden name="oldPwd">
    <input type="password" class="password" value="" id="password" name="newPwd" placeholder="Password">
    <!-- email -->
    <label for="email">Email:</label>
    <input type="email" class="email" value="<?php echo $user['email']; ?>" id="email" name="email" placeholder="Email">
    <!-- sendinvite -->
    <div hidden class="checks">
      <input type="checkbox" class="check" id="check" name="sendInvite" <?php if ($user['sendInvite']) echo 'checked'; ?>>
      <label class="check-1" for="check">Send them an invite email so they can log in immediately</label>
    </div>
    <!-- gender -->
    <div class="gender">
      <label for="gender">Gender:</label>
      <input type="radio" id="male" name="gender" value="Male" <?php if ($user['gender'] === 'Male') echo 'checked'; ?>>
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="Female" <?php if ($user['gender'] === 'Female') echo 'checked'; ?>>
      <label for="female">Female</label><br>
    </div>
    <!-- employee from -->
    <!-- <label  for="country">Place Born:</label> -->
    <select  class="country" name="country">
      <option disabled selected>Country of employee</option>
      <option value="Cambodia" <?php if ($user['country'] === 'Cambodia') echo 'selected'; ?>>Cambodia</option>
      <option value="English" <?php if ($user['country'] === 'English') echo 'selected'; ?>>English</option>
      <option value="France" <?php if ($user['country'] === 'France') echo 'selected'; ?>>France</option>
    </select>
    <!-- role employees -->
      <label hidden for="password">Role:</label>
      <select hidden class="roles" name="role">
        <option disabled selected>Role</option>
        <option value="admin" <?php if ($user['role'] === 'admin') echo 'selected'; ?>>Admin</option>
        <option value="manager" <?php if ($user['role'] === 'manager') echo 'selected'; ?>>Manager</option>
        <option value="employee" <?php if ($user['role'] === 'employee') echo 'selected'; ?>>Employee</option>
      </select>

    <!-- Title job -->
      <label hidden for="position">Position:</label>
      <select hidden class="position" name="position_id">
        <option disabled selected>Position</option>
        <option value="1" <?php if ($user['position_id'] == 1) echo 'selected'; ?>>IT</option>
        <option value="2" <?php if ($user['position_id'] == 2) echo 'selected'; ?>>PL</option>
        <option value="3" <?php if ($user['position_id'] == 3) echo 'selected'; ?>>English</option>
        <option value="4" <?php if ($user['position_id'] == 4) echo 'selected'; ?>>Training</option>
        <option value="5" <?php if ($user['position_id'] == 5) echo 'selected'; ?>>Social Development</option>
      </select>
    <!-- place employee -->
    <label for="place">​Current Place:</label>
    <select class="place" name="place">
      <option disabled selected>Place</option>
      <option value="Phnom Penh" <?php if ($user['place'] === 'Phnom Penh') echo 'selected'; ?>>Phnom Penh</option>
      <option value="Kampong Cham" <?php if ($user['place'] === 'Kampong Cham') echo 'selected'; ?>>Kampong Cham</option>
      <option value="Prey Veng" <?php if ($user['place'] === 'Prey Veng') echo 'selected'; ?>>Prey Veng</option>
      <option value="Tbong Khmom" <?php if ($user['place'] === 'Tbong Khmom') echo 'selected'; ?>>Tbong Khmom</option>
      <option value="Stung Treng" <?php if ($user['place'] === 'Stung Treng') echo 'selected'; ?>>Stung Treng</option>
      <option value="Rattanakiri" <?php if ($user['place'] === 'Rattanakiri') echo 'selected'; ?>>Rattanakiri</option>
      <option value="Mondulkiri" <?php if ($user['place'] === 'Mondulkiri') echo 'selected'; ?>>Mondulkiri</option>
      <option value="Kratie" <?php if ($user['place'] === 'Kratie') echo 'selected'; ?>>Kratie</option>
      <option value="Kampong Chhnang" <?php if ($user['place'] === 'Kampong Chhnang') echo 'selected'; ?>>Kampong Chhnang</option>
      <option value="Kandal" <?php if ($user['place'] === 'Kandal') echo 'selected'; ?>>Kandal</option>
      <option value="Preah Sihanouk" <?php if ($user['place'] === 'Preah Sihanouk') echo 'selected'; ?>>Preah Sihanouk</option>
      <option value="Kampong Speu" <?php if ($user['place'] === 'Kampong Speu') echo 'selected'; ?>>Kampong Speu</option>
      <option value="Takeo" <?php if ($user['place'] === 'Takeo') echo 'selected'; ?>>Takeo</option>
      <option value="Koh Kong" <?php if ($user['place'] === 'Koh Kong') echo 'selected'; ?>>Koh Kong</option>
      <option value="Kep" <?php if ($user['place'] === 'Kep') echo 'selected'; ?>>Kep</option>
      <option value="Siem Reap" <?php if ($user['place'] === 'Siem Reap') echo 'selected'; ?>>Siem Reap</option>
      <option value="Battambang" <?php if ($user['place'] === 'Battambang') echo 'selected'; ?>>Battambang</option>
      <option value="Preah Vihear" <?php if ($user['place'] === 'Preah Vihear') echo 'selected'; ?>>Preah Vihear</option>
      <option value="Banteay Meanchey" <?php if ($user['place'] === 'Banteay Meanchey') echo 'selected'; ?>>Banteay Meanchey</option>
      <option value="Kampong Thom" <?php if ($user['place'] === 'Kampong Thom') echo 'selected'; ?>>Kampong Thom</option>
      <option value="Oddar Meanchey" <?php if ($user['place'] === 'Oddar Meanchey') echo 'selected'; ?>>Oddar Meanchey</option>
      <option value="Pailin" <?php if ($user['place'] === 'Pailin') echo 'selected'; ?>>Pailin</option>
      <option value="Pursat" <?php if ($user['place'] === 'Pursat') echo 'selected'; ?>>Pursat</option>
      <option value="Svay Rieng" <?php if ($user['place'] === 'Svay Rieng') echo 'selected'; ?>>Svay Rieng</option>
    </select>

    <!-- employee manager -->
    <input type="number" hidden name="manager" value="<?=$user['manager']?>">

    <div class="button">
      <button type="submit" class="btn-form btn-warning" id="update_btn">Update</button>
    </div>
  </form>
</div>