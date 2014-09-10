
<div class="right_content">
    <h2>List Products</h2>
    <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
        <thead>
        <tr>
            <th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Product</th>
            <th scope="col" class="rounded">Category</th>
            <th scope="col" class="rounded">Price</th>
            <th scope="col" class="rounded">Image</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($products as $item):?>
        <tr>
            <td><input type="checkbox" name="" /></td>
            <td><?php echo $item['Product']['name']?></td>
            <td><?php echo $item['Category']['name']?></td>
            <td><?php echo $item['Product']['price']?></td>
            <td><?php
                if(!empty($item['Image'])){
                    $photos = $item['Image'];
                    foreach($photos as $photo){
                        echo $this->Image->resize($photo['name'], Configure::read('S.imageProduct'), 40, 40  );
                    }
                }
                ?>
            </td>

            <td><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'admin_edit', $item['Product']['id']))?>"><?php echo $this->Html->image('../admin/images/user_edit.png')?></a></td>
            <td><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'admin_delete', $item['Product']['id']))?>" class="del-product"><?php echo $this->Html->image('../admin/images/trash.png')?></a></td>
        </tr>
        <?php endforeach?>
        </tbody>
    </table>

    <div class="pagination">
        <?php
        echo $this->Paginator->prev('<< '.__('prev'),array('class' => 'disabled','tag' => false));
        echo $this->Paginator->numbers(array('separator' => false));
        echo $this->Paginator->next(__('next').' >>',array('class' => 'disabled','tag' => false));
        ?>

    </div>

    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'admin_add')) ?>" class="bt_green"><span class="bt_green_lft"></span><strong>Add new Product</strong><span class="bt_green_r"></span></a>
    <a href="" class="bt_blue">
        <span class="bt_blue_lft"></span>
        <strong>View all items from category</strong>
        <span class="bt_blue_r"></span>
    </a>
    <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>
</div>