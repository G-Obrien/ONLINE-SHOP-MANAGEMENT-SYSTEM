<div class="container-fluid">
	<div class="card">
		<div class="card-body">
            <h4>List of Payments.</h4>
			<table class="table table-bpaymentsed">
		<thead>
			<tr>
			<th>#-Payment Number</th>
			<th>Ordered Number</th>
			<th>Amount Paid (Ush)</th>
			<th>Method of Payment</th>
			<th>Payment Basis</th>
            <th>Payment Date</th>
			<th>Status</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			include 'db_connect.php';
			$qry = $conn->query("SELECT * FROM payments join orders /*WHERE ordr_id = order_id*/");
			while($row=$qry->fetch_assoc()):

               // $orderID = $row['id'];
			 ?>
			 <tr>
			 		<td><?php echo $i++ ?></td>
			 		<td><?php echo $row['id'] ?></td>
			 		<td><?php echo number_format($row['amount'],2) ?></td>
			 		<td><?php echo $row['method'] ?></td>
			 		<td><?php echo $row['basis'] ?></td>
                    <td><?php echo $row['paydate'] ?></td>
			 		<?php if($row['status'] == 1): ?>
			 		<td class="text-center"><span class="badge badge-success">Cleared!</span></td>
			 		<?php else: ?>
			 		<td class="text-center"><span class="badge badge-secondary">Outstanding</span></td>
			 		<?php endif; ?>
			 		<td>
			 			<button class="btn btn-sm btn-primary view_payments" data-id="<?php echo $row['id'] ?>" >View Details</button>
			 		</td>
			 </tr>
			<?php endwhile; ?>
		</tbody>
	</table>
		</div>
	</div>
	
</div>
<script>
	$('.view_payments').click(function(){
		uni_modal('payments','view_payments.php?id='+$(this).attr('data-id'))
	})
</script>
<style>
table.{
	font-size:12px;
	font-family:calibri;
}
th{
	font-size:14px;
}
tr td{
	font-size:13px;
}
.badge {
	width:90px;
	height:40px;
	font-size:12px;
}
button{
	width:100px;
	height:40px;
	font-size:12px;
}
</style>