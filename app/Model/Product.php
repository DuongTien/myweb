<?php
    class Product extends AppModel{
        public $belongsTo = array('Category');
        public $hasMany = array('Image');
    }
?>