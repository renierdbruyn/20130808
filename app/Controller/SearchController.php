<?php

class SearchController extends AppController {
    
     public function index() {
        $this->set('adverts', $this->Advert->find('all', array('conditions' => array('Advert.status' => 'active') )));
    }
    
    public function Search(){
        
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
}