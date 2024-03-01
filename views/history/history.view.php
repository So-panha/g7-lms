<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
        <div class="flex-row list-group list-group-horizontal-lg m-3 justify-content-between align-items-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <!-- List group -->
            <p style="text-transform: uppercase;">start leave</p>
            <p style="text-transform: uppercase;">end leave</p>
            <p style="text-transform: uppercase;">status</p>
            <p style="text-transform: uppercase;">date request</p>
            <p style="text-transform: uppercase;">action</p>
        </div>
    </div>
    <?php
    $user = $_SESSION['user'];
    $historyRequest = getHistoryRequest();
    foreach ($historyRequest as $history) {
        if ($user['user_id'] === $history['user_id']) {
    ?>
            <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
                <div class="flex-row list-group list-group-horizontal-lg m-3 justify-content-between align-items-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- List group -->
                    <input type="hidden" value="<?php echo $history['type_leave']; ?>">
                    <p><?php echo $history['start_leave']; ?></p>
                    <p><?php echo $history['end_leave']; ?></p>
                    <p><?php echo $history['checked']; ?></p>
                    <p><?php echo $history['date_request']; ?></p>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>