<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Booking extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model', 'bm');
        $this->isLoggedIn();
        $this->module = 'Booking';        
        $this->load->library('upload');
        $this->load->helper('url', 'form'); 
    }

    /**
     * This is default routing method
     * It routes to default listing page
     */
    public function index()
    {
        redirect('PortfolioList');
    }
    
    /**
     * This function is used to load the booking list
     */
    function bookingListing()
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
            $count = $this->bm->bookingListingCount($searchText);
			$returns = $this->paginationCompress ( "bookingListing/", $count, 10 );            
            $data['records'] = $this->bm->bookingListing($searchText, $returns["page"], $returns["segment"]);            
            $this->global['pageTitle'] = 'JRL : Portfolio';            
            $this->loadViews("booking/list", $this->global, $data, NULL);
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
            $this->global['pageTitle'] = 'JRL : Add New Portfolio';

            $this->loadViews("booking/add", $this->global, NULL, NULL);
        }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewBooking()
    {
        if(!$this->hasCreateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('roomName','Room Name','trim|required|max_length[50]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[1024]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->add();
            }
            else
            {
                $roomName = $this->security->xss_clean($this->input->post('roomName'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $config['upload_path'] = './assets/images/portofolio/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
                $config['max_size'] = 2000;
                $this->upload->initialize($config);
                if(!empty($_FILES['gambar']['name'])){        
                    if ($this->upload->do_upload('gambar')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./assets/images/portofolio/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 840;
                        $config['height']= 450;
                        $config['new_image']= './assets/images/portofolio/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();        
                        $gambar=$gbr['file_name'];
                        $bookingInfo = array(   'roomName'=>$roomName, 
                                                'description'=>$description, 
                                                'gambar'=>$gambar,    
                                                'createdBy'=>$this->vendorId, 
                                                'createdDtm'=>date('Y-m-d H:i:s'));                
                        $result = $this->bm->addNewBooking($bookingInfo);                        
                        if($result > 0) {
                            $this->session->set_flashdata('success', 'New Portfolio created successfully');
                        } else {
                            $this->session->set_flashdata('error', 'Portfolio creation failed');
                        }
                        
                        redirect('PortfolioList');

                    }else {
                        $this->session->set_flashdata('error', 'The uploaded image is failed');
                        redirect('PortfolioList');
                    }
                }else{
                    $this->session->set_flashdata('error', 'The uploaded image is empty');
                    redirect('PortfolioList');
                }                
            }
        }
    }

    
    /**
     * This function is used load booking edit information
     * @param number $bookingId : Optional : This is booking id
     */
    function edit($bookingId = NULL)
    {
        if(!$this->hasUpdateAccess())
        {
            $this->loadThis();
        }
        else
        {
            if($bookingId == null)
            {
                redirect('PortfolioList');
            }
            
            $data['bookingInfo'] = $this->bm->getBookingInfo($bookingId);

            $this->global['pageTitle'] = 'JRL : Edit Portfolio';
            
            $this->loadViews("booking/edit", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editBooking()
    {
        if(!$this->hasUpdateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $bookingId = $this->input->post('bookingId');
            
            $this->form_validation->set_rules('roomName','Room Name','trim|required|max_length[50]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[1024]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit($bookingId);
            }
            else
            {
                $roomName = $this->security->xss_clean($this->input->post('roomName'));
                $description = $this->security->xss_clean($this->input->post('description'));
                $id = $this->security->xss_clean($this->input->post('bookingId'));
                $_id = $this->db->get_where('tbl_booking',['bookingId' => $id])->row();
                $config['upload_path'] = './assets/images/portofolio/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
                $config['max_size'] = 2000;
                $this->upload->initialize($config);
                unlink("./assets/images/portofolio/".$_id->gambar);
                if(!empty($_FILES['gambar']['name'])){  
                    if ($this->upload->do_upload('gambar')){
                        $gbr = $this->upload->data();
                        $config['image_library']='gd2';
                        $config['source_image']='./assets/images/portofolio/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 840;
                        $config['height']= 450;
                        $config['new_image']= './assets/images/portofolio/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();        
                        $gambar=$gbr['file_name'];
                        $bookingInfo = array(   'roomName'=>$roomName, 
                                                'description'=>$description, 
                                                'gambar'=>$gambar,    
                                                'updatedBy'=>$this->vendorId, 
                                                'updatedDtm'=>date('Y-m-d H:i:s'));                
                        $result = $this->bm->editBooking($bookingInfo, $bookingId);                        
                        if($result == true)
                        {
                            $this->session->set_flashdata('success', 'Portfolio updated successfully');
                        }
                        else
                        {
                            $this->session->set_flashdata('error', 'Portfolio updation failed');
                        }                        
                        redirect('PortfolioList');                    
                    }else {
                        $this->session->set_flashdata('error', 'The uploaded image is failed');
                        redirect('PortfolioList');
                    }
                }else {
                    $this->session->set_flashdata('error', 'The image is Null');
                        redirect('PortfolioList');
                }               
            }
        }
    }

    function deletePort($id)
    {
        if(!$this->isAdmin())
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $_id = $this->db->get_where('tbl_booking',['bookingId' => $id])->row();
            $query = $this->db->delete('tbl_booking',['bookingId'=>$id]);
            if($query){
                unlink("./assets/images/portofolio/".$_id->gambar);
                $this->session->set_flashdata('success', 'Delete successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Delete failed');
            }
            redirect('PortfolioList');
        }
    }
}
?>