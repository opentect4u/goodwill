<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends CI_Controller {

	public function __construct(){

        parent:: __construct();
        
        $this->load->model('Purchase');

        $this->load->model('Master');
    }
/*********************************************Purchase******************************************** */    
    public function viewPurchase(){  

        if($this->session->userdata('login')){
    
              $data['purc']=$this->Purchase->allPurchase();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('transaction/purchase/view',$data);

              $this->load->view('dashboard/footer');
        }
    }
    public function viewPurchasebydt(){                                      

        if($this->session->userdata('login')){
             
            if($_SERVER['REQUEST_METHOD']=='POST'){

            $from_dt    = $this->input->post('from_date');

            $to_dt      = $this->input->post('to_date');

            $data['purc']=$this->Purchase->allPurchase_dt($from_dt,$to_dt);

            $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('transaction/purchase/viewby_date',$data);

              $this->load->view('dashboard/footer');

        }else{

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('transaction/purchase/viewby_date');
              $this->load->view('dashboard/footer');
        }


        }

    }

    public function addPurchase(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $transDt  = $_POST['bill_dt'];

            $purId    = $this->Purchase->getPurNo($transDt)->id;

            $proId    = $_POST['Pro_ID'];

            for($i = 0; $i < count($proId); $i++){

                $data     = array(
                                    'bill_dt'           => $transDt,

                                    'bill_no'           => $_POST['bill_no'],

                                    'Purchase_ID'       => $purId,

                                    'bill_trans'        => 'S',

                                    'bill_type'         => $_POST['bill_type'],

                                    'Pro_ID'            => $proId[$i],

                                    'Unit'              => $_POST['Unit'][$i],

                                    'Batch'             => $_POST['Batch'][$i],

                                    'Expiry'            => $_POST['Expiry'][$i],

                                    'Max_Ret_Price'     => $_POST['Max_Ret_Price'][$i],

                                    'Qty'               => $_POST['Qty'][$i],

                                    'Purchase_Rt'       => $_POST['Purchase_Rt'][$i],

                                    'Dis_Amt'           => $_POST['Dis_Amt'][$i],

                                    'CGST_Rt'           => $_POST['CGST_Rt'][$i],

                                    'CGST_Amt'          => $_POST['CGST_Amt'][$i],

                                    'SGST_Rt'           => $_POST['SGST_Rt'][$i],

                                    'SGST_Amt'          => $_POST['SGST_Amt'][$i],

                                    'tot_amt'           => $_POST['tot_Amt'][$i],

                                    'comp_name'         => $_POST['comp_name'],

                                    'created_by'        => $_SESSION['user_name'],

                                    'created_dt'        => date('Y-m-d h:m:i')
                                );

                $datainventory   = array(

                                    'Prod_ID'           => $_POST['Pro_ID'][$i],
                                    
                                    'Batch'             => $_POST['Batch'][$i],

                                    'Expiry_dt'         => $_POST['Expiry'][$i],

                                    'Units'              => $_POST['Unit'][$i],

                                    'Qty'               => $_POST['Qty'][$i],

                                    'Max_Ret_Price'     => $_POST['Max_Ret_Price'][$i]
                                  
                                );

                $ret = $this->Purchase->insertPurchase($data);

                $query = $this->db->query("SELECT count(*)cnt FROM Inventory WHERE Prod_ID='".$_POST['Pro_ID'][$i]."' AND Batch='".$_POST['Batch'][$i]."' AND Expiry_dt='".$_POST['Expiry'][$i]."' ")->row();
                if($query->cnt == 0){

                    $this->db->insert('Inventory',$datainventory);

                }else{

                $sql ="update Inventory set Qty=Qty + ".$_POST['Qty'][$i].",Max_Ret_Price=".$_POST['Max_Ret_Price'][$i]." WHERE Prod_ID='".$_POST['Pro_ID'][$i]."' AND Batch='".$_POST['Batch'][$i]."' AND Expiry_dt='".$_POST['Expiry'][$i]."' ";
                $this->db->query($sql);	

                }

           
            }
            if ($ret == 1){

                $msgData = 'Data Successfully inserted for purchase no. : '.$purId;

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Purchases/viewPurchase');

        }else{
              $data['product'] =$this->Master->productDtls();  

              $data['companys']=$this->Master->compDtls();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('transaction/purchase/add',$data);
              
            }
    }

    public function compDtls(){

           $comp    = $this->input->get('id'); 

           $result  = $this->Purchase->getComp($comp);

           echo json_encode($result);
    }

    public function get_gst_rate(){

           $id    = $this->input->get('id'); 
         
           $result  = $this->Purchase->getgstrate($id);

           //echo $this->db->last_query();

           echo json_encode($result);
    }

    
    public function delPurchase(){

        $bill_no           = $this->input->get('bill_no');
        
        $ret               = $this->Purchase->deletePurchase($bill_no);

        if ($ret == 1){

            $msgData = 'Data Successfully deleted for bill no. : '.$bill_no;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to delete.');
        }

        redirect('Purchases/viewPurchase');
    }

    public function editPurchase(){


        if($_SERVER['REQUEST_METHOD']=='POST'){

           $transDt  = $_POST['bill_dt'];

           $purId  = $_POST['purId'];

           $bill_no  = $_POST['bill_no'];

           // $purId    = $this->Purchase->getPurNo($transDt)->id;

           $row_delete = $this->Purchase->deletePurchasemultiple_row($transDt,$bill_no,$purId);

           $proId    = $_POST['Pro_ID'];

            for($i = 0; $i < count($proId); $i++){

                $data     = array(
                                    'bill_dt'           => $transDt,

                                    'bill_no'           => $_POST['bill_no'],

                                    'Purchase_ID'       => $purId,

                                    'bill_trans'        => 'S',

                                    'bill_type'         => $_POST['bill_type'],

                                    'Pro_ID'            => $proId[$i],

                                    'Unit'              => $_POST['Unit'][$i],

                                    'Batch'             => $_POST['Batch'][$i],

                                    'Expiry'            => $_POST['Expiry'][$i],

                                    'Max_Ret_Price'     => $_POST['Max_Ret_Price'][$i],

                                    'Qty'               => $_POST['Qty'][$i],

                                    'Purchase_Rt'       => $_POST['Purchase_Rt'][$i],

                                    'Dis_Amt'           => $_POST['Dis_Amt'][$i],

                                    'CGST_Rt'           => $_POST['CGST_Rt'][$i],

                                    'CGST_Amt'          => $_POST['CGST_Amt'][$i],

                                    'SGST_Rt'           => $_POST['SGST_Rt'][$i],

                                    'SGST_Amt'          => $_POST['SGST_Amt'][$i],

                                    'tot_amt'           => $_POST['tot_Amt'][$i],

                                    'comp_name'         => $_POST['comp_name'],

                                    'created_by'        => $_SESSION['user_name'],

                                    'created_dt'        => date('Y-m-d h:m:i'),

                                    'modified_by'       => $_SESSION['user_name'],

                                    'modified_dt'        => date('Y-m-d h:m:i')
                                );


            $ret = $this->Purchase->insertPurchase($data);
           
           
            }
            if ($ret == 1){

                $msgData = 'Data Successfully inserted for purchase no. : '.$purId;

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Purchases/viewPurchase');

        }else{

        $bill_no  = $this->input->get('id');

        $data['row1']    = $this->Purchase->purBill($bill_no);

        $data['row2']    = $this->Purchase->purBillDtls($bill_no);

        $data['sum']     = $this->Purchase->purSum($bill_no);

        $data['product'] = $this->Master->productDtls();  

        $data['companys']= $this->Master->compDtls();

        $this->load->view('dashboard/header');

        $this->load->view('dashboard/nav');

        $this->load->view('dashboard/menu');

        $this->load->view('transaction/purchase/edit',$data);
        
        //$this->load->view('dashboard/footer');
        }
    }
    public function viewpurreturn(){


             $data['purretu']=$this->Purchase->pur_return();

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('transaction/purchase/pur_ret_list',$data);

              $this->load->view('dashboard/footer');


      
    }
    public function pur_return(){

         if($_SERVER['REQUEST_METHOD']=='POST'){

           $proId    = $this->input->post("ret_prod_id");


            for($i = 0; $i < count($proId); $i++){
          $data   = array(

                  'return_dt'         => $this->input->post("return_dt"),

                  'inv_no'            => $this->input->post("inv_no"),

                  'comp_name'         => $this->input->post("comp_name"),

                  'bill_type'         => $this->input->post("bill_type"),

                  'ret_prod_id'       => $this->input->post("ret_prod_id")[$i],

                  'ret_batch'         => $this->input->post("ret_batch")[$i],

                  'ret_exp_dt'        => $this->input->post("ret_exp_dt")[$i],

                  'ret_qty'           => $this->input->post("ret_qty")[$i],

                  'ret_amt'           => $this->input->post("ret_amt")[$i],
                 
                  'created_by'        => $_SESSION['user_name'],

                  'created_dt'        => date('Y-m-d h:m:i'),

                                                 );


            $ret = $this->db->insert('td_purchase_return',$data);
           
       }
            if (isset($ret)){

                $msgData = 'Data Successfully inserted for purchase no';

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to insert.');
            }

            redirect('Purchases/viewpurreturn');

        }else{

            $data['product'] =$this->Master->productDtls();  
            $data['companys']=$this->Master->compDtls();

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('transaction/purchase/pur_return',$data);
        }



    }

    public function product_name(){

           $comp    = $this->input->get('id'); 

           $result  = $this->Purchase->getpro_name($comp);

           echo json_encode($result);
    }

     public function getret_batch(){

           $product_id    = $this->input->get('id'); 

           $result  = $this->Purchase->get_pur_batch($product_id);

           echo json_encode($result);
    }

    public function getret_exp(){

        $product_id  = $this->input->get('id'); 

        $batch  = $this->input->get('batch'); 

        $result  = $this->Purchase->get_pur_expiry($product_id,$batch);
           
        echo json_encode($result);
    }

    public function delretpur(){

        $inv_no         = $this->input->get('bill_no');

        $ret_batch      = $this->input->get('ret_batch');
        
        $ret            = $this->Purchase->del_ret_pur($inv_no,$ret_batch);

        if ($ret == 1){

            $msgData = 'Data Successfully deleted for bill no. : '.$inv_no;

            $this->session->set_flashdata('msg',$msgData);
            
        }else{

            $this->session->set_flashdata('msg', 'Failed to delete.');
        }

        redirect('Purchases/viewpurreturn');
    }
}