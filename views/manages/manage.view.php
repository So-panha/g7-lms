<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
									<div class="card-body">
										<h3 class="text-center" style="font-weight: bold;">Account roles</h3>
									</div>
								</div>
							<?php foreach($allAdmin as $admin) :?>
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">Admin</h4>
										</div>
										<div class="card-body">
											<h5 class="card-text text-center">They can see and do everything like discript about them self or role on this app.</h5>
											<div class="mt-4">
												<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="assets/images/profiles/<?= $admin['picture'] ?>" alt="Richard Wilson" class="img-fluid"></span>
												<a href="#" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">Permissions</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!-- Add Working Weeks -->
		<div class="modal fade" id="addWorkWeek">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<form>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title mb-3">Edit Working Week</h4>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Mon" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Mon">Mon</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Tue" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Tue">Tue</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Wed" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Wed">Wed</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Thu" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Thu">Thu
								</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Fri" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Fri">Fri</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Sat" class="custom-control-input">
								<label class="mb-0 custom-control-label" for="Sat">Sat</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Sun" class="custom-control-input">
								<label class="mb-0 custom-control-label" for="Sun">Sun</label>
							</div>
							<br>
							<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add Working Weeks -->
		<div class="modal fade" id="edit_timedefault">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Company Default</h4>
						<div class="form-group">
							<label>Time Off Allowance</label>
							<input type="text" class="form-control" placeholder="Name" value="25 Days">
						</div>
						<div class="form-group">
							<label>Year Start</label>
							<input type="text" class="form-control datetpicker" placeholder="Year Start" value="01-01-2019">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>		
		