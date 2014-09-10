
    <div class="col-md-3">
        <div class="middle-right">
            <div class="category">
                <h2>CATEGORY</h2>
                <ul>
                    <?php foreach($categories as $item):?><li><a href="#"><?php echo $this->Html->image('../frontend/images/middle/middle-right/category.png')?><span><?php echo $item;?></span></a></li><?php endforeach?>
                </ul>
            </div>
            <div class="support">
                <h2>HỖ TRỢ TRỰC TUYẾN</h2>
                <div class="yahoo">
                    <?php foreach($supports as $item):?>
                    <p><a href="ymsgr:sendIM?<?php echo $item['Support']['yahoo']?>"><img border="0" src="http://opi.yahoo.com/online?u=<?php echo $item['Support']['yahoo']?>&m=g&t=1&l=us"> <?php echo $item['Support']['username']?></a></p>
                    <?php endforeach?>
                </div>
                <div class="phone">
                    <?php echo $this->Html->image('../frontend/images/middle/middle-right/phone.png')?><label><?php echo $setting[0]['Setting']['phone_support'];?></label><br>
                    <?php echo $this->Html->image('../frontend/images/middle/middle-right/email.png')?><span><?php echo $setting[0]['Setting']['email'];?></span>
                </div>
            </div>
            <div class="question">
                <?php echo $this->Html->image('../frontend/images/middle/question.jpg')?>
                <ul><?php foreach($questions as $item):?>
                    <li><?php echo $this->Html->image('../frontend/images/middle/middle-right/question.png')?><span><?php echo $item['Question']['question']?></span></li>
                    <li>Đáp: <?php echo $item['Question']['answer']?></li>
                <?php endforeach?></ul>
            </div>
        </div>
    </div>
