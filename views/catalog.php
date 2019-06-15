<div class="catalog">
    <div class="row productsList">
        <?php foreach ($products as $product) : ?>
            <div class="fetured__poster" onclick="window.location = '/?c=product&a=card&id=<?=$product['id']?>'">
                <div class="poster__header" >
                    <img src="<?=$smallImgPath . $product['src']?>" alt="<?=$product['name']?>">
                    <div class="poster__header__botton">
                        <button data-id="<?=$product['id']?>" class="action" onclick="event.stopPropagation()">
                            <img src="./img/basket.png" alt="Basket">
                            Add to&nbsp;Basket
                        </button>
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

<script>
    $(document).ready(function(){
        $(".action").on('click', function(){
            let id = $(this).attr('data-id');
            $.ajax({
                url: "?c=basket&a=addbasket",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {
                        $("#count").html(answer.count);
                    }
                }

            })
        });

    });
</script>
