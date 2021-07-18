<style>
	.logo {
    margin: auto;
    font-size: 10px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
          <img src="assets/img/CraneLogo.png" alt="Crane-Logo" style="background:#daaf39e7; width:45px; padding:1px; border-radius:50%;">
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b><?php echo $_SESSION['setting_name']; ?></b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>
