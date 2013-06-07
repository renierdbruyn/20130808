<?php

class PostsController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = NULL) {
        if(!$id)
        {
            throw new NotFoundException(__('Post is invalid'));
        }
       
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid Post'));
        }
        $this->set('post', $post);
        //$this->Post->id = $id;
       // $this->set('posts', $this->Post->read());
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post');
            }
        }
    }

    public function edit($id = NULL){
        if(!$id){
            throw new NotFoundException(__('Post is not valid'));
        }
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid Post'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Your post has been Updated');
                $this->redirect(array('action'=> 'index'));
            }else
                $this->Session->setFlash ("Unable to update your post.");
        }
        
        if(!$this->request->data){
            $this->request->data = $post;
        }
    }


    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }
        if($this->Post->delete($id)){
            $this->Session->setFlash('Your post with id: ' . $id . ' has been removed');
            $this->redirect(array('action'=>'index'));
        }
    }

}