<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $uses = array('Category', 'Support', 'Setting', 'Question');

    public $components = array(
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
                'admin'=>false
            ),
            'loginRedirect'=>array('controller'=>'users', 'action'=>'home', 'admin'=>true),
            'logoutRedirect'=>array('controller'=>'users', 'action'=>'login', 'admin'=>false),
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'username')
                )
            )
        ),
        'Session',
    );

    public $helpers = array('Image');
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('frontend','admin_home','admin_logout', 'viewProduct');
        $this->layout = 'default';
        if ($this->request->prefix == 'admin') {
            $this->layout = 'admin';
        }
//        $user = $this->Auth->user();
        $this->set(compact('user'));
//        debug(!empty($user));die;
        if(!empty($user)){$this->checkAuth();}
        $supports = $this->Support->find('all');
        $categories = $this->Category->find('list');
        $setting = $this->Setting->find('all');
        $questions = $this->Question->find('all');
        $this->set(compact('categories', 'supports', 'setting', 'questions'));
    }

    function checkAuth()
    {
        // Check allow action for both
        $allow = false;
        if (in_array($this->params['action'], $this->Auth->allowedActions)) {
            $allow = true;
        }

        if (!$this->Auth->loggedIn()) {
            if (!$allow) {
                if ($this->request->prefix == 'admin') {
                    $this->redirect($this->Auth->loginAction);
                } else {
                    $this->redirect('/');
                }
            } else {
                return;
            }
        }

        if($this->Auth->user('group') == GROUP_ADMIN)
        {
            if(strpos($this->action, 'admin_') !== false)
            {
                // Allow
                return;
            }
            else
            {
                if($allow)
                {
                    return;
                }

                // Not allow admin goto frontend
                $this->redirect('/');
            }
        }
//        else
//        {
//            if(strpos($this->action, 'admin_') !== false)
//            {
//                debug(strpos($this->action, 'admin_')!== false);die;
//                // Not allow member go to admin page
//                $this->redirect('/');
//            }
//        }

        /* ---------- Unset important user info { ---------- */
//        unset($this->request->data['User']['id']);
//        unset($this->request->data['User']['email']);
//        unset($this->request->data['User']['group']);
        /* ---------- Unset important user info } ---------- */

        // Else
        if(!$allow)
        {
//            $checkAuth = Cache::read('checkAuthData');

//            if (!$checkAuth) {
                $curController = $this->params['controller'];
                $curAction = $this->params['action'];
                $this->loadModel('Authorization');
                $checkAuth = $this->Authorization->find('first',array('conditions'=>array('Authorization.group'=>$this->Auth->user('group'),'Authorization.controller'=>$curController,'Authorization.action'=>$curAction)));
                Cache::write('checkAuthData', $checkAuth);
//            }
//            debug($checkAuth);die;
            if(empty($checkAuth) && !$this->request->is('ajax'))
            {
//                $this->redirect('/');
                // Invalid
                $this->Session->setFlash('Invalid auth for this group.');
//                echo '<div style = "padding:5px;background-color:red;color:white;">Invalid auth for this group.</div>';
                 $this->redirect(array('controller'=>'authorizations','action'=>'index','admin'=>true));
//                $link = '<a href = "'.$this->base.'/admin/users/auth">Click here</a>';
            }
        }
    }
}
