<?php
App::uses('AppController', 'Controller');


class CategoriesController extends AppController {
    public $uses = array('Category');
    public function admin_add() {
        $status = false;
        if(!empty($this->request->data)){
            $this->layout = false;
            $this->autoRender = false;
            $checkName = $this->Category->find('first',array(
                'conditions' => array('Category.name' => $this->request->data['Category']['name'])
            ));
            if(empty($checkName)){
                $this->Category->save($this->request->data);
                $status = true;
            }
            return json_encode(array(
                'status' => $status
            ));
        }
    }

    public function admin_index() {
        $this->paginate = array(
            'limit' => '3'
        );
        $categories = $this->paginate('Category');
        $this->set(compact('categories'));
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
    }

    public function admin_edit($id) {
        if(!empty($this->request->data)){
            $checkName = $this->Category->find('first',array(
                'conditions' => array('Category.name' => $this->request->data['Category']['name'])
            ));
            if(empty($checkName)){
                $this->Category->save($this->request->data);
            }
        }
        $category = $this->Category->find('first',array('conditions' => array('Category.id' => $id)));
        $this->request->data = $category;
        $this->render('admin_add');
    }

    public function admin_delete($id) {
        $this->autoRender = false;
        $status = false;
        if($this->Category->delete($id)){
            $status = true;
        }
        return json_encode(array(
            'status' => $status
        ));
    }
}