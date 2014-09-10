<div class="right_content">
    <h2>Authorization</h2>
    <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
        <thead>
        <tr>
            <th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Group User</th>
            <th scope="col" class="rounded">Controller</th>
            <th scope="col" class="rounded">Action</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($auths as $item):?>
        <tr>
            <td><input type="checkbox" name="" /></td>
            <td><?php echo $group[$item['Authorization']['group']]?></td>
            <td><?php echo $item['Authorization']['controller']?></td>
            <td><?php echo $item['Authorization']['action']?></td>
            <td><a href="<?php echo $this->Html->url(array('controller' => 'authorizations', 'action' => 'admin_edit', $item['Authorization']['id']));?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="<?php echo $this->Html->url(array('controller' => 'authorizations', 'action' => 'admin_delete', $item['Authorization']['id']));?>" class="del-authorization"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
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

    <a href="<?php echo $this->Html->url(array('controller' => 'authorizations', 'action' => 'admin_add')) ?>" class="bt_green"><span class="bt_green_lft"></span><strong>Add new Authorization</strong><span class="bt_green_r"></span></a>
    <a href="" class="bt_blue">
        <span class="bt_blue_lft"></span>
        <strong>View all items from category</strong>
        <span class="bt_blue_r"></span>
    </a>
    <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>
</div>