
<div class="right_content">
    <h2>Add Product</h2>

    <div class="form">
        <?php
            echo $this->Form->create('Product',array('class' => 'niceform', 'type' => 'file', 'inputDefaults' => array('label' => false), 'radioDefaults' => array('label' => false)));
            echo $this->Form->hidden('id');
        ?>
            <fieldset>
                <dl>
                    <dt><label for="name">name:</label></dt>
                    <dd><?php echo $this->Form->input('name', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="gender">Select categories:</label></dt>
                    <dd><?php echo $this->Form->input('category_id', array('options' => $categories, 'size' => 1, 'style' => 'select'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">price:</label></dt>
                    <dd><?php echo $this->Form->input('price', array('size' => '54', 'type' => 'text'))?></dd>
                </dl>

                <dl>
                    <dt><label for="upload">Upload a File:</label></dt>
                    <dd><?php echo $this->Form->image('Image.', array('type' => 'file', 'multiple'=>true))?></dd>
                </dl>
                <dl>
                    <dt><label>options</label></dt>
                    <dd>
                        <?php
                        echo $this->Form->input('options', array(  'type' => 'radio','options'=>$categories, 'hiddenField' => false));
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt><label for="comments">Description:</label></dt>
                    <dd><?php echo $this->Form->input('description')?></dd>
                </dl>

                <dl class="submit">
                    <?php echo $this->Form->submit()?>
                </dl>
            </fieldset>
        <?php echo $this->Form->end()?>
    </div>
</div>

