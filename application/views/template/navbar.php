<?php if (!isset($_SESSION)) session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" datatoggle="
			collapse" data-target="#bs-example-navbar-collapse-1" ariaexpanded="
			false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo base_url(); ?>">Xtreme
			ATV</a>
		</div>
<!-- Collect the nav links, forms, and other content for toggling -->

	<div class="collapse navbar-collapse" id="bs-example-navbarcollapse-1">
	<ul class="nav navbar-nav">
		<li><a href="<?php echo base_url(); ?>main/contactus">About Us</a></li>
		<li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>

	<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo base_url(); ?>product">Products</a></li>
		<li><a href="<?php echo base_url(); ?>staff">Staff</a></li>
	</ul>
	</li>

	</ul>

	<ul class="nav navbar-nav navbar-right">
		<?php if (isset($_SESSION['logged_in'])) { ?>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['logged_in']['username']; ?> <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo base_url(); ?>authentication/logout">Logout</a></li>
	</ul>
	</li>

	<?php } else { ?>
	<a class="btn btn-default navbar-btn" href="<?php echo base_url(); ?>authentication/login" role="button">Login</a>
	<?php } ?>
	</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>