<?if ($basket):?>
    <h2><strong>Basket (<span id="basketCount"><?=$count?></span> pc. product)</strong></h2><br>
    <div class="basket">
        <table cellspacing="0" class="basketProduct">
            <?php foreach ($products as $product) : ?>
                <tr class="bodyBasket" id="basket<?=$product['id_basket']?>">
                    <th class="bodyBasket__img"><img class="bigImgProdBasket" src="<?=$smallImgPath . $product['src']?>" alt="<?=$product['name']?>"></th>
                    <th class="bodyBasket__title"><?=$product['name']?></th>
                    <th class="bodyBasket__price">&#36;<?=$product['price']?>.00</th>
                    <!--<th class="bodyBasket__quantity"><?=$quantity?></th>-->
                    <th>
                        <button class="delProdBasket" data-id="<?=$product['id_basket']?>">X</button>
                    </th>
                </tr>
            <?php endforeach ?>
        </table>
        <div class="btnBasket">
            <button type="button" class="btn btn-primary clearBasket">Clear shopping basket</button>
            <a href="/product/catalog/" class="btn btn-primary">Continue shopping</a>
        </div>
        <div class="grandTotal">
            Grand total &#8195;<span>&#36;</span><span><?=$total?></span>
        </div>
    </div>
<?else:?>
    <h3>Корзина пуста</h3>
<?endif;?>
