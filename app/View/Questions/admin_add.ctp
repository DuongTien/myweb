<div class="right_content">
    <h2>Nice Form example</h2>
    <div class="form">
        <?php echo $this->Form->create('Question', array('class' => 'niceform', 'inputDefaults' => array('label' => false)));?>
            <fieldset>
                <?php echo $this->Form->hidden('id');?>
                <dl>
                    <dt><label for="text">Question:</label></dt>
                    <dd><?php echo $this->Form->input('question')?></dd>
                </dl>
                <dl>
                    <dt><label for="text">Answer:</label></dt>
                    <dd><?php echo $this->Form->input('answer')?></dd>
                </dl>
                <dl class="submit"><?php echo $this->Form->submit();?></dl>
            </fieldset>
        <?php echo $this->Form->end();?>
    </div>
</div>
