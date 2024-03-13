<form class="form_add_employee grow">
    <h2 style="font-family: 'Times New Roman', Times, serif; font-weight:bold;">Employment details</h2>
    <!-- username -->
    <div class="username">
      <div class="firstname">
        <label for="fname">First name:</label>
        <input type="text" class="fname" id="fname" placeholder="Fist name">
      </div>
      <div class="lastname">
        <label for="fname">Last name:</label>
        <input type="text" class="lname" id="lname" placeholder="Last name">
      </div>
    </div>
    <!-- password -->
    <label for="password">Password:</label>
    <input type="password" class="password" id="password" placeholder="Password">
    <!-- email -->
    <label for="email">Email:</label>
      <input type="email" class="email" id="email" placeholder="Email">
    <div class="checks">
      <input type="checkbox" class="check" id="check">
      <label class="check-1" for="check1">Send them an invite email so they can log in immediately</label>
    </div>
    <!-- gender -->
    <div class="gender">
    <label for="">Gender:</label>
      <input type="radio" id="gender" name="male" value="Male">
      <label for="male">Male</label><br>
      <input type="radio" id="gender" name="female" value="female">
      <label for="female">Female</label><br>
    </div>
    <!-- employee from -->
    <label for="country">Place Born:</label>
    <select class="country">
      <option value="">Country of employee</option>
      <option value="Cambodia">Cambodia</option>
      <option value="English">English</option>
      <option value="France">France</option>
    </select>
    <!-- role employees -->
    <label for="role">Role:</label>
    <select class="roles">
      <option value="">Role</option>
      <option value="employee">Employee</option>
      <option value="admin">Admin</option>
      <option value="manager">Manager</option>
      <option value="supermanager">Super Manager</option>
    </select>
    <!-- Title job -->
    <label for="position">Position:</label>
    <select class="position">
      <option value="">Possition</option>
      <option value="it">IT</option>
      <option value="english">English</option>
      <option value="pl">PL</option>
      <option value="tranning">Tranning</option>
      <option value="socail development">Socail development</option>
    </select>
    <!-- place employee -->
    <label for="place">Place:</label>
      <select class="roles">
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
      <button type="submit" class="btn-form">Add employee</button>
    </div>
  </form>