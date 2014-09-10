    <h2>Setting</h2>

    <div class="form">
        <?php
            echo $this->Form->create('Setting', array('class' => 'niceform', 'inputDefaults' => array('label' => false)));
            echo $this->Form->hidden('id');
        ?>

            <fieldset>
                <dl>
                    <dt><label for="text">Company name:</label></dt>
                    <dd><?php echo $this->Form->input('company_name', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Phone support:</label></dt>
                    <dd><?php echo $this->Form->input('phone_support', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Address:</label></dt>
                    <dd><?php echo $this->Form->input('address', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Email:</label></dt>
                    <dd><?php echo $this->Form->input('email', array('type' => 'text', 'size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Fax:</label></dt>
                    <dd><?php echo $this->Form->input('fax', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label for="text">Phone:</label></dt>
                    <dd><?php echo $this->Form->input('phone', array('type' => 'text', 'size' => '54'))?></dd>
                </dl>

                <dl class="tinymce">
                    <dt><label>Introduce:</label></dt>
                    <dd><?php echo $this->Form->input('introduce', array('id' => 'post-content'))?></dd>
                </dl>

                <dl class="submit"><?php echo $this->Form->submit()?></dl>

            </fieldset>
        <?php echo $this->Form->end();?>
    </div>
