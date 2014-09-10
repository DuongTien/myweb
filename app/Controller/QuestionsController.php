<?php
App::uses('AppController', 'Controller');


class QuestionsController extends AppController {
    public $uses = array('Question');
    public function admin_index() {
        $this->paginate = array('limit' => '5');
        $questions = $this->paginate('Question');
        $this->set(compact('questions'));
    }

    public function admin_add() {
        if(!empty($this->request->data)){
            $this->Question->save($this->request->data);
            $this->redirect(array('action' => 'admin_index'));
        }
    }

    public function admin_edit($id) {
        if(!empty($this->request->data)){
            $this->Question->save($this->request->data);
            $this->redirect(array('action' => 'admin_index'));
        }
        $question = $this->Question->find('first', array('conditions' => array('Question.id' => $id)));
        $this->request->data = $question;
        $this->render('admin_add');
    }
}
?>