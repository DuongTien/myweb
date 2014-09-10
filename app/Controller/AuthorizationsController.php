<?php
App::uses('AppController', 'Controller');


class AuthorizationsController extends AppController {
    public $uses = array('Authorization');
    public function admin_index() {
        $group = Configure::read('S.Users.group');
        $this->paginate = array('limit' => '5', 'order' => 'Authorization.group ASC');
        $auths = $this->paginate('Authorization');
        $this->set(compact('auths', 'group'));
        if($this->request->is('ajax')){
            $this->layout = false;
        }
    }

    public function admin_add() {
        $group = Configure::read('S.Users.group');
        $this->set(compact('group'));
        if(!empty($this->request->data)){
            $this->Authorization->save($this->request->data);
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_edit($id) {
        $group = Configure::read('S.Users.group');
        $this->set(compact('group'));
        if(!empty($this->request->data)){
            $this->Authorization->save($this->request->data);
            $this->redirect(array('action' => 'index'));
        }
        $auth = $this->Authorization->find('first', array('conditions' => array('id' => $id)));
        $this->request->data = $auth;
        $this->render('admin_add');
    }

    public function admin_delete($id){
        $this->autoRender = false;
        $status = false;
        if($this->Authorization->delete($id)){
            $status = true;
        }

        return json_encode(array(
            'status' => $status
        ));
    }
}
?>