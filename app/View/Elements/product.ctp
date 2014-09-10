<div class="product">
    <?php foreach($products as $item):?>
        <div class="item">
            <?php echo $this->Image->resize($item['Image'][0]['name'], Configure::read('S.imageProduct'), 215,150);?>
            <div class="description">
                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'viewProduct', $item['Product']['id']));?>"><p><?php echo $item['Product']['name']?></p></a>
                <p><?php echo $item['Product']['description']?></p>
            </div>
        </div>
    <?php endforeach?>
</div>