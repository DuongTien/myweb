<?php
App::uses('AppController', 'Controller');


class PostsController extends AppController {
    public $uses = array('Post');
    public function admin_index() {
        $group_post = Configure::read('S.News.group');
        $this->paginate = array('limit' => '3');
        $posts = $this->paginate('Post');
        $this->set(compact('group_post', 'posts'));
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
    }

    public function admin_add() {
        $group_post = Configure::read('S.News.group');
        $group_user = Configure::read('S.Users.group');
        $this->set(compact('group_post', 'group_user'));
        if(!empty($this->request->data)){
            $this->request->data['Post']['image'] = Tool::uploadFile(Configure::read('S.imagePost'), $this->request->data['Post']['image'], 'image');
            $this->Post->save($this->request->data);
            $this->Session->setFlash('success');
        }
    }

    public function admin_edit($id){
        $group_post = Configure::read('S.News.group');
        $group_user = Configure::read('S.Users.group');
        $this->set(compact('group_post', 'group_user'));
        if(!empty($this->request->data)){
            $this->request->data['Post']['image'] = Tool::uploadFile(Configure::read('S.imagePost'), $this->request->data['Post']['image'], 'image');
            $this->Post->save($this->request->data);
            $this->Session->setFlash('success');
        }
        $post = $this->Post->find('first', array('conditions' => array('Post.id' => $id)));
        $this->request->data = $post;
        $this->render('admin_add');
    }

    public function admin_delete($id){
        $this->autoRender = false;
        $status = false;
        if($this->Post->delete($id)){
            $status = true;
        }

        return json_encode(array(
            'status' => $status
        ));
    }

}