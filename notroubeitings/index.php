<!doctype html>
<?php
include "php/BDconection.php";
include "php/InventoryDataHandler.php";
$conn=connectToDatabase("LocalHost","root","","loja");
session_start();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="images/logo.png">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Not Roubeitings | Home</title>
	</head>
	<body>
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="Logo" width="225px">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Página Inicial</a>
						</li>
						<li><a class="nav-link" href="shop.php">Catálogo</a></li>
					</ul>
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <?php if(!isset($_SESSION['user'])){
                            echo '<li><a class="nav-link" href="../Login"><img src="images/user.svg"></a></li>';
                        }else{echo '<li><a class="nav-link" href="../Profile"><img src="images/user.svg"></a></li>';}?>
						<li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
					</ul>
				</div>
			</div>
		</nav>
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>BEM VINDO<span clsas="d-block"></span></h1>
								<p class="mb-4">Bem-vindo á loja Not Roubeitings, o site perfeito para comprar e descobrir os melhores jogos digitais! Neste site de venda de jogos poderá encontarar qualquer jogo de qualquer estilo. Aproveite os melhores preços e compre já a melhor prenda que pode oferecer aos seus conhecidos.</p>
								<p><a href="../SignIn" class="btn btn-secondary me-2">Registar</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/steam.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="product-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Descobre mais ofertas incríveis disponíveis agora! Não percas mais tempo!</h2>
						<p class="mb-4">Aproveite enquanto está barato e o stock dura! </p>
						<p><a href="shop.php" class="btn">Ver mais</a></p>
					</div> 
                    <?php
                    $RandInventoryItems = searchRandomInventoryItems($conn,3);
                    foreach ($RandInventoryItems as $RItem)
                    {
                        echo '<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">';
                        echo '<a class="product-item" href="services.php?id='.$RItem->id.'">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($RItem->image) . '" class="img-fluid product-thumbnail">';
                        echo '<h3 class="product-title">'.$RItem->name.'</h3>';
                        echo '<strong class="product-price">'.$RItem->price.'€</strong>';
                        echo '<span class="icon-cross">';
                        echo '<img src="images/cross.svg" class="img-fluid">';
                        echo '</span>';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
				</div>
			</div>
		</div>
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Porquê escolher-nos?</h2>
						<p>Somos uma empresa comprometida com a excelência em todos os aspetos do nosso trabalho, e isso se reflete nos nossos produtos/serviços de alta qualidade e na nossa abordagem centrada no cliente.</p>
						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Aproveite o nosso envio rápido e confiável para uma experiência de compra perfeita.</p>
								</div>
							</div>
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Experimente a conveniência de fazer compras fáceis com a nossa plataforma de fácil utilização.</p>
								</div>
							</div>
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Conte com o nosso apoio ininterrupto para qualquer assistência que necessite, 24 horas por dia, 7 dias por semana.</p>
								</div>
							</div>
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>Desfrute de devoluções sem complicações para uma experiência de compra sem preocupações.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/ubisoft.png" alt="Image" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Notícias</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">View All Posts</a>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="images/news.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Fotinite or Bábadjê?</a></h3>
								<div class="meta">
									<span>por <a href="#">Zézocs</a></span> <span>em <a href="#">13 de Junho, 2023</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="images/news.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Fortnite Shuts Down!</a></h3>
								<div class="meta">
									<span>por <a href="#">Gordo</a></span> <span>em <a href="#">15 de Dezembro, 2022</a></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="images/news.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Marcus Person Dies!</a></h3>
								<div class="meta">
									<span>por <a href="#">Bacano</a></span> <span>em <a href="#">12 de Dezembro, 2022</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer-section">
			<div class="container relative">
				<div class="sofa-img">
					<img src="images/controller.png" alt="Image" class="img-fluid">
				</div>
				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Concorre a cupões de desconto!</span></h3>
							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Nome">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Not Roubeitings</a></div>
						<p class="mb-4">Bem-vindo á loja Not Roubeitings, o site perfeito para comprar e descobrir os melhores jogos digitais! Neste site de venda de jogos poderá encontarar qualquer jogo de qualquer estilo. Aproveite os melhores preços e compre já a melhor prenda que pode oferecer aos seus conhecidos.</p>
					</div>
				</div>
				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. Todos os direitos reservados. &mdash; Feito com carinho por: <a href="#">Ruizinho</a>    </p>
						</div>
						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Termos &amp; Condições</a></li>
								<li><a href="#">Política de Privacidade</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
