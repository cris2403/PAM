<!doctype html>
<?php
include 'php/BDconection.php';
include 'php/InventoryDataHandler.php';
include 'php/CartDataHandler.php';
$conn = connectToDatabase("LocalHost", "root", "", "loja");
include 'php/UsersDataHandler.php';
session_start();
if(!isset($_SESSION['user'])){
    header('location:../Login');
}
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
		<title>Not Roubeitings | Checkout</title>
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
						<li><a class="nav-link" href="index.php">Página Inicial</a></li>
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
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
						</div>
					</div>
				</div>
			</div>
		<div class="untree_co-section">
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Detalhes de faturação</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		            <div class="form-group">
		              <label for="c_country" class="text-black">Seleciona o teu país</span></label>
		              <select id="c_country" class="form-control">
						  <option value="11">Portugal</option>
		              </select>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">Primeiro nome</span></label>
		                <input type="text" class="form-control" id="c_fname" name="c_fname">
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Apelido</span></label>
		                <input type="text" class="form-control" id="c_lname" name="c_lname">
		              </div>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Nome da empresa</label>
		                <input type="text" class="form-control" id="c_companyname" name="c_companyname">
		              </div>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Morada</span></label>
		                <input type="text" class="form-control" id="c_address" name="c_address">
		              </div>
		            </div>
		            <div class="form-group mt-3">
		              <input type="text" class="form-control">
		            </div>
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_state_country" class="text-black">Distrito</span></label>
		                <input type="text" class="form-control" id="c_state_country" name="c_state_country">
		              </div>
		              <div class="col-md-6">
		                <label for="c_postal_zip" class="text-black">Código Postal</span></label>
		                <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
		              </div>
		            </div>
		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_email_address" class="text-black">Email</span></label>
		                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
		              </div>
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Telemóvel</span></label>
		                <input type="text" class="form-control" id="c_phone" name="c_phone">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Notas</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"></textarea>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6">
		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Código de desconto</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <label for="c_code" class="text-black mb-3">Código de desconto</label>
		                <div class="input-group w-75 couponcode-wrap">
		                  <input type="text" class="form-control me-2" id="c_code" placeholder="Código de desconto" aria-label="Coupon Code" aria-describedby="button-addon2">
		                  <div class="input-group-append">
		                    <button class="btn btn-black btn-sm" type="button" id="button-addon2">Aplicar</button>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Sua encomentda</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Produto</th>
		                    <th>Total</th>
		                  </thead>
		                  <tbody>
						  	<?PHP
                            $subtotal = 0;
                            $userID = $_SESSION['user'];
                            $cartItems = searchCartByUserId($userID->id, $conn);
                            if (!empty($cartItems)) {
                                foreach ($cartItems as $cartItem) {
                                    $itemData = searchInventoryItem($conn, $cartItem['I_ID']);
                                    if ($itemData !== null) {
                                        echo '<tr>';
                                        echo '  <td>' . $itemData->name . ' <strong class="mx-2">x</strong> ' . $cartItem['Quant'] . '</td>';
                                        echo '  <td>' . ($itemData->price * $cartItem['Quant']) . '€</td>';
                                        echo '</tr>';
                                    }
                                    $subtotal += $itemData->price * $cartItem['Quant'];
                                }
                            } else {
                                echo '<tr>';
                                echo '  <td colspan="6">Não foram encontrados itens no seu carrinho</td>';
                                echo '</tr>';
                            }

                            ?>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Subtotal</strong></td>
		                      <td class="text-black"><?php echo $subtotal.'€';?></td>
		                    </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>10€</td>
                            </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
		                      <td class="text-black font-weight-bold"><strong><?php echo ($subtotal+10).'€';?></strong></td>
		                    </tr>
		                  </tbody>
		                </table>

		                <div class="border p-3 mb-3">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
		                  <div class="collapse" id="collapsebank">
		                    <div class="py-2">
		                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
		                    </div>
		                  </div>
		                </div>
		                <div class="border p-3 mb-3">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
		                  <div class="collapse" id="collapsecheque">
		                    <div class="py-2">
		                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
		                    </div>
		                  </div>
		                </div>
		                <div class="border p-3 mb-5">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                                      <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z"/>
                                  </svg>Paypal</a></h3>
		                  <div class="collapse" id="collapsepaypal">
		                    <div class="py-2">
		                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
		                    </div>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='php/CheckOut.php'">Fazer o pedido</button>
		                </div>
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