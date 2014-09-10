
<div class="right_content">
    <h2>Category</h2>

    <div class="form">
        <?php
            echo $this->Form->create('Category',array('class' => 'niceform', 'id' => 'add-category', 'inputDefaults' => array('label' => false)));
            echo $this->Form->hidden('id');
        ?>
            <fieldset>
                <dl>
                    <dt><label for="text">Name:</label></dt>
                    <dd><?php echo $this->Form->input('name', array('size' => '54'))?></dd>
                </dl>
                <dl>
                    <dt><label for="text">Description</label></dt>
                    <dd><?php echo $this->Form->input('description', array('size' => '54'))?></dd>
                </dl>
                <dl class="submit">
                    <?php echo $this->Form->submit('Submit')?>
                </dl>
            </fieldset>
        <?php echo $this->Form->end()?>
        <div class="error_box">Error</div>
        <div class="valid_box">Success</div>
    </div>
</div>
