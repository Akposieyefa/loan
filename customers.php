<?php 
    include_once('classes/loan.class.php');
    $helper = new Helper();
    $loan = new Loan();
 ?>
<?php 
	$title = "Customers";
	include_once('layouts/inc/nav.inc.php');
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><br><br>
				<div class="card">
					<div class="card-header">
						<h5>All Customers</h5>
					</div>
					<div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>fristName</th>
                                        <th>lastName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>PayAble</th>
                                        <th>Duration</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                    <?php
                                        $getLoanDetails = $loan->getAllCustomers();
                                        $i = 0;
                                        if(is_array($getLoanDetails) || is_object($getLoanDetails)) {
                                            foreach($getLoanDetails as $key => $value) {
                                                $id       = htmlentities($value["id"]);
                                                $firstName     = htmlentities($value["firstName"]);
                                                $lastName    = htmlentities($value["lastName"]);
                                                $email  = htmlentities($value["email"]);
                                                $phone   = htmlentities($value["phone"]);
                                                $amount   = htmlentities($value["ammount"]);
                                                $total   = htmlentities($value["total"]);
                                                $dueDate   = htmlentities($value["timeSpan"]);
                                                $date     = htmlentities($value["created_at"]);
                                                $i ++;
                                    ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $i;?> </td>
                                        <td><?php echo $firstName;?></td>
                                        <td><?php echo $lastName;?></td>
                                        <td><?php echo $email;?></td>
                                        <td> <?php echo $phone;?> </td>
                                        <td> <?php echo $amount;?> </td>
                                        <td> <?php echo  $total;?> </td>
                                        <td><?php echo $helper->formatDate($dueDate);?></td>
                                        <td><?php echo $helper->formatDate($date);?></td>
                                    </tr>
                                </tbody>
                                <?php 
                                        }
                                    }
                                ?>
                            </table>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<?php 
	include_once('layouts/inc/footer.inc.php');
?> 