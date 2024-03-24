<div class="col-xl-9 col-lg-8 col-md-12 grow">
    <div class="card shadow-sm grow ctm-border-radius">
        <div class="card-body align-center">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="employee-office-table">
                        <div class="text-center mb-3">
                            <h3>Reports of Request</h3>
                        </div>
                        <div class="mb-3">
                            <form class="d-flex">

                                <select class="form-control me-2 mr-1" id="search-employees">
                                    <option value="">All Months</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>

                                <input class="form-control me-2 mr-1" type="text" placeholder="Search" id="search-report">
                            </form>

                        </div>

                        <div class="table-responsive">
                            <table id="reportTable" class="table custom-table" style="width: 100%;">
                                <thead>
                                    <tr class="bg-warning">
                                        <th>Date Request</th>
                                        <th>Date Leave</th>
                                        <th>Date Comeback</th>
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
                                        if ($report['checked'] == "Approved") {


                                    ?>
                                            <tr>
                                                <td><?php echo $report['date_request']; ?></td>
                                                <td><?php echo $report['start_leave']; ?></td>
                                                <td><?php echo $report['end_leave']; ?></td>
                                                <td><?php echo $report['reason']; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($typeLeave as $leave) {
                                                        if ($leave['type_leave_id'] == $report['type_leave']) {
                                                            echo $leave['type_leave_name'];
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($report['checked'] == "Approved") : ?>
                                                        <span style="background-color: green; padding: 2px; width: 90px;color:white;"><?php echo $report['checked']; ?></span>
                                                    <?php else : ?>
                                                        <span style="background-color: red; padding: 2px; width: 90px;color:white;"><?php echo $report['checked']; ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <script>
                            document.getElementById('search-employees').addEventListener('change', (e) => {
                                var selectedOption = e.target.value.toLowerCase();
                                var rows = document.querySelectorAll('#reportTable tbody tr');

                                rows.forEach(row => {
                                    var dateLeave = row.cells[1].textContent.trim().toLowerCase();
                                    var extractedDate = dateLeave.substr(3, 2); // Extracts the characters at index 3 and 4 (0-based index)

                                    if (extractedDate === selectedOption) {
                                        row.style.display = 'table-row';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                });
                            });
                        </script>

                        <script>
                            document.getElementById('search-report').addEventListener('input', (e) => {
                                var searchText = e.target.value.toLowerCase();
                                var rows = document.querySelectorAll('#reportTable tbody tr');

                                rows.forEach(row => {
                                    var dateRequest = row.cells[0].textContent.trim().toLowerCase();
                                    var dateLeave = row.cells[1].textContent.trim().toLowerCase();
                                    var dateComeback = row.cells[2].textContent.trim().toLowerCase();
                                    var reason = row.cells[3].textContent.trim().toLowerCase();
                                    var typeLeave = row.cells[4].textContent.trim().toLowerCase();
                                    var status = row.cells[5].textContent.trim().toLowerCase();

                                    if (dateRequest.includes(searchText) || dateLeave.includes(searchText) || dateComeback.includes(searchText) || reason.includes(searchText) || typeLeave.includes(searchText) || status.includes(searchText)) {
                                        row.style.display = 'table-row';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                });
                            });
                        </script>

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