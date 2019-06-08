<div class="col-md-12">
    <div class="row productsList">
        <?php foreach ($products as $product) : ?>
            <div class="fetured__poster">
                <div class="poster__header">
                    <img src="./<?=$product['src']?>" alt="<?=$product['name']?>">
                    <div class="poster__header__botton">
                        <a href="#"">
                            <img src="./img/basket.png" alt="Basket">
                            Add to&nbsp;Basket
                        </a>
                    </div>
                </div>
                <div class="poster__footer">
                    <div>
                        <div class="poster__footer__title"><?=$product['name']?></div>
                        <div class="poster__footer__price">&#36;<?=$product['price']?>.00</div>
                    </div>
                    <a href="/?c=product&a=card&id=<?=$product['id']?>" class="poster__footer__more">more --></a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
