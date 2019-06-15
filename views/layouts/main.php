<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="./style/bootstrap_skin.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>
<body>
    <header class="container header">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="/" class="logo">
                    <img src="./img/logo.png" alt="Brand" class="logo__img">
                    BRAN<span>D</span>
                </a>
            </div>
            <div class="col-md-7">
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav menu">
                                <li class="nav-item"> <a class="nav-link" href="/">MAIN</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/?c=product&a=catalog">CATALOG</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/?c=basket">BASKET</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-2">
                <div class="btn-group basket">
                    <button type="button" class="btn btn-primary dropdown-toggle basket__btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="basket__ico">
                            <img src="./img/basket.png" alt="Basket" class="basket__img">
                            <span class="badge badge-pill badge-light countProducts" id="count"><?=$count?></span>
                        </div>
                        Basket
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                        <div class="dropdown-item">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="container shop">
        <div class="row">
            <div class="col-md-12">
                <?=$content?>
            </div>
        </div>
    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
