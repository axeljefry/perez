<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="icon" type="image/x-icon" href="img/logo-16x16.png">
<script src="https://kit.fontawesome.com/18a45a892c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="index.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Poppins:wght@400;900&family=Sacramento&display=swap"rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<title>Carrito de compras</title>

</head>
<body>
        <div class="banner">
            <div class="heading">
                <header>
                    <h1>Moda<span class="title-yellow"><small>21</small></span></h1>
                </header>
                <span id="Abrir" class="fa-solid fa-bars btn-menu"></span>
                <nav id="menu">
                    <ul class="nav-menu">
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="#Nosotros" class="barrers">Nosotros</a></li>
                        <li><a href="#Catalogo" class="barrers">Catalogo</a></li>
                        <li><a href="#Galeria" class="barrers">Galeria</a></li>
                        <li><a href="#Testimonios" class="barrers">Testimonios</a></li>
                        <li><a href="contacto.html" class="barrers"><span class="title-yellow">Contacto</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>


<?php 

$carrito_mio=$_SESSION['carrito'];
$_SESSION['carrito']=$carrito_mio;

// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
    if($carrito_mio[$i]!=NULL){ 
    $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    $totalcantidad += $total_cantidad;
    }}}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark ">
<div class="container-fluid">
    <a class="navbar-brand text-dark" href="#">Carrito Moda21</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->



<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito De Compras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> S/</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (S/)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}}}
							echo $total; ?> S/</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Enviar compra</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->





<!-- ARTICULOS -->
<div class="container mt-5">
<div class="row" style="justify-content: center;">

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="80" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pa.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Lapiz Chequeo - Precio <br>S/ S/ 3.60</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="50" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 2" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pb.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Regla 30 CM - Precio <br>S/ 3.40</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="60" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 3" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pc.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="card-text">Colores Acuas - Precio <br>S/ 13.00</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="90" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 4" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pd.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 4</h5>
                        <p class="card-text">Plumones Gruesos - Precio <br>S/ 15.20</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="70" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 5" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 5</h5>
                        <p class="card-text">Kit Trazado - Precio <br>S/ 11.20</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="65" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 6" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pf.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 6</h5>
                        <p class="card-text">Trazador - Precio <br>S/ 7.80</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="45" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 7" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pg.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 7</h5>
                        <p class="card-text">Boligrafo - Precio <br>S/ 6.30</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="75" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 8" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/ph.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 8</h5>
                        <p class="card-text">Lapiz Borrador - Precio <br>S/ 5.90</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="85" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 9" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="carrito/pi.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 9</h5>
                        <p class="card-text">Regla 30 CM - Precio <br>S/ 1.00</p>
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>

</div>
</div>
<!-- END ARTICULOS -->

<footer class="social-footer" id="Contacto">
        <div class="copy">
            <span>© 2022 Moda21 | Política de Privacidad</span>
        </div>
        <div class="social-footer-icons">
            <ul class="menu simple">
                <li><a href="https://www.facebook.com/Moda21.Peru"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li><a href="https://api.whatsapp.com/send?phone=51902132938&app=facebook&entry_point=page_cta&fbclid=IwAR14-CScw4Ivnrv9VMX_bWu0D1fWj5gTYkEJDQg5gya71w2ZcgwXjR4vUi"><i
                    class="fa-brands fa-whatsapp" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>