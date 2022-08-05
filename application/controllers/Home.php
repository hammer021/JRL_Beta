<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Task_model', 'task');
        $this->load->model('Booking_model', 'porto');
        $this->load->model('Message_model', 'Msg');
        $this->load->model('User_model', 'user');
        $this->load->library('googleplus');

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
    public function about()
    {
        $this->load->view('home/v_head');
        $this->load->view('home/v_about');
        $this->load->view('home/v_footer');
    }
    public function portfolio()
    {
        $data['porto']=$this->porto->GetPortListing();

        $this->load->view('home/v_head');
        $this->load->view('home/v_portfolio',$data);
        $this->load->view('home/v_footer');
    }
    public function Page($refferal= null)
    {
        if ($refferal=='') {
        $data['reff'] = "AdminJRL";           
        }
        else{
        $data['reff'] = $refferal;
        }
        $data['head']=$this->task->getKonten('head');
        $data['foot']=$this->task->getKonten('foot');
        $data['konten']=$this->task->getKonten('konten');
        $this->load->view('home/v_head',$data);
        $this->load->view('home/v_home',$data);
        $this->load->view('home/v_footer');
    }
    function addNew($refferal='')
    {        
		$this->load->view ( 'home/v_head');
            if($refferal== '1'){
                $this->load->model('user_model');
                $data['roles'] = $this->user_model->getUserRoles();
                $data['reff'] = "AdminJRL";          
    
                $this->load->view("home/addUser", $data);
            }
            else {
                $this->load->model('user_model');
                $data['roles'] = $this->user_model->getUserRoles();
                $data['reff'] = $refferal;
                $this->load->view("home/addUser", $data);
            }
		$this->load->view ( 'home/v_footer' );
    }
    function addNewUser()
    {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $refferal = $this->input->post('refferal');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $mobile = intval($mobile);
                $mobile = substr($mobile,0,2) != "62" ? "+62".$mobile : "+".$mobile;
                $isAdmin = 0;
                $myreff = $this->RandomReff(11);
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=> $name, 'mobile'=>$mobile, 'isAdmin'=>$isAdmin,
                         'createdDtm'=>date('Y-m-d H:i:s'),'myreff'=> $myreff, 
                    'oauth_provider' => 'common','refferal'=> $refferal );
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                $pesan=
                "Selamat ".$name." telah bergabung di Betavers, dengan kode refferal anda = ".$myreff.". Kode refferal hanya bisa diubah satu kali di menu profile.";
                if($result > 0){
                    $this->session->set_flashdata('success', 'New User created successfully');
                    $this->Msg->kirimWablas($mobile,$pesan);
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('Home');
            }
    }
    function RandomReff($panjang)
    {          
        $karakter = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';     
        $string = '';   
        for($i = 0; $i < $panjang; $i++) {   
            $pos = rand(0, strlen($karakter)-1);   
            $string .= $karakter{$pos};   
        }   
        return $string;  
    }

    
    public function registration()
    {
        if (isset($_GET['code'])) {

            $this->googleplus->getAuthenticate($_GET['code']);
            $_SESSION['token'] = $this->googleplus->getAccessToken();
            // header('Location: ' . filter_var('http://localhost/google-login-ci3-master/',
            // FILTER_SANITIZE_URL));
        }
        if (isset($_SESSION['token'])) {
            $this->googleplus->setAccessToken($_SESSION['token']);
        }
        if ($this->googleplus->getAccessToken()) {
            $_SESSION['login'] = 'true';
            $_SESSION['user_data'] = $this->googleplus->getUserInfo();

            //redirect('welcome/profile'); $aa = $_GET['code'];

            $gp = $_SESSION['user_data'];
            
            // die();
            $email = $gp['email'];
            $cek = $this->db->get_where('t_akun', ['email' => $email])->num_rows();
            if ($cek > 0) {
                $this->profile($_SESSION['login'], $gp);
            } else {
                $myreff = $this->RandomReff(11);
                $this->db->insert('tbl_users', array(
                    'email' => $gp['email'],
                    'name' => $gp['name'],
                    // 'nama_belakang' => $gp['family_name'],
                    'updatedreff' => '0',
                    'roleId' => '2',
                    'myreff' => $myreff,
                    'oauth_provider' => 'google',
                    'oauth_uid' => $gp['id']
                ));

                $this->profile($_SESSION['login'], $gp);
            }
        }
    }

    public function profile($login, $data = array())
    {

        if ($login != "true") {
            redirect('');
        }

        $user = $this->db->get_where('t_akun', ['email' => $data['email']])->row_array();
        $this->session->set_userdata($user);
        redirect('dashboard');
    }

}