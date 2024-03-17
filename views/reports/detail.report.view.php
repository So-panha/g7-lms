<table class="table custom-table col-xl-9 col-lg-8 col-md-12 grow">
    <thead>
        <tr>
            <th>Date Request</th>
            <th>Date Leave</th>
            <th>Date Comback</th>
            <th>Reason</th>
            <th>Type Leave</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $report) {
        ?>
            <tr>
                <td>
                    <h2><?php echo strtoupper($report['date_request']) ?><h2>
                </td>
                <td>
                    <h2><?php echo strtoupper($report['start_leave']) ?><h2>
                </td>
                <td>
                    <h2><?php echo strtoupper($report['end_leave']) ?><h2>
                </td>
                <td>
                    <h2><?php echo strtoupper($report['reason']) ?><h2>
                </td>
                <td>
                    <?php
                    $typeLeaves = typeLeave();
                    foreach ($typeLeaves as $typeLeave) {
                        if ($typeLeave['type_leave_id'] == $report['type_leave']) {
                            echo "<h2>" . $typeLeave['type_leave_name'] . "</h2>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php if ($report['checked'] == "Approved") : ?>
                        <button class="btn btn-primary"><?php echo $report['checked']; ?></button>
                    <?php else : ?>
                        <button class="btn btn-danger">Danger</button>
                    <?php endif; ?>
                </td>
                
            </tr>
        <?php } ?>

    </tbody>
</table>