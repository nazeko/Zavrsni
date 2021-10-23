<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Navbar scroll</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarScroll">
			<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
				<li class="nav-item">
					<a class="nav-link <?php 
                        if($nav == "home")
                        {
                            echo "active";
                        }
                    
                    ?>" aria-current="page" href="/admin">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle  <?php 
                        if($nav == "kreiraj")
                        {
                            echo "active";
                        }
                    
                    ?>" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Dodaj novi
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
						<li><a class="dropdown-item" href="/admin/nova_drzava.php">Nova država</a></li>
						<li><a class="dropdown-item" href="/admin/nova_liga.php">Nova liga</a></li>
						<li><a class="dropdown-item" href="/admin/novi_klub.php">Novi klub</a></li>
						<li><a class="dropdown-item" href="/admin/novi_igrac.php">Novi igrač</a></li>
						<li><a class="dropdown-item" href="/admin/nova_utakmica.php">Nova utakmica</a></li>
					</ul>
				</li> 
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle  <?php 
                        if($nav == "pregled")
                        {
                            echo "active";
                        }
                    
                    ?>" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Pregled
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
						<li><a class="dropdown-item" href="/admin/pregled_drzava.php">Pregled država</a></li>
						<li><a class="dropdown-item" href="/admin/pregled_liga.php">Pregled liga</a></li>
						<li><a class="dropdown-item" href="/admin/pregled_klub.php">Pregled klub</a></li>
						<li><a class="dropdown-item" href="/admin/pregled_igrac.php">Pregled igrač</a></li>
						<li><a class="dropdown-item" href="/admin/pregeled_utakmica.php">Pregled utakmica</a></li>
					</ul>
				</li> 
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Link
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li> -->
				
			</ul>
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>