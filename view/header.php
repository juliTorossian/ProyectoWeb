<?php 

    //session_start();

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/style.css">

    <title>Kpaci-Thor</title>
  </head>
  <body>
    
    <header class="navbar navbar-expand-lg">
        <div class="container-fluid align-items-center">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item item-header"><i class="bi bi-whatsapp icon-header"     ></i><a href=""> (+54) 294-4900241</a></li>
                <li class="nav-item item-header"><i class="bi bi-envelope-fill icon-header"></i><a href=""> mail@gmail.com   </a></li>
                <li class="nav-item item-header"><i class="bi bi-geo-fill icon-header"     ></i><a href=""> urquiza 4750 7F  </a></li>
            </ul>
            <form class="d-flex">
                <select class="form-select selection-header">
                    <option value="1" selected>ARS$</option>
                    <option value="2">USD</option>
                    <option value="3">UY$</option>
                </select>
            </form>
            <div>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta  <i class="bi bi-person-circle icon-header-cuenta"></i></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if (isset($_SESSION["username"])){?>
                        <a href="#" class="dropdown-item">Mi Cuenta</a>
                        <a href="index.php?controller=UsuarioCON&action=cerrarsesion" class="dropdown-item">Cerrar Sesion</a>
                    <?php }else{?>
                        <a href="index.php?controller=UsuarioCON&action=login" class="dropdown-item">Iniciar Sesion</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </header>
    
    <nav>
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-3" style="color: white; font-size: 32px;"><a href="./index.php"><img src="./public/img/logo_blanco.png" alt="logo" class="img-logo"></a></div>
                <div class="col-6">
                    <div class="input-group input-group-color">
                        <select class="form-select input-group-der">
                            <option value="1" selected>All</option>
                        <?php
                            foreach ($a_categoria as $key => $value) {
                            $nombreCat = $value['cateNombre'];
                            $valueCat  = $value['cateId'];
                        ?>
                            <option value="<?php echo($valueCat);?>"><?php echo($nombreCat);?></option>
                        <?php } ?>
                        </select>
                        <input  type="text" class="form-control" placeholder="Buscar..." aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <button class="btn btn-outline-secondary input-group-izq input-group-color" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-3">
                    <ul>
                        <li><a href=""><span><i class="bi bi-basket3 icon-nav"></i></span></a></li>
                        <li><a href=""><span><i class="bi bi-heart icon-nav"></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="menu-HOR">
            <div class="container">
                <div class="row text-center py-3">
                    <div class="col-4"><a href="./index.php">Home</a></div>
                    <div class="col-4"><a href="./index.php?controller=oferta&action=ofertas">Ofertas</a></div>
                    <div class="col-4">
                        <div id="menu-desplegable">
                            <ul>
                                <li class="nivel1"><a href="#" class="nivel1">Categorias</a>
                                    <ul class="nivel2">
                                        <?php
                                            $primero = 'S';
                                            foreach ($a_categoria as $key => $value) {
                                                $id        = $value['cateId'];
                                                $nombreCat = $value['cateNombre'];
                                                $tieneSub  = $value['tieneSub'];
                                                
                                                if ($tieneSub != 'S'){
                                                    if ($primero == 'S') {
                                        ?>
                                        <li class="primero"><a href="#"><?php echo($nombreCat);  ?></a></li>
                                        <?php
                                                        $primero = 'N';
                                                    }else{
                                        ?>
                                        <li class=""><a href="#"><?php echo($nombreCat);  ?></a></li>
                                        <?php
                                                    }
                                                }else{
                                        ?>
                                        <li class="nivel2"><a class="nivel2" href="#"><?php echo($nombreCat);  ?></a>
                                            <ul class="nivel3">
                                        <?php
                                                    foreach ($a_subcategoria as $key => $value) {
                                                        $subId        = $value['subcateId'];
                                                        $cateId       = $value['cateId'];
                                                        $nombreSubCat = $value['subcateNombre'];
                                                        
                                                        if ($id == $cateId) {
                                        ?>
                                                <li><a href="#"><?php echo($nombreSubCat);  ?></a></li>
                                        <?php
                                                        }
                                                    }
                                        ?>
                                            </ul>
                                        </li>
                                        <?php
                                                }
                                            }
                                        
                                        ?>
                                    </ul>
                                </li>
                            </ul>	
                        </div>
                    </div>
                </div>
            </div>
        </div>

