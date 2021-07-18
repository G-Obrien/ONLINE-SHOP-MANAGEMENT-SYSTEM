<?php 
    $i =1;
    $total = 0;
    include 'db_connect.php';
     //querry from table payments
        $qry2 = $conn->query("SELECT * FROM payments where id =".$_GET['id']);
    while($row=$qry2->fetch_assoc()){
       // $total += $row['qty'] * $row['price'];
         $pay_ID = $_GET['id'];
          $order_id_p = $row['order_id'];
           $amount = $row['amount'];
     }
    //querry from table order_list 
    $qry1 = $conn->query("SELECT * FROM order_list where id = $order_id_p");
    while($row=$qry1->fetch_assoc()){
        //$total += $row['qty'] * $row['price'];
        $ord_list_id = $row['id'];
        $order = $row['order_id'];
        $prodID = $row['product_id'];
        $qty_order = $row['qty'];
        }
     //querry from table orders
    $qry = $conn->query("SELECT * FROM  orders where id = $order");
    while($row=$qry->fetch_assoc()){

       $ID = $row['id'];
       $person = $row['name'];
       $per_phone = $row['mobile'];
       $per_email = $row['email'];
       $dateOfOrder =  $row['ordereddate'];

    }
  //querry from table product_list
        $qry3 = $conn->query("SELECT * FROM product_list where id = $prodID ");
    while($row=$qry3->fetch_assoc()):
        $productID = $row['id'];
        $prodName = $row['name'];
        $cost = $row['price'];



        /////Calculating the total amount of money paid for orders:
            $Amount1 = number_format($cost * $qty_order, 0);
            $TotalPay +=  ($Amount1);

            ///Action button
    ?>

<div class="container-fluid">

	<h4>Viewing payment made by <?php  echo $person; ?> Phone: <?php  echo $per_phone; ?> Email: <?php  echo $per_email; ?></h4> 
	<table class="table table-bpaymentsed">
		<thead>
			<tr>
				<th>Payment Number</th>
				<th>Items</th>
                <th>Qty</th>
				<th>Cost </th>
				<th>Total Amount</th>
                <th>Placed Date</th>
                <th>Status</th>
                <th>Actions</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
                <td><?php echo $pay_ID; ?></td>
                <td><?php echo $prodName; ?></td>
				<td><?php echo $qty_order; ?></td>
				<td><?php echo number_format($cost,0) ?></td>
				<td><?php echo number_format($TotalPay,2) ?></td>
                <td><?php echo $row['qty'] ?></td>
				<td><?php echo $dateOfOrder ?></td>
                <td><?php echo"<button>Delete Order</button>
                                <button>Confirm</button>"  ?></td>
			</tr>
		
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-right">TOTAL</th>
				<th ><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
    <?php endwhile; ?>
	<div class="text-center">
		<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_payments()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	</div>
</div>

<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_payments(){
		start_load()
		$.ajax({
			url:'ajax.php?action=confirm_payments',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp == 1){
					alert_toast("payments confirmed.")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
</script>