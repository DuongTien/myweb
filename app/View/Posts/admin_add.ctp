<div class="right_content">
    <h2>Nice Form example</h2>

    <div class="form">
        <?php
            echo $this->Form->create('Post', array(
                'class' => 'niceform',
                'type'=>'file',
                'inputDefaults' => array('label' => false)
            ));
            echo $this->Form->hidden('id');
        ?>

            <fieldset>
                <dl>
                    <dt><label for="gender">Select categories:</label></dt>
                    <dd><?php echo $this->Form->input('group',array('options' => $group_post, 'size' => '1'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Title</label></dt>
                    <dd><?php echo $this->Form->input('title', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Subject:</label></dt>
                    <dd><?php echo $this->Form->input('subject', array('size' => '54', 'type' => 'text'))?></dd>
                </dl>

                <dl>
                    <dt><label for="upload">Image:</label></dt>
                    <dd><?php echo $this->Form->image('image', array('type' => 'file'))?></dd>
                </dl>

                <dl class="tinymce">
                    <dt><label>Content:</label></dt>
                    <dd><?php echo $this->Form->input('content', array('size' => '54', 'id' => 'post-content'))?></dd>
                </dl>

                <dl class="submit"><?php echo $this->Form->submit()?></dl>

            </fieldset>
        <?php echo $this->Form->end();?>
    </div>
</div>
