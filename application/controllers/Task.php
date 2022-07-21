<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Task (TaskController)
 * Task Class to control task related operations.
 * @author : Kishor Mali
 * @version : 1.5
 * @since : 19 Jun 2022
 */
class Task extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Task_model', 'tm');
        $this->isLoggedIn();
        $this->module = 'Task';
        $this->load->library('upload');
        $this->load->helper('url', 'form'); 
    }

    /**
     * This is default routing method
     * It routes to default listing page
     */
    public function index()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
        
        redirect('task/taskListing');
        }
    }
    
    /**
     * This function is used to load the task list
     */
    function taskListing()
    {
        if(!$this->hasListAccess())
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->tm->taskListingCount($searchText);

			$returns = $this->paginationCompress ( "taskListing/", $count, 10 );
            
            $data['records'] = $this->tm->taskListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Beta : Content';
            
            $this->loadViews("task/list", $this->global, $data, NULL);
        }
    }

    

    /**
     * This function is used to load the add new form
     */
    function add()
    {
        if(!$this->hasCreateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = 'Beta : Add New Task';

            $this->loadViews("task/add", $this->global, NULL, NULL);
        }
    }
    
    /**
     * This function is used to add new user to the system
     */

    function upload_image(){
        $config['upload_path'] = './assets/images/konten/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['gambar']['name'])){
 
            if ($this->upload->do_upload('gambar')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/konten/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/images/konten/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
            }
                      
        }else{
            echo "Gambar yang diupload kosong";
        }
                 
    }

    function addNewTask()
    {
        if(!$this->hasCreateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('taskTitle','Task Title','trim|required|max_length[256]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[1024]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->add();
            }
            else
            {
                $taskTitle = $this->security->xss_clean($this->input->post('taskTitle'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $gam = $this->security->xss_clean($this->input->post('gambar'));
                $config['upload_path'] = './assets/images/konten/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
                $config['max_size'] = 2000;
                $this->upload->initialize($config);
                if(!empty($_FILES['gambar']['name'])){        
                    if ($this->upload->do_upload('gambar')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./assets/images/konten/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 600;
                        $config['height']= 600;
                        $config['new_image']= './assets/images/konten/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
        
                        $gambar=$gbr['file_name'];
                        $taskInfo = array(  'taskTitle'=>$taskTitle, 
                                            'description'=>$description,    
                                            'gambar'=>$gambar,    
                                            'tipe'=>'konten',    
                                            'createdBy'=>$this->vendorId, 
                                            'createdDtm'=>date('Y-m-d H:i:s'));
                
                        $result = $this->tm->addNewTask($taskInfo);
                        
                        if($result > 0) {
                            $this->session->set_flashdata('success', 'New Task created successfully');
                        } else {
                            $this->session->set_flashdata('error', 'Task creation failed');
                        }
                        
                        redirect('ContentListing');
                    }else {
                        $this->session->set_flashdata('error', 'The uploaded image is failed');
                        redirect('ContentListing');
                    }
                            
                }else{
                    $this->session->set_flashdata('error', 'The uploaded image is empty');
                    redirect('ContentListing');

                }


                
            }
        }
    }

    
    /**
     * This function is used load task edit information
     * @param number $taskId : Optional : This is task id
     */
    function edit($taskId = NULL)
    {
        if(!$this->hasUpdateAccess())
        {
            $this->loadThis();
        }
        else
        {
            if($taskId == null)
            {
                redirect('task/taskListing');
            }
            
            $data['taskInfo'] = $this->tm->getTaskInfo($taskId);

            $this->global['pageTitle'] = 'Beta : Content';
            
            $this->loadViews("task/edit", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editTask()
    {
        if(!$this->hasUpdateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $taskId = $this->input->post('taskId');
            
            $this->form_validation->set_rules('taskTitle','Task Title','trim|required|max_length[256]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[1024]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit($taskId);
            }
            else
            {
                $taskTitle = $this->security->xss_clean($this->input->post('taskTitle'));
                $description = $this->security->xss_clean($this->input->post('description'));
                
                $taskInfo = array('taskTitle'=>$taskTitle, 'description'=>$description, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->tm->editTask($taskInfo, $taskId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Task updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Task updation failed');
                }
                
                redirect('ContentListing');
            }
        }
    }


    function deleteContent($id)
    {
        if(!$this->isAdmin())
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $_id = $this->db->get_where('tbl_task',['taskId' => $id])->row();
            $query = $this->db->delete('tbl_task',['taskId'=>$id]);
            if($query){
                unlink("./assets/images/konten/".$_id->gambar);
                $this->session->set_flashdata('success', 'Delete successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete failed');
            }
            
            redirect('ContentListing');
        }
    }


}

?>