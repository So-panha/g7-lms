<div class="container" style="background-color:purple;width: 60%; border-radius:20px ;height:80vh; ">
  <div class="col" style="color:white;  text-align:center; ">
    <h1>Update User</h1>
  </div>
  <div class="card" style="height:70vh mr-3">
    <div class="card-body">
      <form action="controllers/signup/create_user.controller.php" method="post">
        <div class="row mb-3">
          <div class="col">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
          </div>
          <div class="col">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="startDate" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="startDate" name="startDate" required>
        </div>
        <!-- selecttion -->
        <div class="mb-3">
          <label for="Province" class="form-label" style="margin-top: 15px;">Province</label>
          <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Open this select menu</option>
            <option value="1">Banteay Meanchey </option>
            <option value="2">Battambang</option>
            <option value="3">Kampong Cham</option>
            <option value="4">Kampong Chhnang </option>
            <option value="5">Kampong Speu </option>
            <option value="6">Kampong Thom </option>
            <option value="7">Kampot </option>
            <option value="8">Kandal </option>
            <option value="9">Kep </option>
            <option value="10">Koh Kong </option>
            <option value="11"> Kratié </option>
            <option value="12">Mondulkiri</option>
            <option value="13">Oddar Meanchey </option>
            <option value="14">Pailin </option>
            <option value="15">Phnom Penh </option>
            <option value="16">Preah Sihanouk </option>
            <option value="17">Preah Vihear </option>
            <option value="18">Prey Veng </option>
            <option value="19">Pursat </option>
            <option value="20">Ratanakiri </option>
            <option value="21">Siem Reap</option>
            <option value="22">Stung Treng </option>
            <option value="23">Svay Rieng</option>
            <option value="24">Takéo </option>
            <option value="25">Tboung Khmum</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Salary</label>
          <div class="input-group">
            <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary" required>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-danger mr-3">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div> 