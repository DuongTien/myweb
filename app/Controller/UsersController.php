<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {
    public $uses = array('User');
    public function admin_add() {
        $group = Configure::read('S.Users.group');
        $this->set(compact('group'));
        $status = false;
        if(!empty($this->request->data)){
            $this->layout = false;
            $this->autoRender = false;
            $checkName = $this->User->find('first',array(
                'conditions'=>array('User.username'=>$this->request->data['User']['username'])
            ));
            if(!$checkName){
                $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                $this->User->save($this->request->data);
                $status = true;
            }
            return json_encode(array(
                'status' => $status
            ));
        }
    }

    public function admin_delete($id){
        $this->autoRender = false;
        $status = false;
        if($this->User->delete($id)){
            $status = true;
        }

        return json_encode(array(
            'status' => $status
        ));
    }

    public function admin_edit($id){
        $group = Configure::read('S.Users.group');
        $this->set(compact('group'));
        if(!empty($this->request->data)){
            $this->User->save($this->request->data);
            $this->redirect(array('action' => 'admin_home'));
            $this->Session->setFlash('User empty');
        }
        $user = $this->User->find('first',array(
            'conditions' => array('User.id' => $id)
        ));
        if(!$user){
            $this->Session->setFlash('User empty');
        }else{
            $this->request->data = $user;
        }
    }

    public function admin_home(){
        $group = Configure::read('S.User.group');
        $this->paginate = array(
            'limit' => '3'
        );
        $users = $this->paginate('User');
        $this->set(compact('group','users'));
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
    }

    public function login() {
        $this->layout = null;
        if (!empty($this->request->data)) {
            if ($this->Auth->login()) {
                $loginTime = date('Y-m-d H:i:s');
                $user = $this->Auth->user();
                $user['login_last'] = $loginTime;
                $user['login_count'] ++;
                $this->User->save($user);
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash( __('Username or password is incorrect'));
            }
        }
    }
     public function admin_logout(){
         return $this->redirect($this->Auth->logout());
     }
}
?>