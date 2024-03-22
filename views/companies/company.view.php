<div class="col-xl-9 col-lg-8 col-md-12">

	<div class="row">
		<div class="col-md-12 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h3 class="card-title mb-0" style="font-weight: bold;font-family:'Times New Roman', Times, serif">
						Information of the organization
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<img class="img-thumbnail" src="assets/images/profiles/pnc.png" alt="PNC_logo" style="width: 200px;height:200px">
						</div>
						<div class="col-md-5">
							<p><span class="text-primary">Company Name : </span>PNC (Passerelles numériques Cambodia)</p>
							<p style="margin-top: 3%;"><span class="text-primary">Incorporation Date : </span>07 JAN 2005</p>
							<p style="margin-top: 3%;"><span class="text-primary">Company Branch : </span>4</p>
							<p style="margin-top: 3%;"><span class="text-primary">Tell : </span>023 995 500</p>
							<p style="margin-top: 3%;"><span class="text-primary">Email : </span>cambodia@passerellesnumeriques.org</p>
						</div>
						<div class="col-md-3">
							<p>
								<span class="text-primary">Address:</span><br>

								BP 511,Street 371
								<br>Phum Tropeang Chhuk<br>
								(Borey Sorla) Sangtak Phnom Penh
							</p>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<div class="d-inline-block">
						<h4 class="card-title mb-0" style="font-weight: bold;font-family:'Times New Roman', Times, serif">Members of header</h4>
					</div>
				</div>
				<div class="card-body">
					<h4 class="card-title">Members</h4>
					<?php for($i = 0; $i < count($managers); $i++) :?>
						<a href="#"><span class="avatar" data-toggle="tooltip" data-placement="top" style="width: 50px;height:50px"><img class='rounded-circle' style="width: 100%;height:100%" alt="<?=$managers[$i]['fname']?>" src="../../assets/images/profiles/<?=$managers[$i]['picture']?>" class="img-fluid" ></span></a>
					<?php endfor; ?>
				</div>
			</div>
		</div>
		<div class="col-md-6 d-flex">
			<div class="card shadow-sm grow ctm-border-radius flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Overview </h4>
					<p href="/admin_employees_team" class="float-right text-primary">Manage Teams</p>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-6 text-center">
							<h5 class="btn btn-outline-primary mt-3"><b><?= count($managers) ?></b></h5>
							<p class="mb-3">Teams</p>
						</div>
						<div class="col-md-6 col-6 text-center">
							<h5 class="btn btn-outline-primary mt-3"><b><?= count($employees) ?></b></h5>
							<p class="mb-3">People</p>
						</div>
					</div>
					<?php if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role']=='manager' ) :?>
					<div class="text-center">
						<a href="/admin_employees" class="btn btn-theme text-white ctm-border-radius mt-2 button-1"> People Directory</a>
					</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>
</div>
<!--/Content-->

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!--  add office The Modal -->
<div class="modal fade" id="addOffice">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Create a New Office</h4>
				<p>Offices allow you to group people by location. Offices can subscribe to different public holidays, helping you to localize people's time off allowances.</p>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Name">
				</div>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editOffice">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Edit Office</h4>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Office Name">
				</div>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme text-white ctm-border-radius float-right button-1">Save</button>
			</div>
		</div>
	</div>
</div>

<!--Delete The Modal -->
<div class="modal fade" id="delete">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
				<button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>