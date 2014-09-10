
<div class="right_content">
    <h2>Admin Home</h2>

    <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
        <thead>
        <tr>
            <th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">User</th>
            <th scope="col" class="rounded">User Name</th>
            <th scope="col" class="rounded">Email</th>
            <th scope="col" class="rounded">Group</th>
            <th scope="col" class="rounded">Date</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($users as $item):?>
        <tr>
            <td><input type="checkbox" name="" /></td>
            <td><?php echo $item['User']['name']?></td>
            <td><?php echo $item['User']['username']?></td>
            <td><?php echo $item['User']['email']?></td>
            <td><?php echo $group[$item['User']['group']]?></td>
            <td><?php echo $item['User']['created']?></td>

            <td><a id="user-edit" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_edit', $item['User']['id']))?>"><?php echo $this->Html->image('../admin/images/user_edit.png')?></a></td>
            <td><a class="user-del-12" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_delete', $item['User']['id']))?>"><?php echo $this->Html->image('../admin/images/trash.png')?></a></td>
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

    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_add')) ?>" class="bt_green"><span class="bt_green_lft"></span><strong>Add new User</strong><span class="bt_green_r"></span></a>
    <a href="" class="bt_blue">
        <span class="bt_blue_lft"></span>
        <strong>View all items from category</strong>
        <span class="bt_blue_r"></span>
    </a>
    <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>
</div>