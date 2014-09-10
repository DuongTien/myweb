<div class="right_content">
    <h2>Add User</h2>

    <div class="form">

        <?php echo $this->Form->create('User',array(
            'class' => 'niceform',
            'id' => 'add-user',
            'inputDefaults' => array('label' => false)
        ))?>
            <fieldset>
                <dl>
                    <dt><label for="name">Name:</label></dt>
                    <dd><?php echo $this->Form->input('name',array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="username">User name:</label></dt>
                    <dd><?php echo $this->Form->input('username',array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="password">Password:</label></dt>
                    <dd><?php echo $this->Form->input('password',array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="email">Email address:</label></dt>
                    <dd><?php echo $this->Form->input('email',array('size' => '54','type' => 'text'))?></dd>
                </dl>

                <dl>
                    <dt><label for="gender">Select categories:</label></dt>
                    <dd><?php echo $this->Form->input('group', array('style' => 'select', 'options' => $group, 'size' => '1'))?></dd>
                </dl>

                <dl class="submit">
                    <?php echo $this->Form->submit()?>
                </dl>
            </fieldset>
        <?php echo $this->Form->end()?>
        <div class="error_box">Error</div>
        <div class="valid_box">Success</div>
    </div>
</div>