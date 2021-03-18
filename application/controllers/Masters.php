<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {

	public function __construct(){

        parent:: __construct();
        
        $this->load->model('Master');
    }
/*********************************************Product Master******************************************** */    
    public function product(){                                      

        if($this->session->userdata('login')){
    
              $data['prod']=$this->Master->productDtls();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('master/product/view',$data);

              $this->load->view('dashboard/footer');
        }
    }

   public function addProduct(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prodName = $_POST['prod'];

            $hsn      = $_POST['hsn'];
            
            $gst_rt   = $_POST['gst_rt'];

            $data     = $this->Master->getMaxId();

            $Id       = $data->maxid;

            $data     = array(
                                'ID'         => $Id,

                                'Name'       => $prodName,

                                'HSN_ID'     => $hsn,

                                'gst_rt'     => $gst_rt,

                                'created_by' => $_SESSION['user_name'],

                                'created_dt' => date('Y-m-d h:m:i')
                            );

            $ret = $this->Master->insertNewProd($data);

            if ($ret == 1){

                $msgData = 'Data Successfully inserted with Id : '.$Id;

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Masters/product');

        }else{
              $data['hsn']=$this->Master->getAllhsn();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('master/product/add',$data);

              $this->load->view('dashboard/footer');
            }
    }

    public function editProduct(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prodId   = $_POST['prodId'];

            $prodName = $_POST['prod'];

            $hsn      = $_POST['hsn'];

            $gst_rt   = $_POST['gst_rt'];

            $data     = array(
                                'Name'        => $prodName,

                                'HSN_ID'      => $hsn,

                                'gst_rt'       => $gst_rt,

                                'modified_by' => $_SESSION['user_name'],

                                'modified_dt' => date('Y-m-d h:m:i')
                            );

            $where    = array(
                                'ID'           => $prodId
                             );

            $ret = $this->Master->updateProd($data,$where);

            if ($ret == 1){

                $msgData = 'Data successfully updated for product id : '.$prodId;

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Masters/product');

        }else{

              $prodId     = $_GET['ID'];

              $data['prod'] = $this->Master->prodDtls($prodId);

              $data['hsn']  = $this->Master->getAllhsn();


              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('master/product/edit',$data);

              $this->load->view('dashboard/footer');
            }
    }
/*********************************************HSN Master******************************************** */
public function hsn(){                                      

    if($this->session->userdata('login')){

          $data['hsn']=$this->Master->hsnDtls();

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/hsn/view',$data);

          $this->load->view('dashboard/footer');
    }
}

public function addHsn(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $hsnCode  = $_POST['hsnCd'];

        $hsn      = $_POST['hsnName'];

        $cgst     = $_POST['cgst'];

        $sgst     = $_POST['sgst'];

        $data     = array(
                            'Code'         => $hsnCode,

                            'Grp'          => $hsn,

                            'CGST_Rt'      => $cgst,

                            'SGST_Rt'      => $sgst,

                            'created_by'   => $_SESSION['user_name'],

                            'created_dt'   => date('Y-m-d h:m:i')
                        );

        $ret = $this->Master->insertNewHsn($data);

        if ($ret == 1){

            $msgData = 'Data Successfully inserted with HSN code: '.$hsnCode;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to insert.');
        }

        redirect('Masters/hsn');

    }else{

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/hsn/add');

          $this->load->view('dashboard/footer');
        }
}

public function editHsn(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $hsnCd    = $_POST['hsncd'];

        $hsnName  = $_POST['hsnName'];

        $cgst     = $_POST['cgst'];

        $sgst     = $_POST['sgst'];

        $data     = array(
                            'Grp'         => $hsnName,

                            'CGST_Rt'     => $cgst,

                            'SGST_Rt'     => $sgst,

                            'modified_by' => $_SESSION['user_name'],

                            'modified_dt' => date('Y-m-d h:m:i')
                        );

        $where    = array(
                            'Code'        => $hsnCd
                         );

        $ret = $this->Master->updateHsn($data,$where);

        if ($ret == 1){

            $msgData = 'Data successfully updated for HSN code: '.$hsnCd;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to update.');
        }

        redirect('Masters/hsn');

    }else{

          $hsnCd        = $_GET['code'];

          $data['hsn']  = $this->Master->gethsn($hsnCd);

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/hsn/edit',$data);

          $this->load->view('dashboard/footer');
        }
    }

public function chkHsn(){

    $hsn   = $_GET['hsncd'];

    $data  = $this->Master->chkhsn($hsn);

    $value = $data->hcount;

    echo $value;

}    
/*********************************************Company Master******************************************** */
public function comp(){                                      

    if($this->session->userdata('login')){

          $data['comp']=$this->Master->compDtls();

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/company/view',$data);

          $this->load->view('dashboard/footer');
    }
}

public function addComp(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $compName  = $_POST['compName'];

        $addr      = $_POST['addr'];

        $cnct      = $_POST['cnct'];

        $linc      = $_POST['linc'];

        $gstin     = $_POST['gstin'];

        $data     = array(
                            'Comp_Name'         => $compName,

                            'Drug_License'      => $linc,

                            'GST_ID'            => $gstin,

                            'comp_addr'         => $addr,

                            'Contact'           => $addr,

                            'created_by'        => $_SESSION['user_name'],

                            'created_dt'        => date('Y-m-d h:m:i')
                        );

        $ret = $this->Master->insertNewComp($data);

        if ($ret == 1){

            $msgData = 'Data Successfully inserted for '.$compName;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to insert.');
        }

        redirect('Masters/comp');

    }else{

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/company/add');

          $this->load->view('dashboard/footer');
        }
}

public function editComp(){

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $cmpCd     = $_POST['cmpCd'];

        $compName  = $_POST['compName'];

        $addr      = $_POST['addr'];

        $cnct      = $_POST['cnct'];

        $linc      = $_POST['linc'];

        $gstin     = $_POST['gstin'];

        $data      = array(
                            'Comp_Name'        => $compName,

                            'Drug_License'     => $linc,

                            'GST_ID'           => $gstin,

                            'comp_addr'        => $addr,

                            'Contact'          => $cnct,

                            'modified_by'      => $_SESSION['user_name'],

                            'modified_dt'      => date('Y-m-d h:m:i')
                        );

        $where    = array(
                            'ID'        => $cmpCd
                         );

        $ret = $this->Master->updateComp($data,$where);

        if ($ret == 1){

            $msgData = 'Data successfully updated for '.$compName;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to update.');
        }

        redirect('Masters/comp');

    }else{

          $id           = $_GET['id'];

          $data['comp']  = $this->Master->getComp($id);

          $this->load->view('dashboard/header');

          $this->load->view('dashboard/nav');

          $this->load->view('dashboard/menu');

          $this->load->view('master/company/edit',$data);

          $this->load->view('dashboard/footer');
        }
    }
}