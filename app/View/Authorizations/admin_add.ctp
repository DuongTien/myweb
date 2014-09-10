<div class="right_content">
<h2>Nice Form example</h2>

<div class="form">
    <?php echo $this->Form->create('Authorization', array('class' => 'niceform', 'inputDefaults' => array('label' => false)));?>
        <?php echo $this->Form->hidden('id')?>
        <fieldset>
            <dl>
                <dt><label for="email">Controller:</label></dt>
                <dd><?php echo $this->Form->input('controller', array('size' => '54'));?></dd>
            </dl>
            <dl>
                <dt><label for="password">Action:</label></dt>
                <dd><?php echo $this->Form->input('action', array('size' => '54'));?></dd>
            </dl>
            <dl>
                <dt><label for="gender">Select categories:</label></dt>
                <dd><?php echo $this->Form->input('group', array('style' => 'select', 'options' => $group, 'size' => '1'))?></dd>
            </dl>
            <dl class="submit"><?php echo $this->Form->submit();?></dl>
        </fieldset>
    <?php echo $this->Form->end();?>
</div>
    </div>