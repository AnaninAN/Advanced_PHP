<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style/bootstrap_skin.css">
    <link rel="stylesheet" href="../../style/style.css">
    <title>Document</title>
</head>
<body>
    <header class="container header">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="/" class="logo">
                    <img src="../../img/logo.png" alt="Brand" class="logo__img">
                    BRAN<span>D</span>
                </a>
            </div>
            <div class="col-md-3">
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav menu">
                                <li class="nav-item"> <a class="nav-link" href="/">MAIN</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/product/catalog/">CATALOG</a></li>
                                <!--<li class="nav-item"> <a class="nav-link" href="/basket/">BASKET</a></li>-->
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-4">
                <?if ($auth):?>
                    Добро пожаловать <span class="userName"><?=$username?></span> <a href="/user/logout/"> [exit]</a>
                <?else:?>
                    <form action="/user/login/" method="post">

                            <input type="text" name="login" class="form-control" placeholder="login">


                            <input type="password" name="pass" class="form-control" placeholder="password">

                        <button type="submit" name="submit" class="btn btn-primary">log In</button>
                    </form>
                <?endif;?>
            </div>
            <div class="col-md-2">
                <div class="btn-group basket">
                    <button type="button" class="btn btn-primary dropdown-toggle basket__btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="basket__ico">
                            <img src="../../img/basket.png" alt="Basket" class="basket__img">
                            <span class="badge badge-pill badge-light countProducts" id="count"><?=$count?></span>
                        </div>
                        Basket
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                        <div class="dropdown-item">
                            <div class="basket">
                                <table cellspacing="0" class="basketProduct">
                                    <?php foreach ($products as $product) : ?>
                                        <tr class="bodyBasket">
                                            <th class="bodyBasket__img"><img class="smallImgProdBasket" src="<?=$smallImgPath . $product['src']?>" alt="<?=$product['name']?>"></th>
                                            <th class="bodyBasket__title"><?=$product['name']?></th>
                                            <th class="bodyBasket__price">&#36;<?=$product['price']?>.00</th>
                                            <!--<th class="bodyBasket__quantity"><?=$quantity?></th>-->
                                            <th>
                                                <button class="delProdBasket" data-id="<?=$product['id_basket']?>">X</button>
                                            </th>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                                <div class="bodyBasket__footer">
                                    <!--<div class="totalBasket">Total: <span>&#36;{{ total }}</span></div>-->
                                    <a href="/basket/" class="btn btn-primary goToBasket">go to basket</a>
                                </div>
                                <!--<h3>Корзина пуста</h3>
                                <div class="btnBasket">
                                    <button type="button" class="btn btn-primary">Clear shopping basket</button>
                                    <a href="index.html" class="btn btn-primary">Continue shopping</a>
                                </div>
                                <div class="grandTotal">
                                    Grand total &#8195;<span>&#36;{{ total }}</span>
                                </div>-->
                            </div>
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
