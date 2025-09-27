<!--conexión bd en php-->
<?php

use PDO;
include("admin/bd.php"); //Conexion BD
//Selecciona registros sql servicios
$sentencia=$conexion->prepare("SELECT * FROM tbl_servicios"); 
    $sentencia->execute(); // Ejecutamos la sentencia preparada
        $lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona bd a mostrar

    //Selecciona registros sql portafolio
    $sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio"); 
        $sentencia->execute(); // Ejecutamos la sentencia preparada
            $lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona bd a mostrar

    //Selecciona registros sql entradas
    $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas"); 
        $sentencia->execute(); // Ejecutamos la sentencia preparada
            $lista_entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona bd a mostrar

    //Selecciona registros sql equipo
    $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo"); 
        $sentencia->execute(); // Ejecutamos la sentencia preparada
            $lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona bd a mostrar
?>
<!-- WebSiste -->
    <!DOCTYPE html>
    <html lang="en" translate="no">
        <head>
            <title>PROGRECOL S.A.S.</title>
            <link rel="icon" type="assets/Logo.png" href="assets/Logo.png">
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="WebSiste Progrescol Bic S.A.S." />
                <meta name="author" content="SAMHELL.COM">
                <!-- Favicon-->
                <link  rel= "apple-touch-icon"  tamaños= ""  href= "assets/Logo.PNG" > 
                <!-- Font Awesome icons (free version)-->
                <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
                <!-- Google fonts-->
                <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
                <!-- Core theme CSS (includes Bootstrap)-->
                <link href="css/styles.css" rel="stylesheet" />
        </head>
        <body id="page-top">
            <header>
            <a class="navbar-brand" href="#page-top"><img src="assets/Logo.png" alt="..." /></a>        
            </header>
<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/Logo.png" alt="..." /></a>         
                <!-- Boton -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Bienes & Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactenos</a></li>
                        <li class="nav-item"><a class="nav-link" href="./admin/login.php">Iniciar Seccion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<!-- Bienvenida -->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">¡Bienvenid@s!</div>
                <div class="masthead-heading text-uppercase">Más de una decada brindando calidad y seguridad en nuestros bienes y servicios </div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Inicio</a>
            </div>
        </header>
<!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nuestros Bienes & Servicios</h2>
                    <h3 class="section-subheading text-muted">""Conectamos el bienestar humano, con soluciones seguras y responsables para empleadores, trabajadores, administradoras y aseguradoras"</h3>
                </div>
                <div class="row text-center">
                    <?php foreach($lista_servicios as $registros){?>
                    <div class="col-md-3">
                        <span class="fa-stack fa-3x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $registros ['icono']; ?> fa-stack-1x fa-inverse"></i> <!-- iconos -->
                        </span> <!--  Fin del span de iconos -->
                        <h4 class="my-3"> <?php echo $registros ['titulo']; ?></h4> <!--  titulo del servicio -->
                        <p class="text-muted"> <?php echo $registros ['descripcion']; ?></p> <!-- texto  de descripción del servicio -->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
<!-- Portfolio -->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portafolio</h2>
                    <h6 class="section-subheading text-muted"> Nos dedicamos desde hace más de una decada a ofrecer bienes y servicios a través de nuestros recusos humanos, tecnicos, tecnologicos en el ámbito laboral, la seguridad social y la seguridad y salud en el trabajo y medio ambiente e higiene y seguridad industrial.</h6>
                </div><br>

            <div class="row text-center">
                <!-- Llama registro desde la BD -->
                <?php foreach($lista_portafolio as $registros){?> 
                <div class="col-lg-3 col-sm-6 mb-4"> <!--  -->
                    <div class="portfolio-item"> <!--Portafolio item 1-->
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registros['ID'];?>"> <!--  -->
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" width="100" src="assets/img/portfolio/<?php echo $registros['imagen'];?>" alt="."/>
                        </a>

                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $registros ['titulo'];?></div>
                                <div class="portfolio-caption-subheading text-muted"> <?php echo $registros ['subtitulo'];?></div>
                            </div>
                    </div>
                </div>
                <!-- Portfolio Modals item popup-->
                <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registros['ID'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase"><?php echo $registros ['titulo'];?></h2>
                                        <p class="item-intro text-muted"><?php echo $registros ['subtitulo'];?></p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/<?php echo $registros['imagen'];?>" alt="..." />
                                        <p><?php echo $registros ['descripcion'];?></p>
                                        <ul class="list-inline">
                                            <li> 
                                            <strong>Cliente:</strong>
                                            <?php echo $registros ['cliente'];?>
                                            </li>
                                        
                                            <li>
                                            <strong>Categoría:</strong>                                            
                                            <?php echo $registros ['categoria'];?>
                                            </li>

                                            <li>
                                            <strong>Consultro más sobre nuestro servicio en:</strong>    
                                            <br><a href="<?php echo $registros ['url'];?>"><?php echo $registros ['url'];?></a>
                                            </li>
                                        </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase"data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            !Nosotros te asesoramos¡ 
                                            </button>
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
<!-- Nosotros -->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nosotros</h2>
                <h4 class="section-heading text-muted">!Quienes Somos...¡</h4>
                <p>PROGRESCOL BIC S.A.S., es una empresa colombiana fundada en el año 2013, dedicada a la prestación de bienes y servicios especializados en seguridad social, seguridad y salud en el trabajo, higiene y seguridad industrial y medio ambiente. Desde su establecimiento, la empresa se ha destacado por su compromiso con la mejora continua de las condiciones laborales y ambientales en diversas industrias y sectores en Colombia.</p><br/>
            </div>
           
           <ul class="timeline">
                <?php
                $contador=1; /* Sentencia contador */
                foreach($lista_entradas as $registros){
                ?>
                <li <?php echo(($contador%2)==0)?'class="timeline-inverted"':"";?>>
                    <div class="timeline-image"> <img class="rounded-circle img-fluid"src="assets/img/about/<?php echo $registros['imagen'];?>"alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                    <h4><?php echo $registros ['fecha'];?></h4>
                                    <h4 class="subheading"><?php echo $registros ['titulo'];?></h4>
                            </div>
                            <div class="timeline-body"> <p class="text-muted"><?php echo $registros ['descripcion'];?></p></div>
                        </div>
                </li>
                <?php 
                $contador++;
            } ?>
                <li class="timeline-inverted center">
                    <div class="timeline-image">
                        <p><br/><br/>Has parte<br/>
                                    de nuestra<br/>
                                    ¡Historia <br/>
                                    hacia el futuro!
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
<!-- Equipo-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center"> 
                <h2 class="section-heading text-uppercase">Nuestro Equipo</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            
            <!-- Perfil -->
            <div class="row">
            <?php foreach($lista_equipo as $registros){?> <!-- Llama registro desde la BD -->
                <div class="col-lg-4"> 
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Dehiby Mendoza Dueñas</h4>
                                <p class="text-muted">CEO<br>Representante Legal</p>
                                <!-- Redes Sociales -->
                                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            </div>
        </div>
    </section>
<!-- Blog -->
    <section class="page-section" id="blog">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Blog</h2>
                <h3 class="section-subheading text-muted">Nuestros apuntes</h3>
            </div>
                <!-- <ul class="timeline">
                    <?php foreach($lista_entradas as $registros){?>
                    <li class="timeline-badge">
                            
                            <div class="timeline-image"><img class="rounded-circle img-fluid"src="assets/img/about/1.jpg" alt="..." /></div>
                            <div class="timeline-panel">
                            <div class="timeline-heading">
                                    <h4><?php echo $registros ['fecha'];?></h4>
                                    <h4 class="subheading"><?php echo $registros ['titulo'];?></h4>
                                </div>
                                <div class="timeline-body"> <p class="text-muted"><?php echo $registros ['descripcion'];?></p>
                                </div>
                            </div>
                    </li>
                        <?php } ?> -->
                    <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>
                                    Deja tus opiniones<br/>
                                    nosotros té escuchamos<br/>
                                    ¡Historia!
                                </h4>
                            </div>
                    </li>
                </ul>
    </div>
    </section>
<!-- Clients-->
    <div class="py-5">
    <div class="container">
        <div class="text-center">
            <h3 class="section-heading text-uppercase">Quienes Nos Conocen </h3>
        </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/inyemetal.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/Mascompost.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/acoproho.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/meteorika.jpg" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/maqpascua.PNG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/magnaplast.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/mintrabajo.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/positiva.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/arlbolivar.jpg" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/equidad.JPG" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/colmena.jpg" alt="..."/></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/sura.JPG" alt="..."/></a>
                    </div>
                </div>
            </div>
        </div>
<!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">CONTACTANOS</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Cual es tu Nombre*" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Cual es tu Email*" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="cual es tu numero de contacto*" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Cuentanos en que podemos ayudarte*" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <!-- Volver arriva -->
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <di class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright 2024 &copy; PROGRESCOL BIC S.A.S.</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Politica de Privacidad</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </di>
        </footer>

        <!-- whatsapp -->
            <a href="https://api.whatsapp.com/send/?phone=573006471100&text&type=phone_number&app_absent=0" target="_blank" class="wwp-flotante">
            <img data-lazyloaded="1" src="https://Progrescol.com/wp-content/uploads/2020/04/whatsapp.svg" 
            data-src="https://Progrescol.com/wp-content/uploads/2020/04/whatsapp.svg" 
            alt="whatsapp" data-ll-status="loaded" class="entered litespeed-loaded">
            <!-- Chatbot -->
           </a>
        <!-- scroll -->
        <a id="back-to-top" href="#" class="show"> ==$0
            <i class="flaticon-arrow-pointing-to-up">::BEFORE</i>
        </a>
<!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
