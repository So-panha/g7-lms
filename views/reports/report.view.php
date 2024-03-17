<table class="table custom-table col-xl-9 col-lg-8 col-md-12 grow">
	<thead>
		<tr>
			<th>Name</th>
			<th>Gender</th>
			<th>Remaining</th>
			<th>Taken</th>
			<th>Action</th>

		</tr>
	</thead>
	<tbody>
		<?php
		$employees = employee();
		foreach ($employees as $report) {
		?>
			<tr>
				<td>
					<h2><?php echo strtoupper($report['fname']) ?><h2>
				</td>
				<td>
					<?php echo $report['gender'] ?>
				</td>
				<td>
					<?php echo $report['day_can_leave'] ?>
				</td>
				<td>
					<?php echo $report['taken'] ?>
				</td>
				<td>
				<a href="report_detail?id=<?php echo urlencode($report['user_id']); ?>"><button class="btn btn-primary">Detail</button></a>
				</td>
			</tr>
		<?php } ?>

	</tbody>
</table>