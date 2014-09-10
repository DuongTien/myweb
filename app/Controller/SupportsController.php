<?php
App::uses('AppController', 'Controller');


class SupportsController extends AppController {
    public $uses = array('Support');
    public function admin_index() {
        $this->paginate = array('limit' => '5');
        $supports = $this->paginate('Support');
        $this->set(compact('supports'));
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
    }

    public function admin_add() {
        if(!empty($this->request->data)){
            $this->Support->save($this->request->data);
            $this->Session->setFlash('success');
        }
    }

    public function admin_edit($id){
        if(!empty($this->request->data)){
            $this->Support->save($this->request->data);
            $this->Session->setFlash('success');
        }
        $support = $this->Support->find('first', array('conditions' => array('Support.id' => $id)));
        $this->request->data = $support;
        $this->render('admin_add');
    }

    public function admin_delete($id){
        $this->autoRender = false;
        $status = false;
        if($this->Support->delete($id)){
            $status = true;
        }
        return json_encode(array(
            'status' => $status
        ));
    }
}
?>