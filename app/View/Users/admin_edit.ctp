
<div class="right_content">
    <h2>Edit User</h2>

    <div class="form">

        <?php echo $this->Form->create('User',array(
            'class' => 'niceform',
            'id' => 'edit-user',
            'inputDefaults' => array('label' => false)
        ))?>
        <?php echo $this->Form->hidden('id')?>
        <fieldset>
            <dl>
                <dt><label for="name">Name:</label></dt>
                <dd><?php echo $this->Form->input('name',array('size' => '54'))?></dd>
            </dl>
            <dl>
                <dt><label for="email">Email address:</label></dt>
                <dd><?php echo $this->Form->input('email',array('size' => '54','type' => 'text'))?></dd>
            </dl>


            <dl>
                <dt><label for="gender">Select categories:</label></dt>
                <dd>
                    <?php echo $this->Form->input('group', array(
                        'style' => 'select',
                        'options' => $group,
                        'size' => '1'
                    ))?>
                </dd>
            </dl>

            <dl class="submit">
                <?php echo $this->Form->submit()?>
            </dl>
        </fieldset>
        <?php echo $this->Form->end()?>
        </form>
        <div class="error_box">Error</div>
        <div class="valid_box">Success</div>
    </div>
</div>