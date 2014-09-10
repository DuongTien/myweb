
<?php echo $this->Element('default_left_middle')?>
<div class="col-md-9">
    <div class="content">
    <?php echo $this->Element('product', array('products' => $products));?>
    <div class="news">
        <div class="health">
            <h2>THÔNG TIN SỨC KHỎE</h2>
            <div class="content-health">
                <h4><a href=""><?php echo $heath[0]['Post']['title']?></a></h4>
                <?php echo $this->Image->resize($heath[0]['Post']['image'], Configure::read('S.imagePost'), 250, 250);?>
                <p><?php echo $heath[0]['Post']['subject']?></p>
            </div>
            <div class="new-health">
                <ul>
                    <?php $i = 0?>
                    <?php foreach($heath as $item):?>
                        <?php if($i != 0):?>
                            <li><a href=""><?php echo $item['Post']['title']?></a></li>
                        <?php endif;?>
                        <?php $i ++;?>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="production">
            <?php echo $this->Html->image('../frontend/images/middle/production/image1.jpg')?>
            <h3>QUY TRÌNH SẢN XUẤT</h3>
            <p>Đạt tiêu chuẩn WHO-GMP Đạt tiêu chuẩn WHO-GMP, GLP, GSP và chủ trương của thành phố di dời các cơ sở sản xuất ra khỏi nội thành</p>
        </div>
    </div>
</div>
</div>