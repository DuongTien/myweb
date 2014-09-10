<div class="left_content">

    <div class="sidebar_search">
        <?php echo $this->Form->create(array(
            'inputDefaults' => array(
                'label' => false
            )
        ))?>
        <?php echo $this->Form->input('search',array(
            'class' => 'search_input',
        ))?>
        <?php echo $this->Form->input(__('Search'),array(
            'type' => 'image',
            'class' => 'search_submit',
            'src' => $this->base.'/admin/images/search.png'
        ))?>
        <?php echo $this->Form->end()?>
    </div>

    <div class="sidebarmenu">

        <a class="menuitem submenuheader" href="">Subcategories</a>
        <div class="submenu">
            <ul>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
            </ul>
        </div>
        <a class="menuitem submenuheader" href="" >Sidebar Settings</a>
        <div class="submenu">
            <ul>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
            </ul>
        </div>
        <a class="menuitem submenuheader" href="">Add new products</a>
        <div class="submenu">
            <ul>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
                <li><a href="">Sidebar submenu</a></li>
            </ul>
        </div>
        <a class="menuitem" href="">User Reference</a>
        <a class="menuitem" href="">Blue button</a>

        <a class="menuitem_green" href="">Green button</a>

        <a class="menuitem_red" href="">Red button</a>

    </div>
</div>