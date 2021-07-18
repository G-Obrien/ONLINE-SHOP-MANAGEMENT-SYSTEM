  <header class="masthead">
      <br>
  <h3 class="text-white1">Checkout</h3>
                    <hr class="divider my-4" />
    <h4>Confirm Delivery Information</h4>
    </header>
    <style>
        .col-lg-10{
            width:100%;
             text-align:center;
        }
        .text-white1{
       text-align:center;
        }
        h4{
            text-align:center;
        }
        .container{
            width:100%;
        display:flex;
        }
        .card{
            width:50%;
        }
        .container-cart{
            display: flex;
        }
        /**Side cart */
        	.card p {
    		margin: unset
    	}
        .img2{
            width:100px;
            height:80px;
        }
    	 img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: sticky;
          display:flex;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
        .card-cart{
            width:80%;
        }
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
    </style>
  
    <div class="container">
        <div class="card">
     
        <?php 
        if(isset($_SESSION['login_user_id'])){
            $data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
        }else{
            $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
            $data = "where c.client_ip = '".$ip."' ";	
        }
        $ind = 1;
        $total = 0;
        $get = $conn->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
        while($row= $get->fetch_assoc()):
            $total += ($row['qty'] * $row['price']);

            //Table begins here
          
        ?>
        
       <table>
            <th>
                <tr><td colspan="4">
                <div class="col-md-8"><b>Items in Cart</b></div>
                <div class="col-md-4 text-right"><b>Total</b></div>		
	        	</div>
                </td></tr>
            </th>
        <th>#</th>
        <th>Item Imag</th>
        <th>Descriptions</th>
        <th>Item Cost</th>
        
       <tr>
           <td>
              <?php echo $ind ?> 
           </td>
           <td class="img2">   
        <!--image--->
		<img src="assets/img/<?php echo $row['img_path'] ?>" alt="">
           </td>
             <td>   
        <!--description--->
        <p><b><large><?php echo $row['name'] ?></large></b></p>
        <p class='truncate'> <b><small>Descript :<?php echo $row['description'] ?></small></b></p>
        <p> <b><small>Unit Price :<?php echo number_format($row['price'],2) ?></small></b></p>
        <p><small>QTY :</small> <?php echo $row['qty'] ?></p>
           </td>
             <td>   
        <!--Cost--->
        <b><large> <?php echo number_format($row['qty'] * $row['price'],2) ?></large></b>      
        </td>
       </tr> 
       <?php 
       endwhile; ?>
       <tr>
           <td colspan="4">
                <p class="text-right"><b>Total Amount UGX :<?php echo number_format($total,2) ?></b></p>
           </td>
       </tr>
       <tr>
     <td colspan="4">
   <center><b>------------------Payment Options--------------------</b></center>
   <br>
     <div class="form-group">
       <h4> Payment Method:</h4> <br>
        <center>
        <input type="radio" name="method" id=""> - Cash on Dilivery</input><br>
        <input type="radio" name="method" id=""> - Pay on Direct Order</input>
        </center>
        
    </div>
    <br> <hr>
    <div class="form-group">
        <h4>Payment Basis: </h4>
        <br>
        <center>
        <input type="radio" name="paybasis" id=""> - Mobile Money</input><br>
        <input type="radio" name="paybasis" id=""> - Cash Money</input> <b></b>
        </center>
    </div>
   
   
	  </td>
       </tr>
        </table>
       

     </div>
<!-----> <br><b>--</b>
       <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                
                    <div class="form-group">
                        <label for="" class="control-label">Username</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-block btn-outline-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Order successfully Placed.")
                        setTimeout(function(){
                            location.replace('index.php?page=home')
                        },1500)
                    }
                }
            })
        })
        })
    </script>