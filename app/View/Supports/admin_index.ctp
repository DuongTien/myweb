
<div class="right_content">
<h2>Products Categories Settings</h2>


<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    <tr>
        <th scope="col" class="rounded-company"></th>
        <th scope="col" class="rounded">ID</th>
        <th scope="col" class="rounded">User name</th>
        <th scope="col" class="rounded">Yahoo</th>
        <th scope="col" class="rounded">Created</th>
        <th scope="col" class="rounded">Edit</th>
        <th scope="col" class="rounded-q4">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach($supports as $item):?>
    <tr>
        <td><input type="checkbox" name="" /></td>
        <td><?php echo $item['Support']['id']?></td>
        <td><?php echo $item['Support']['username']?></td>
        <td><?php echo $item['Support']['yahoo']?></td>
        <td>12/<?php echo $item['Support']['created']?>/2010</td>

        <td><a href="<?php echo $this->Html->url(array('controller' => 'supports', 'action' => 'admin_edit', $item['Support']['id']))?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
        <td><a href="<?php echo $this->Html->url(array('controller' => 'supports', 'action' => 'admin_delete', $item['Support']['id']))?>" class="del-support"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
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

    <a href="<?php echo $this->Html->url(array('controller' => 'supports', 'action' => 'admin_add')) ?>" class="bt_green"><span class="bt_green_lft"></span><strong>Add new Product</strong><span class="bt_green_r"></span></a>
    <a href="" class="bt_blue">
        <span class="bt_blue_lft"></span>
        <strong>View all items from category</strong>
        <span class="bt_blue_r"></span>
    </a>
    <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>
</div>