<div class="col-xl-9 col-lg-8 col-md-12 grow">
    <div class="card shadow-sm grow ctm-border-radius">
        <div class="card-body align-center">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="employee-office-table">
                        <div class="table-responsive">
                            <table id="reportTable" class="table custom-table" style="width: 100%;">
                                <thead>
                                    <tr class="bg-warning">
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

                                    $users = employeeLeave($id);
                                    $typeLeave = typeLeave();
                                    foreach ($users as $report) {

                                    ?>
                                        <tr>
                                            <td>
                                                <h5><?php echo ($report['date_request']) ?><h5>
                                            </td>
                                            <td>
                                                <h5><?php echo ($report['start_leave']) ?><h5>
                                            </td>
                                            <td>
                                                <h5><?php echo ($report['end_leave']) ?><h5>
                                            </td>
                                            <td>
                                                <h5><?php echo ($report['reason']) ?><h5>
                                            </td>
                                            <td>
                                                <?php
                                                $typeLeaves = typeLeave();
                                                foreach ($typeLeaves as $typeLeave) {
                                                    if ($typeLeave['type_leave_id'] == $report['type_leave']) {
                                                        echo "<h5>" . $typeLeave['type_leave_name'] . "</h5>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($report['checked'] == "Approved") : ?>
                                                    <h5 style="background-color: green; padding: 2px; width: 90px;color:white;"><?php echo $report['checked']; ?></h5>
                                                <?php else : ?>
                                                    <h5 style="background-color: red; padding: 2px; width: 90px;color:white;"><?php echo $report['checked']; ?></h5>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- DownLaod button -->
                        <div class="text-center mt-3">
                            <a href="javascript:void(0)" id="downloadButton" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report</a>
                        </div>
                        <!-- java Script downlod -->
                        <script>
                            document.getElementById('downloadButton').addEventListener('click', function() {
                                // Retrieve table data as HTML
                                var table = document.getElementById('reportTable').outerHTML;

                                // Create a new Blob containing the table data
                                var blob = new Blob(['<!DOCTYPE html><html><head><h3>Report of Requests</h3><style> h3{text-align: center;} table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #dddddd; text-align: center; padding: 8px; } th { background-color: #f2f2f2; } td{ font-size: 10px; }</style></head><body>' + table + '</body></html>'], {
                                    type: 'application/pdf'
                                });

                                // Create a temporary URL for the Blob
                                var url = URL.createObjectURL(blob);

                                // Create a link element to trigger the download
                                var link = document.createElement('a');
                                link.href = url;
                                link.download = 'report.doc';

                                // Append the link to the body and click it
                                document.body.appendChild(link);
                                link.click();

                                // Clean up by removing the link and revoking the URL
                                document.body.removeChild(link);
                                URL.revokeObjectURL(url);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>