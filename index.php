<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
	$id = intval($_GET['id']);
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity']++;
	} else {
		$sql_p = "SELECT * FROM products WHERE id={$id}";
		$query_p = mysqli_query($con, $sql_p);
		if (mysqli_num_rows($query_p) != 0) {
			$row_p = mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
		} else {
			$message = "ID do produto";
		}
	}
	echo "<script>alert('Produto adicionado ao carrinho')</script>";
	echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="MediaCenter, Template, eCommerce">
		<meta name="robots" content="all">

		<title>Mundo Festeiro - Home</title>

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/green.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

		<link rel="shortcut icon" href="assets/images/favicon.ico">

	</head>

	<body class="cnt-home">
		<header class="header-style-1">
			<?php include('includes/top-header.php'); ?>
			<?php include('includes/main-header.php'); ?>
			<?php include('includes/menu-bar.php'); ?>
		</header>
		<div class="body-content outer-top-xs" id="top-banner-and-menu">
			<div class="container">
				<div class="furniture-container homepage-container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
							<?php include('includes/side-menu.php'); ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
							<div id="hero" class="homepage-slider3">
								<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
									<div class="full-width-slider">
										<div class="item" style="background-image: url(assets/images/sliders/ParaTodos.png);"></div>
									</div>
									<div class="full-width-slider">
										<div class="item full-width-slider" style="background-image: url(assets/images/sliders/Temática.png);"></div>
									</div>
									<div class="full-width-slider">
										<div class="item full-width-slider" style="background-image: url(assets/images/sliders/Festa.png);"></div>
									</div>
								</div>
							</div>
							<div class="info-boxes wow fadeInUp">
								<div class="info-boxes-inner">
									<div class="row">
										<div class="col-md-6 col-sm-4 col-lg-4">
											<div class="info-box">
												<div class="row">
													<div class="col-xs-2">
														<i class="icon fa fa-dollar"></i>
													</div>
													<div class="col-xs-10">
														<h4 class="info-box-heading green">Preços baixos</h4>
													</div>
												</div>
												<h6 class="text">Melhores preços só aqui.</h6>
											</div>
										</div>
										<div class="hidden-md col-sm-4 col-lg-4">
											<div class="info-box">
												<div class="row">
													<div class="col-xs-2">
														<i class="icon fa fa-truck"></i>
													</div>
													<div class="col-xs-10">
														<h4 class="info-box-heading orange">Frete grátis</h4>
													</div>
												</div>
												<h6 class="text">Para alguns produtos do site.</h6>
											</div>
										</div>
										<div class="col-md-6 col-sm-4 col-lg-4">
											<div class="info-box">
												<div class="row">
													<div class="col-xs-2">
														<i class="icon fa fa-gift"></i>
													</div>
													<div class="col-xs-10">
														<h4 class="info-box-heading red">Ofertas</h4>
													</div>
												</div>
												<h6 class="text">Itens com até 20% de desconto.</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
						<div class="more-info-tab clearfix">
							<h3 class="new-product-title pull-left">Produtos</h3>
						</div>
						<div class="tab-content outer-top-xs">
							<div class="tab-pane in active" id="all">
								<div class="product-slider">
									<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
										<?php
										$ret = mysqli_query($con, "select * from products");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																	<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="150" height="150" alt=""></a>
															</div>
														</div>
														<div class="product-info text-left">
															<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
															<div class="description"></div>
															<div class="product-price">
																<span class="price">
																	R$ <?php echo htmlentities($row['productPrice']); ?>
																</span>
															</div>
														</div>
														<?php
    // Consulta para obter a quantidade disponível em estoque
    $product_id = $row['id'];
    $sql_check_stock = "SELECT available_quantity FROM inventory WHERE product_id = $product_id";
    $query_check_stock = mysqli_query($con, $sql_check_stock);
    
    if ($query_check_stock) {
        $row_stock = mysqli_fetch_assoc($query_check_stock);
        $available_quantity = $row_stock['available_quantity'];
        
        if ($available_quantity > 0) {
            // O produto está em estoque, então você pode adicioná-lo ao carrinho
    ?>
            <div class="action">
                <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Adicionar ao Carrinho</a>
            </div>
    <?php
        } else {
            // Produto fora de estoque
    ?>
            <div class="action" style="color:red">
                Sem estoque
            </div>
    <?php
        }
    }
    // ...
    ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="books">
								<div class="product-slider">
									<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
										<?php
										$ret = mysqli_query($con, "select * from products where category=3");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																	<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="150" height="150" alt=""></a>
															</div>
														</div>
														<div class="product-info text-left">
															<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
															<div class="description"></div>
															<div class="product-price">
																<span class="price">
																	R$ <?php echo htmlentities($row['productPrice']); ?>
																</span>
															</div>
														</div>
														<?php if ($row['productAvailability'] == 'Em estoque') { ?>
															<div class="action">
																<a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Adicionar ao Carrinho</a>
															</div>
														<?php } else { ?>
															<div class="action" style="color:red">
																Sem estoque
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="furniture">
								<div class="product-slider">
									<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
										<?php
										$ret = mysqli_query($con, "select * from products where category=5");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																	<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="150" height="150" alt=""></a>
															</div>
														</div>
														<div class="product-info text-left">
															<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
															<div class="description"></div>
															<div class="product-price">
																<span class="price">
																	R$ <?php echo htmlentities($row['productPrice']); ?>
																</span>
																<span class="price-before-discount">
																	R$ <?php echo htmlentities($row['productPriceBeforeDiscount']); ?>
																</span>
															</div>
														</div>
														<?php if ($row['productAvailability'] == 'Em estoque') { ?>
															<div class="action">
																<a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Adicionar ao Carrinho</a>
															</div>
														<?php } else { ?>
															<div class="action" style="color:red">
																Sem estoque
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="sections prod-slider-small outer-top-small">
						<div class="row">
							<div class="col-md-6">
								<section class="section">
									<h3 class="section-title">Doces</h3>
									<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
										<?php
										$ret = mysqli_query($con, "select * from products where category=1 and subCategory=1");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="150" height="150"></a>
															</div>
														</div>
														<div class="product-info text-left">
															<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
															<div class="description"></div>
															<div class="product-price">
																<span class="price">
																	R$ <?php echo htmlentities($row['productPrice']); ?>
																</span>
															</div>
														</div>
														<?php if ($row['productAvailability'] == 'Em estoque') { ?>
															<div class="action">
																<a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Adicionar ao Carrinho</a>
															</div>
														<?php } else { ?>
															<div class="action" style="color:red">
																Sem estoque
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</section>
							</div>
							<div class="col-md-6">
								<section class="section">
									<h3 class="section-title">Salgados</h3>
									<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
										<?php
										$ret = mysqli_query($con, "select * from products where category=2 and subCategory=2");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="150" height="150"></a>
															</div>
														</div>
														<div class="product-info text-left">
															<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
															<div class="description"></div>
															<div class="product-price">
																<span class="price">
																	R$ <?php echo htmlentities($row['productPrice']); ?>
																</span>
															</div>
														</div>
														<?php if ($row['productAvailability'] == 'Em estoque') { ?>
															<div class="action">
																<a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Adicionar ao Carrinho</a>
															</div>
														<?php } else { ?>
															<div class="action" style="color:red">
																Sem estoque
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</section>
							</div>
						</div>
					</div>
					<section class="section featured-product inner-xs wow fadeInUp">
						<h3 class="section-title">Descartáveis</h3>
						<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
							<?php
							$ret = mysqli_query($con, "select * from products where category=3");
							while ($row = mysqli_fetch_array($ret)) {
							?>
								<div class="item">
									<div class="products">
										<div class="product">
											<div class="product-micro">
												<div class="row product-micro-row">
													<div class="col col-xs-6">
														<div class="product-image">
															<div class="image">
																<a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']); ?>">
																	<img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="170" height="174" alt="">
																	<div class="zoom-overlay"></div>
																</a>
															</div>
														</div>
													</div>
													<div class="col col-xs-6">
														<div class="product-info">
															<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
															<div class="product-price">
																<span class="price">
																	R$ <?php echo htmlentities($row['productPrice']); ?>
																</span>
															</div>
															<?php if ($row['productAvailability'] == 'Em estoque') { ?>
																<div class="action">
																	<a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Adicionar ao Carrinho</a>
																</div>
															<?php } else { ?>
																<div class="action" style="color:red">
																	Sem estoque
																</div>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</section>
					<?php include('includes/brands-slider.php'); ?>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
			<script src="assets/js/jquery-1.11.1.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
			<script src="assets/js/owl.carousel.min.js"></script>
			<script src="assets/js/echo.min.js"></script>
			<script src="assets/js/jquery.easing-1.3.min.js"></script>
			<script src="assets/js/bootstrap-slider.min.js"></script>
			<script src="assets/js/jquery.rateit.min.js"></script>
			<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
			<script src="assets/js/bootstrap-select.min.js"></script>
			<script src="assets/js/wow.min.js"></script>
			<script src="assets/js/scripts.js"></script>
			<script src="switchstylesheet/switchstylesheet.js"></script>
			<script>
				$(document).ready(function() {
					$(".changecolor").switchstylesheet({
						seperator: "color"
					});
					$('.show-theme-options').click(function() {
						$(this).parent().toggleClass('open');
						return false;
					});
				});

				$(window).bind("load", function() {
					$('.show-theme-options').delay(2000).trigger('click');
				});
			</script>
		</div>
	</body>
</html>