<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset();?>
        <title>IN ADMIN PANEL | Powered by INDEZINER</title>
        <?php
            echo $this->Html->css('../admin/css/style');
            echo $this->Html->script('../admin/js/jquery-1.11.1.min');
            echo $this->Html->script('../admin/js/clockp');
            echo $this->Html->script('../admin/js/clockh');
            echo $this->Html->script('../admin/js/jquery.min');
            echo $this->Html->script('../admin/js/ddaccordion');
            echo $this->Html->script('../admin/js/jconfirmaction.jquery');
            echo $this->Html->script('../admin/js/jquery.form.min');

            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <script type="text/javascript">
        var baseUrl = "<?php echo $this->base; ?>";
        ddaccordion.init({
            headerclass: "submenuheader", //Shared CSS class name of headers group
            contentclass: "submenu", //Shared CSS class name of contents group
            revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
            mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
            collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
            defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
            onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
            animatedefault: false, //Should contents open by default be animated into view?
            persiststate: true, //persist state of opened contents within browser session?
            toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
            togglehtml: ["suffix", "<img src='"+baseUrl+"/admin/images/plus.gif' class='statusicon' />", "<img src='"+baseUrl+"/admin/images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
            animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
            oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
            //do nothing
        }
    })
    </script>
        <?php
            echo $this->Html->css('../admin/css/niceforms-default',array('media' => 'all'));
            echo $this->Html->script('../admin/js/niceforms');
            echo $this->Html->script('../admin/tinymce/tinymce.min');
            echo $this->Html->script('../admin/js/global');
        ?>
    </head>
    <body>
        <div id="main_container">
        <div class="header">
        <div class="logo"><a href="#"><?php echo $this->Html->image('../admin/images/logo.gif')?></a></div>
        <div class="right_header">Welcome <?php echo $user['name']?>, <a href="#">Visit site</a> | <a href="#" class="messages">(3) Messages</a> | <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'))?>" class="logout">Logout</a></div>
        <div id="clock_a"></div>
        </div>
        <div class="main_content">
            <div class="menu">
            <ul>
                <li><?php echo $this->Html->link(__('Admin Home'),array('controller' => 'users', 'action' => 'admin_home'))?></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'admin_index'));?>">Product</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'admin_index'));?>">Category</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'admin_index'))?>">News</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'settings', 'action' => 'admin_index'));?>">Setting</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'supports', 'action' => 'admin_index'));?>">Support</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'authorizations', 'action' => 'admin_index'));?>">Authorization</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'admin_index'));?>">Question and Answer</a></li>
            </ul>
        </div>
        <div class="center_content">
            <?php echo $this->Session->flash()?>

            <?php echo $this->fetch('content')?>
            <!-- end of right content-->
        </div>   <!--end of center content -->
        <div class="clear"></div>
        </div> <!--end of main content-->
        <div class="footer">
            <div class="left_footer">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
            <div class="right_footer"><a href="http://indeziner.com"><?php echo $this->Html->image('../admin/images/indeziner_logo.gif', array('border' => '0'))?></a></div>
        </div>
    </body>
</html>