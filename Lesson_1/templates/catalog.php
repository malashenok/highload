<div class="content">
    <?php if ($params != null && is_array($params)): ?>
        <?php foreach($params as $item): ?>
            <div class="product-item">
                <img class="product-img" src="https://placehold.it/200x150" alt="Some img">
                <div class="desc">
                    <h3><?=$item['name']?></h3>
                    <p><?=$item['price'] . "$"?></p>
                    <button class="buy-btn">Купить</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>