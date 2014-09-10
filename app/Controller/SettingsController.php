<?php
App::uses('AppController', 'Controller');


class SettingsController extends AppController {
    public function admin_index() {

        $setting = $this->Setting->find('first');
        if(!empty($setting)){
            if(!empty($this->request->data)){
                $this->Setting->save($this->request->data);
            }
            $this->request->data = $setting;
        }
    }
}