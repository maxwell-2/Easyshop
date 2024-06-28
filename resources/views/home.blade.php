<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Easy</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                    @auth
                    <form class="" action="{{route('user.deconnexion')}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="my-auto btn btn-primary">
                        Déconnexion
                    </button>
                    </form>
                    @endauth
                    @guest
                    <div>
                    <a style="text-decoration:none" class="btn btn-primary" href="{{route('user.connexion')}}" class="my-auto">
                        Connexion
                    </a>
                    <a style="text-decoration:none" class="btn btn-primary ml-2" href="{{route('user.inscription')}}" class="my-auto">
                        Inscription
                    </a>
                    </div>
                   @endguest
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="" class="nav-item nav-link">Vêtements</a>
                        <a href="" class="nav-item nav-link">Chaussures</a>
                        <a href="" class="nav-item nav-link">Outis_Informatiques</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Easy</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('user.accueil')}}" class="nav-item nav-link active">Accueil</a>
                            <a href="{{route('user.boutique')}}" class="nav-item nav-link">Boutique</a>
                            <a href="#apropos" class="nav-item nav-link">Apropos</a>
                            <a href="{{route('user.contact')}}" class="nav-item nav-link">Contact</a>
                            @can('delete',$produit)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">EspaceVendeur<i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="{{route('admin.property.index')}}" class="dropdown-item">Gestion des produits</a>
                                    <a href="{{route('admin.categorie.index')}}" class="dropdown-item">Gestion des categories</a>
                                    <a href="{{route('admin.achat')}}" class="dropdown-item">Gestion des achats</a>
                                </div>
                            </div>
                            @endcan
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="{{route('user.voirepanier')}}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="font-size:15px;font-weight:bold;padding-bottom: 2px;">Panier</span>
                            </a>
                            @auth
                            <div class="">
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                             <span class="" style="font-weight:bold;color:light;font-size:20px">{{\Illuminate\Support\Facades\Auth::user()->name .' '.\Illuminate\Support\Facades\Auth::user()->secondname }}</span>
                            </div>
                            @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3 ml-5 mt-0">
        <div class="row px-xl-5">
            <div class="col-lg-8 w-100">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0 w-100" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner " style="height: 500px; width:1500px;">
                        <div class="carousel-item position-relative active " style="height: 500px; width:1320px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('img/cat_vetement.jpg')}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Mode Vêtements</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Découvrez notre collection exclusive de vêtements tendance et élégants, conçus pour vous démarquer avec style et sophistication.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 500px; width:1320px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('img/cat_chaussure.jpg')}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Mode chaussures</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Explorez notre gamme exceptionnelle de chaussures élégantes et confortables, parfaites pour chaque occasion et toutes vos aventures.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 500px; width:1320px;">
                            <img class="position-absolute w-100 h-100" src="{{asset('img/cat_outil_informatique.jpg')}}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Outils_Informatiques de qualité</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Découvrez nos outils informatiques de pointe, conçus pour optimiser votre productivité et vous offrir une expérience technologique inégalée.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Produits de qualité</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Livraison gratuite</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Retour sous 14 jours</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Assistance 24h/24 et 7j/7</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
    @if(session('success'))
     <div class="alert alert-success">
        {{session('success')}}
     </div>
    @endif
    </div>
    
        @yield("content")

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5 pl-5   ">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Entrer en contact</h5>
                <p class="mb-4">Pour toute question ou besoin d'assistance n'hésitez </br>
                pas à nous contacter notre équipe dans la page contact 
               </br>notre équipe dédiée est là pour vous aider à trouver les</br> 
               chaussures, vêtements et outils informatiques parfaits pour vous.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Gbégamey, Cotonou, Bénin</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ketikouam@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+229 54140878</p>
            </div>
            <div class="col-lg-8 col-md-12 pl-5">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"> boutique en ligne</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="{{route('user.accueil')}}"><i class="fa fa-angle-right mr-2"></i>Accueil</a>
                            <a class="text-secondary mb-2" href="{{route('user.boutique')}}"><i class="fa fa-angle-right mr-2"></i>Boutique</a>
                            <a class="text-secondary mb-2" href="{{route('user.contact')}}"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5 ">
                        <h5 class="text-secondary text-uppercase mb-4">Bulletin</h5>
                        <p>Lettre d'information périodique du site</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Nous suivre</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                © Copyright 2024 Esayshop. Tous droits réservés
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
   
</body>

</html>