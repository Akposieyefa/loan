<?php 
  	include_once('classes/loan.class.php');
  	$loan = new Loan();
  	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loanCreate'])) {
      	$create = $loan->loanCreate($_POST);
  	}
?>
<?php 
	$title = "Index";
	include_once('layouts/inc/nav.inc.php');
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2"><br><br>
				<div class="card">
					<div class="card-header">
						<h5>Loan Schedule Form</h5>
					</div>
					<div class="card-body">
						<?php 
							if (isset($create)) {
								echo $create;
							}
						?>
						<form action="" method="post" class="appointment">
								<div class="row">
									<div class="col-md-12">
										<label for="name"> <strong>First Name</strong> </label>
										<div class="form-group">
											<input type="text" name="firstName" class="form-control" placeholder="Enter First Name">
										</div>	
									</div>
									<div class="col-md-12">
										<label for="name"> <strong>Last Name</strong> </label>
										<div class="form-group">
											<input type="text" name="lastName" class="form-control" placeholder="Enter Last Name">
										</div>	
									</div>
									<div class="col-md-12">
										<label for="name"> <strong>Email</strong> </label>
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Enter Email">
										</div>
									</div>
									<div class="col-md-12">
										<label for="name"> <strong>Phone</strong> </label>
										<div class="form-group">
											<input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
										</div>
									</div>

									<div class="col-md-12">
										<label for="name"> <strong>Amount</strong> </label>
										<div class="form-group">
											<input type="text" class="form-control" name="amount" placeholder="Enter Amount">
										</div>
									</div>
									
									<div class="col-md-12">
										<label for="name"> <strong>Duration</strong> </label>
										<div class="form-group">
											<input type="date" name="duration" class="form-control" placeholder="Date">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" value="Schedule" name="loanCreate" class="btn btn-md btn-primary">
										</div>
									</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<?php 
	include_once('layouts/inc/footer.inc.php');
?> 