<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Dược phẩm như thủy</title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('../frontend/bootstrap/css/bootstrap.min');
        echo $this->Html->css('../frontend/css/jquery.bxslider');
        echo $this->Html->css('../frontend/css/styles');

        echo $this->Html->script('../frontend/jquery/jquery-1.11.1.min');
        echo $this->Html->script('../frontend/jquery/jquery.bxslider.min');
        echo $this->Html->script('../frontend/bootstrap/js/bootstrap.min');
        echo $this->Html->script('../frontend/js/javascript');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

</head>
<body>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
<div
    class="fb-like"
    data-send="true"
    data-width="450"
    data-show-faces="true">
</div>
    <div class="container">
        <div class="top">
            <div class="row">
                <div class="col-md-12">
                    <div class="language">
                        <?php
                            echo $this->Html->image('../frontend/images/language/english.jpg');
                            echo $this->Html->image('../frontend/images/language/vn.jpg');
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <div class="logo">
                        <?php echo $this->Html->image('../frontend/images/header/logo/logo.jpg')?>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="slogan">
                        <h1>DƯỢC PHẨM NHƯ THỦY</h1>
                        <h4>Dược phẩm của mọi gia đình</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-header">
                        <?php echo $this->Html->image('../frontend/images/header/right-header.jpg')?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="bxslider">
                        <?php
                            echo '<li>'.$this->Html->image('../frontend/images/header/slider/image1.jpg').'</li>';
                            echo '<li>'.$this->Html->image('../frontend/images/header/slider/image2.jpg').'</li>';
                            echo '<li>'.$this->Html->image('../frontend/images/header/slider/image3.jpg').'</li>';
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"  href="<?php echo $this->Html->url(array('controller' => 'frontend', 'action' => 'frontend'));?>">Trang chủ</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="navbar-brand">Giới thiệu</a></li>
                        <li><a href="#" class="navbar-brand">Tin tức</a></li>
                        <li><a href="#" class="navbar-brand">Sản phẩm</a></li>
                        <li><a href="#" class="navbar-brand">Thông tin sức khỏe</a></li>
                        <li><a href="#" class="navbar-brand">Tư vấn</a></li>
                        <li><a href="#" class="navbar-brand">Hệ thống phân phối</a></li>
                        <li><a href="#" class="navbar-brand">Liên hệ</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </nav>
            <div class="menu-bottom">
                <div class="row">
                    <div class="col-md-3">
                        <div class="cart">
                            <?php   echo $this->Html->image('../frontend/images/menu/cart.png')?>
                            <a href="#">Giỏ hàng</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="link">
                            <label>Liên kết</label>
                            <select class="form-control link">
                                <option value=""></option>
                                <option value="">Liên kết 1</option>
                                <option value="">Liên kết 2</option>
                                <option value="">Liên kết 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="search">
                            <label>Tìm kiếm</label>
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle">
            <div class="row">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div class="bottom">
            <div class="row">
                <div class="col-md-12">
                    <div class="address">
                        <h2><?php echo $setting[0]['Setting']['company_name']?></h2>
                        <p>Địa chỉ:<?php echo $setting[0]['Setting']['company_name']?></p>
                        <p>ĐT: <?php echo $setting[0]['Setting']['phone']?> Fax: <?php echo $setting[0]['Setting']['fax']?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-mini-bottom">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand"  href="#">Trang chủ</a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="#" class="navbar-brand">Power by Hiworld</a></li>
                                    <li><a href="#" class="navbar-brand">Giới thiệu</a></li>
                                    <li><a href="#" class="navbar-brand">Tin tức</a></li>
                                    <li><a href="#" class="navbar-brand">Sản phẩm</a></li>
                                    <li><a href="#" class="navbar-brand">Thông tin sức khỏe</a></li>
                                    <li><a href="#" class="navbar-brand">Tư vấn</a></li>
                                    <li><a href="#" class="navbar-brand">Hệ thống phân phối</a></li>
                                    <li><a href="#" class="navbar-brand">Liên hệ</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>