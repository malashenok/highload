<nav>
    <?php if ($params != null && is_array($params)): ?>
    <ul class="main-menu">
        <?php foreach($params as $key => $item): ?>
            <?php if (!is_array($item)): ?>
                <li><a href="#"><?=$item?></a>
            <?php else: ?>
                <li class="menu"><a href="#"><?=$key?></a>
                <ul class="sub-menu">
                    <?php foreach($item as $subitem): ?>
                        <li><?=$subitem?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
        <li><a class="search" href="#"><img src="img/search.png" alt="search"></a></li>
    </ul>
    <?php endif; ?>
</nav>