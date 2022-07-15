<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class : Home (RolesController)
 * Home Class to control role related operations.
 
 */
class Home extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Task_model', 'task');
        // $this->isLoggedIn();   
    }
    public function index()
    {
        
        $data['head']=$this->task->getKonten('head');
        $data['foot']=$this->task->getKonten('foot');
        $data['konten']=$this->task->getKonten('konten');
        $this->load->view('home/v_head');
        $this->load->view('home/v_home',$data);
        $this->load->view('home/v_footer');
    }

    

}