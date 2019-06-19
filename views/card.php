<?php
/** @var app\model\Products $product */
?>

<div class="col-md-8 offset-md-2">
    <div class="row card">
        <?if ($product):?>
            <div>
                <img src="<?=$bigImgPath . $imgName?>" alt="<?=$product->name?>">
            </div>
            <div class="card__text">
                <h1><?=$product->name?></h1>
                <p><?=$product->description?></p>
                <h2>Стоимость: &#36;<?=$product->price?>.00</h2>
                <button class="btn btn-primary action" data-id="<?=$product->id?>" class="action">Add to Basket</button>
            </div>
        <?else:?>
            <h3>Товар не найден</h3>
        <?endif;?>
    </div>
</div>
