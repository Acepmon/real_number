<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Real Number</title>

    <link rel="stylesheet" href="css/master.css" charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" charset="utf-8">

  </head>
  <body>

  	<div class="container">
  		<h1 class="text-primary">
	  		Do you see the numbers?
	  	</h1>
	  	<br>

	  	<?php

	  	require_once "php/classes/db.php";
	  	$db = new Connector();

	  	?>

		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#al" role="tab" data-toggle="tab">Assets & Liabilities</a></li>
				<li><a href="#ie" role="tab" data-toggle="tab">Income & Expense</a></li>
			</ul>
			<div class="tab-content" style="border: 1px solid lightgray; border-top: none;">
			    <div role="tabpanel" class="tab-pane active" id="al" >
			    	<br>
			    	<div class="col-md-12">
			    		<button class="btn btn-default" data-toggle="modal" data-target="#register_al"><span class="glyphicon glyphicon-plus"></span> Register new</button>
			    	</div>
					<div class="col-md-6">
				  		<h3 class="text-success">Assets <small class="text-success"><span class="glyphicon glyphicon-arrow-up"></span></small></h3>
				  		<table class="table table-hover">
				  			<tr>
				  				<th>Object</th>
				  				<th>Speed</th>
				  			</tr>
				  			<?php 

				  			$db->query("select * from assets order by id desc;");
				  			foreach ($db->resultset() as $asset) {
				  				$id = $asset['id'];
				  				$object = $asset['object'];
				  				$value = $asset['value'];
				  				$type = $asset['type'];
				  				$speed = $asset['speed'];

				  				$sign = "$";
				  				if (strcmp($type, "tugrug") == 0) {
				  					$sign = "₮";
				  					$type = "t";
				  				} else if (strcmp($type, "dollar") == 0) {
				  					$sign = "$";
				  					$type = "d";
				  				}

				  				if (strcmp($speed, "year") == 0) {
				  					$speed = "py";
				  				} else if (strcmp($speed, "month") == 0) {
				  					$speed = "pm";
				  				} else if (strcmp($speed, "day") == 0) {
				  					$speed = "pd";
				  				} else if (strcmp($speed, "hour") == 0) {
				  					$speed = "ph";
				  				}

				  				$col_speed = "".$sign.$value."/".$type.$speed;
				  				?>
								<tr>
									<td><?php echo $object; ?></td>
									<td class="text-info"><?php echo $col_speed; ?></td>
								</tr>
				  				<?php
				  			}

				  			?>
				  		</table>
				  	</div>
				  	<div class="col-md-6">
				  		<h3 class="text-danger">Liabilities <small class="text-danger"><span class="glyphicon glyphicon-arrow-down"></span></small></h3>
				  		<table class="table table-hover">
				  			<tr>
				  				<th>Object</th>
				  				<th>Speed</th>
				  			</tr>
				  			<?php 

				  			$db->query("select * from liabilities order by id desc;");
				  			foreach ($db->resultset() as $liability) {
				  				$id = $liability['id'];
				  				$object = $liability['object'];
				  				$value = $liability['value'];
				  				$type = $liability['type'];
				  				$speed = $liability['speed'];

				  				$sign = "$";
				  				if (strcmp($type, "tugrug") == 0) {
				  					$sign = "₮";
				  					$type = "t";
				  				} else if (strcmp($type, "dollar") == 0) {
				  					$sign = "$";
				  					$type = "d";
				  				}

				  				if (strcmp($speed, "year") == 0) {
				  					$speed = "py";
				  				} else if (strcmp($speed, "month") == 0) {
				  					$speed = "pm";
				  				} else if (strcmp($speed, "day") == 0) {
				  					$speed = "pd";
				  				} else if (strcmp($speed, "hour") == 0) {
				  					$speed = "ph";
				  				}

				  				$col_speed = "".$sign.$value."/".$type.$speed;
				  				?>
								<tr>
									<td><?php echo $object; ?></td>
									<td class="text-info"><?php echo $col_speed; ?></td>
								</tr>
				  				<?php
				  			}

				  			?>
				  		</table>
				  	</div>
			    </div>

			    <div role="tabpanel" class="tab-pane" id="ie">
			    	<div class="col-md-6">
			    		<h3 class="text-success">Income </h3>
			    	</div>
		    		<div class="col-md-6">
		    				
		    		</div>	
			    </div>
			    <div class="clearfix"></div>
			</div>
		</div>
  	</div>

  	<div class="modal fade" id="register_al" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form action="php/register_al.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Register new asset or liability</h4>
	      </div>
	      <div class="modal-body">
	       	<fieldset class="form-group">
	       		<label>Object</label>
	       		<input type="text" name="object" class="form-control" required>
	       	</fieldset>
	       	<fieldset class="form-group">
	       		<label>Value</label>
	       		<input type="text" name="value" class="form-control" required>
	       	</fieldset>
	       	<fieldset class="form-group">
	       		<label>Type</label>
	       		<select name="type" class="form-control" required>
	       			<option value="dollar">Dollar</option>
	       			<option value="tugrug">Tugrug</option>
	       		</select>
	       	</fieldset>
	       	<fieldset class="form-group">
	       		<label>Speed</label>
	       		<select name="speed" class="form-control" required>
	       			<option value="year">Per Year</option>
	       			<option value="month">Per Month</option>
	       			<option value="day">Per Day</option>
	       			<option value="hour">Per Hour</option>
	       		</select>
	       	</fieldset>
	       	<fieldset class="form-group">
	       		<label>Asset or liability?</label>
	       		<select name="al" class="form-control" required>
	       			<option value="asset">Asset</option>
	       			<option value="liability">Liability</option>
	       		</select>
	       	</fieldset>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

    <script type="text/javascript" src="js/master.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/angular-ui-router.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

  </body>
</html>
