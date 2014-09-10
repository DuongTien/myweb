<?php
App::uses('AppController', 'Controller');
class FrontendController extends AppController {
    public $uses = array('Product', 'Post');
    public function Frontend() {
        $this->paginate = array('limit' => '9');
        $products = $this->paginate('Product');

        $heath = $this->Post->find('all', array('conditions' => array('Post.group' => GROUP_HEATH)));
        $this->set(compact('products', 'heath'));
    }
}
