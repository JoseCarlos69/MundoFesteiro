<?php
?>

<div class="top-bar animate-dropdown" style="background-color: black;">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#" style="color: white;"><i class="icon fa fa-user" style="color: white;"></i>Bem-vindo -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="my-account.php" style="color: white;"><i class="icon fa fa-user" style="color: white;"></i>Minha Conta</a></li>
					<li><a href="my-wishlist.php" style="color: white;"><i class="icon fa fa-heart" style="color: white;"></i>Lista de Desejo</a></li>
					<li><a href="my-cart.php" style="color: white;"><i class="icon fa fa-shopping-cart" style="color: white;"></i>Meu Carrinho</a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="login.php" style="color: white;"><i class="icon fa fa-sign-in"></i>Logar</a></li>
<?php }
else{ ?>
	
				<li><a href="logout.php" style="color: white;"><i class="icon fa fa-sign-out" style="color: white;"></i>Sair</a></li>
				<?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<a href="track-orders.php" style="color: white;" class="dropdown-toggle" ><span class="key">Rastrear Pedido</b></a>
						
					</li>

				
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->