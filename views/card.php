<?php
/** @var app\model\Products $product */
?>

<div class="col-md-8 offset-md-2">
    <div class="row card">
        <div>
            <img src="<?=BIG_IMG . str_replace(".", "_1.", $product->src)?>" alt="<?=$product->name?>">
        </div>
        <div class="card__text">
            <h1><?=$product->name?></h1>
            <p><?=$product->description?></p>
            <h2>Стоимость: &#36;<?=$product->price?>.00</h2>
            <a class="btn btn-primary" href="#">Add to Basket</a>
        </div>
    </div>
</div>
