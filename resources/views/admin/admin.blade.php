@include('layouts.header')

<div class="fixed-sn light-blue-skin">

	<!--Double navigation-->
	<header>
		<!-- Sidebar navigation -->
		<div id="slide-out" class="side-nav sn-bg-4 fixed">
			<ul class="custom-scrollbar">
				<!-- Logo -->
				<li>
					<div class="logo-wrapper waves-light">
						<a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
					</div>
				</li>
				<!--/. Logo -->
				<!--Social-->
				<li>
					<ul class="social">
						<li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
						<li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
						<li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
						<li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
					</ul>
				</li>
				<!--/Social-->
				<!--Search Form-->
				<li>
					<form class="search-form" role="search">
						<div class="form-group md-form mt-0 pt-1 waves-light">
							<input type="text" class="form-control" placeholder="Search">
						</div>
					</form>
				</li>
				<!--/.Search Form-->
				<!-- Side navigation links -->
				<li>
					<ul class="collapsible collapsible-accordion">
						<li>
							<a class="waves-effect arrow-r">
								<i class="fa fa-home "></i>Inicio
							</a>
						</li>
						<li>
							<a class="collapsible-header waves-effect arrow-r">
								<i class="fa fa-hand-pointer-o "></i>Instruction<i class="fa fa-angle-down rotate-icon"></i>
							</a>
							<div class="collapsible-body">
								<ul>
									<li><a href="#" class="waves-effect">For bloggers</a></li>
									<li><a href="#" class="waves-effect">For authors</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a class="collapsible-header waves-effect arrow-r">
								<i class="fa fa-eye "></i>About<i class="fa fa-angle-down rotate-icon"></i>
							</a>
							<div class="collapsible-body">
								<ul>
									<li><a href="#" class="waves-effect">Introduction</a>
									</li>
									<li><a href="#" class="waves-effect">Monthly meetings</a>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<a class="collapsible-header waves-effect arrow-r ">
								<i class="fa fa-envelope "></i> Contact me<i class="fa fa-angle-down rotate-icon"></i>
							</a>
							<div class="collapsible-body">
								<ul>
									<li><a href="#" class="waves-effect">FAQ</a></li>
									<li><a href="#" class="waves-effect">Write a message</a></li>
									<li><a href="#" class="waves-effect">FAQ</a></li>
									<li><a href="#" class="waves-effect">Write a message</a></li>
									<li><a href="#" class="waves-effect">FAQ</a></li>
									<li><a href="#" class="waves-effect">Write a message</a></li>
									<li><a href="#" class="waves-effect">FAQ</a></li>
									<li><a href="#" class="waves-effect">Write a message</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</li>
				<!--/. Side navigation links -->
			</ul>
			<div class="sidenav-bg mask-strong"></div>
		</div>
		<!--/. Sidebar navigation -->
		<!-- Navbar -->
		<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
			<!-- SideNav slide-out button -->
			<div class="float-left">
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
			</div>
			<!-- Breadcrumb-->
			<div class="breadcrumb-dn mr-auto white-text">
				<p class="lead">Material Design for Bootstrap</p>
			</div>

			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				<li class="nav-item">
					<!-- <a class="nav-link"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a> -->
					<span class="navbar-text">Jueves 18 de Enero del 2018</span>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Account</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li> -->
			</ul>
		</nav>
	<!-- /.Navbar -->
	</header>
	<!--/.Double navigation-->

	<!--Main Layout-->
	<main>
		<div class="container-fluid mt-5">
			<h2>Advanced Double Navigation with fixed SideNav & fixed Navbar:</h2>
			<br>
			<h5>1. Fixed side menu, hidden on small devices.</h5>
			<h5>2. Fixed Navbar. It will always stay visible on the top, even when you scroll down.</h5>
			<div style="height: 2000px"></div>
		</div>
	</main>
<!--Main Layout-->

</div>

@include('layouts.footer')