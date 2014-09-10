<?php
App::uses('AppController', 'Controller');


class ProductsController extends AppController {

    public $uses = array('Category','Image','Product');
    public function admin_add() {
        $categories = $this->Category->find('list');
        $this->set(compact('categories'));
        if(!empty($this->request->data)){
            debug($this->request->data);die;
            $photos = Tool::uploadMultipleFile(Configure::read('S.imageProduct'), $this->request->data['Product']['Image'], 'image');
            foreach($photos as $photo){
                $this->request->data['Image'][] = array(
                    'name'=>$photo,
                );
            }
            $this->Product->saveAll($this->request->data);
            $this->Session->setFlash('success');
        }
    }

    public function admin_index() {
        $this->paginate = array('limit' => '3');
        $products = $this->paginate('Product');
        $this->set(compact('products'));
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
    }

    public function admin_delete($id) {
        $this->autoRender = false;
        $status = false;
        if($this->Product->delete($id)){
            $status = true;
        }

        return json_encode(array(
            'status' => $status
        ));
    }

    public function admin_edit($id) {
        $categories = $this->Category->find('list');
        $this->set(compact('categories'));
        if(!empty($this->request->data)){
            $photos = Tool::uploadMultipleFile(Configure::read('S.imageProduct'), $this->request->data['Product']['Image'], 'image');
            foreach($photos as $photo){
                $this->request->data['Image'][] = array(
                    'name'=>$photo,
                );
            }
            $this->Product->saveAll($this->request->data);
            $this->Session->setFlash('success');
        }
        $product = $this->Product->find('first', array(
            'conditions' => array('Product.id' => $id)
        ));
        $this->request->data = $product;
        $this->render('admin_add');
    }

    public function viewProduct($id) {
        $product = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
        if(!empty($product)){
            $this->set(compact('product'));
        }
    }
}