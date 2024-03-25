<!-- header -->
<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item text-center button-6"><a href="admin_employees" class="text-dark">All</a></li>
            <li class="list-group-item text-center button-5 active"><a href="" class="text-white">Add Team</a></li>
        </ul>
    </div>
    <!-- header -->

    <!-- content -->
    <div class="d-flex justify-content-between bg-secondary bg-light mb-3 p-3 ctm-border-radius shadow-sm border-none grow">
        <div class=" p-2 bg-light"><?= "Numbers of Team ".count($mangers) ?></div>
        <button type="button" class="btn btn-theme text-white ctm-border-radius float-right button-1">List Team</button>
    </div>
    <!-- content -->

    <!-- list of team -->
    <div class="d-flex flex-wrap justify-content-center bg-secondary bg-light mb-5 p-3 ctm-border-radius shadow-sm border-none grow ">

    <!-- Create team for show -->
    <?php foreach($mangers as $manger):?>
        <div class="card ctm-border-radius shadow-sm grow flex-fill col-5 mx-3" style="background-color: <?php if($manger['manager'] == 0){echo "lightgrey";} ?>;">
            <div class="card-header">
                <div class="d-inline-block">
                    <h4 class="card-title mb-0"><?= $manger['position_name'] ?><?php if($manger['manager'] == 0){echo " Header";} ?></h4>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Manager <?= $manger['fname']." ".$manger['lname'] ?></h4>
                <a href="#"><span class="avatar" data-toggle="tooltip" data-placement="top" style="width: 50px;height:50px"><img class='rounded-circle' style="width: 100%;height:100%" alt="avatar image" src="assets/images/profiles/<?= $manger['picture'] ?>" class="img-fluid"></span></a>
                <a href="/views_group?id=<?= $manger['user_id']?>" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">Show All Members</a>
            </div>
        </div>
    <?php endforeach; ?>
    <!--list of team  -->
</div>