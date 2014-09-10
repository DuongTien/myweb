<div class="right_content">
    <h2>Nice Form example</h2>
    <div class="form">
        <form action="" method="post" class="niceform"><?php echo $this->Form->create('Support', array('class' => 'niceform', 'inputDefaults' => array('label' => false)));?>
            <fieldset>
                <?php echo $this->Form->hidden('id');?>
                <dl>
                    <dt><label for="text">User Name:</label></dt>
                    <dd><?php echo $this->Form->input('username', array('size' => '54'))?></dd>
                </dl>
                <dl>
                    <dt><label for="text">Yahoo:</label></dt>
                    <dd><?php echo $this->Form->input('yahoo', array('size' => '54'))?></dd>
                </dl>
                <dl class="submit"><?php echo $this->Form->submit()?></dl>
            </fieldset>
            <?php echo $this->Form->end();?>
    </div>
</div>