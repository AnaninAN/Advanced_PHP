<div class="col-md-12 catalog">
    <div class="row productsList">
        <?php foreach ($products as $product) : ?>
            <div class="fetured__poster" onclick="window.location = '/?c=product&a=card&id=<?=$product['id']?>'">
                <div class="poster__header" >
                    <img src="<?=SMALL_IMG . $product['src']?>" alt="<?=$product['name']?>">
                    <div class="poster__header__botton">
                        <a href="#" onclick="event.stopPropagation()">
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
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <a class="btn btn-primary" href="?c=product&a=catalog&page=<?=$page?>">Показать ещё ...</a>
</div>
