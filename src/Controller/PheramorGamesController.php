<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

Class PheramorGamesController extends AppController {

    public function initialize() {

        parent::initialize();
        $this->loadComponent('Csrf');
        $this->loadComponent('RequestHandler');
        $this->loadComponent("PHMFunction");
    }
    
    /**
     * Add Game for Profile
     * @Method Add Game
     * @Date 26 Oct 2017
     * @Author RNF Technologies  
     */
    
    public function addGame() {
        $session = $this->request->session()->read("User");
        $this->set("category", null);
        $this->set("edit", false);
        $this->set("title", __("Add Game"));
       
        $category = $this->PheramorGames->newEntity();
        if ($this->request->is("post")) {
            $this->request->data["created_date"] = date("Y-m-d H:i:s");
           $this->request->data["updated_date"] = date("Y-m-d H:i:s");
           $this->request->data["is_deleted"] = '0';
           $this->request->data["created_by"] = $session['id'];
           
            
            $category = $this->PheramorGames->patchEntity($category, $this->request->data());

            if ($this->PheramorGames->save($category)) {
                $this->Flash->success(__("Success! Record Saved Successfully"));
                return $this->redirect(["action" => "index"]);
            } else {
               
                $this->Flash->error('Error');
               
                return;
               
            }
        }
        // $this->render("add");
    }
    
    /**
     * All Game Lists
     * @Method GameList
     * @Date 26 Oct 2017
     * @Author RNF Technologies  
     */
    public function index($id=NULL) {
       
        $session = $this->request->session()->read("User");
        $conn = ConnectionManager::get('default');
        if(!empty($id))
        {
            $this->editGame($id);
        }else{
           $this->addGame(); 
        }
        if ($session["role_id"] == 1) {
          //  $game_data = $this->PheramorGames->find("all")->where(['is_deleted'=>'0'])->toArray();
        }
       
        //$this->set("game_data", $game_data);
       
     }

     /**
     * Edit Member Game
     * @Method editGame
     * @Date 26 Oct 2017
     * @Author RNF Technologies  
     */
     
    public function editGames($id){
         return $this->redirect(["action" => "index",$id]);
    }
    public function editGame($id) {

        $this->set("edit", true);
        $this->set("category", null);
        $this->set("title", __("Update Game"));
        $races_data = $this->PheramorGames->get($id)->toArray();
        $this->set("races_data", $races_data);
       

        if ($this->request->is("post")) {
          
            $row = $this->PheramorGames->get($id);
            $this->request->data["updated_date"] = date("Y-m-d H:i:s");
            $tag= $this->PheramorGames->patchEntity($row, $this->request->data);

            if ($this->PheramorGames->save($tag)) {
                // echo "<pre>";print_r($membership); die;
                $this->Flash->success(__("Success! Record Updated Successfully"));
                return $this->redirect(["action" => "index"]);
            } else {
                $this->Flash->error(__("Error! There was an error while updating,Please try again later."));
            }
        }
        //$this->render("add");
    }

    /**
     * Delete Game Lists
     * @Method deleteGame
     * @Date 26 Oct 2017
     * @Author RNF Technologies  
     */

    public function deleteGame($id) {
        $row = $this->PheramorGames->get($id);
        $this->request->data['is_deleted'] = '1';
        $row = $this->PheramorGames->patchEntity($row,$this->request->data);
        if ($this->PheramorGames->save($row)) {
            $this->Flash->Success(__("Success! Record Deleted Successfully."));
            return $this->redirect($this->referer());
        }
    }
    




    public function isAuthorized($user) {
        return parent::isAuthorizedCustom($user);
    }

}