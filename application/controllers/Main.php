<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

        parent:: __construct();
        
        $this->load->model('Process');
	}

	public function index(){
		if($_SERVER['REQUEST_METHOD']=="POST"){

            $userId	=	$_POST['userid'];

            $pwd	=	$_POST['paswd'];

            $data   =	$this->Process->userInf($userId);

            $match	=	password_verify($pwd,$data->password);
            
			if($match){
                
                $this->session->set_userdata('login',$data);

                $_SESSION['user_id']   = $data->user_id;
                
                $_SESSION['user_type'] = $data->user_type;

                $_SESSION['user_name'] = $data->user_name;
                
                $_SESSION['sys_date']  = date('Y-m-d'); 

                redirect('Main/login');
			}else{

                $this->session->set_flashdata('err_message','Invalid username and password combination.Please try again.');
		
				$this->load->view('login/login');
			}
        }else{
        
            $this->load->view('login/login');
        }
    }

    public function chkUser(){

        $user_id    =   $_GET['user'];

        $data       =   $this->Process->selectPwd($user_id); 
        
        if($data){

            $ret = 1;
        }else{

            $ret = 0;
        }

        echo $ret;

    }
    
    public function login(){

		if($this->session->userdata('login')){

            $date = date('Y-m-d');

            $data['exp'] = $this->Process->expirymedicne($date);
            $data['pur'] = $this->Process->todayPurchase($date);
            $data['sale'] = $this->Process->todaysale($date);

            $fromdt = date('Y-m-d', strtotime(date('Y-m-1')));
            $todt   = date("Y-m-t", strtotime($date));

            $data['purm'] = $this->Process->monthPurchase($fromdt,$todt);
            $data['salm'] = $this->Process->monthSale($fromdt,$todt);


            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('dashboard/dashboard',$data);
            $this->load->view('dashboard/footer');

		}else{

			$this->load->view('login/login');
        }
    }
    
    public function logout(){

        if($this->session->userdata('login')){

            $this->session->unset_userdata('login');

            redirect('Main/login');
        }else{

            redirect('Main/login');
        }

    }
}
