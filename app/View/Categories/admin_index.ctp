
<div class="right_content">
    <h2>List Category</h2>
    <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
        <thead>
        <tr>
            <th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Category</th>
            <th scope="col" class="rounded">Description</th>
            <th scope="col" class="rounded">created</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>

        <tbody>
            <?php foreach($categories as $item):?>
            <tr>
                <td><input type="checkbox" name="" /></td>
                <td><?php echo $item['Category']['name']?></td>
                <td><?php echo $item['Category']['description']?></td>
                <td><?php echo $item['Category']['created']?></td>

                <td><a class="edit-Category" href="<?php echo $this->Html->url(array('controller' => 'Categories', 'action' => 'admin_edit', $item['Category']['id']))?>"><?php echo $this->Html->image('../admin/images/user_edit.png')?></a></td>
                <td><a class="del-Category" href="<?php echo $this->Html->url(array('controller' => 'Categories', 'action' => 'admin_delete', $item['Category']['id']))?>"><?php echo $this->Html->image('../admin/images/trash.png')?></a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>


    <div class="pagination">
        <?php
        echo $this->Paginator->prev('<< '.__('prev'),array('class' => 'disabled','tag' => false));
        echo $this->Paginator->numbers(array('separator' => false));
        echo $this->Paginator->next(__('next').' >>',array('class' => 'disabled','tag' => false));
        ?>

    </div>
    <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'admin_add')) ?>" id="addCategory" class="bt_green"><span class="bt_green_lft"></span><strong>Add new Category</strong><span class="bt_green_r"></span></a>
    <a href="" class="bt_blue">
        <span class="bt_blue_lft"></span>
        <strong>View all items from category</strong>
        <span class="bt_blue_r"></span>
    </a>
    <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>
</div>