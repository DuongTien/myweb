<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset()?>
    <title>IN ADMIN PANEL | Powered by INDEZINER</title>
    <?php
    echo $this->Html->css('../admin/css/style');
    echo $this->Html->script('../admin/js/jquery-1.4.2.min');
    echo $this->Html->script('../admin/js/jquery.min');
    echo $this->Html->script('../admin/js/ddaccordion');
    echo $this->Html->script('../admin/js/jconfirmaction.jquery');

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ask').jConfirmAction();
        });

    </script>
    <?php
        echo $this->Html->css('../admin/css/niceforms-default',array('media' => 'all'));
        echo $this->Html->script('../admin/js/niceforms');
    ?>
</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><?php echo $this->Html->image('../admin/images/logo.gif',array('border' => '0'))?></a></div>

    </div>


         <div class="login_form">

         <h3>Admin Panel Login</h3>

         <a href="#" class="forgot_pass">Forgot password</a>
         <?php echo $this->Form->create('User', array(
             'inputDefaults' => array('label' => false),
             'class' => 'niceform'
         ))?>
         
            <fieldset>
                <dl>
                    <dt><label for="email">Username:</label></dt>
                    <dd><?php echo $this->Form->input('username', array('size' => '54'))?></dd>
                </dl>
                <dl>
                    <dt><label for="password">Password:</label></dt>
                    <dd><?php echo $this->Form->input('password', array('size' => '54'))?></dd>
                </dl>

                <dl>
                    <dt><label></label></dt>
                    <dd>
                <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Remember me</label>
                    </dd>
                </dl>

                 <dl class="submit">
                     <?php echo $this->Form->submit(__('Submit'))?>
                 </dl>

            </fieldset>
                
         <?php echo $this->Form->end()?>
         </div>



    <div class="footer_login">

    	<div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer_login"><a href="http://indeziner.com"><?php echo $this->Html->image('../admin/images/indeziner_logo.gif',array('border' => '0'))?></a></div>

    </div>

</div>
</body>
</html>