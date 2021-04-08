<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct(){

        parent:: __construct();
        
        $this->load->model('Sale');

        $this->load->model('Master');
         $this->load->helper('pharmacy');

        if($this->session->userdata('login') == NULL){
            
            redirect('Main/login');

        }
    }
/*********************************************Sale******************************************** */    
    
    public function sales(){

            $user['data']   =   $this->Sale->Salesitemdtls();
            $sale_no        =   $this->input->get('sale_no');

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('transaction/sale/view',$user);
            $this->load->view('dashboard/footer');
       
    }
    public function viewsalebydt(){    
                               

        if($this->session->userdata('login')){

            if($_SERVER['REQUEST_METHOD']=='POST'){

            $from_dt    = $this->input->post('from_date');

            $to_dt      = $this->input->post('to_date');

            $data['data'] = $this->Sale->allsale_dt($from_dt,$to_dt);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('transaction/sale/viewby_date',$data);

            $this->load->view('dashboard/footer');


        }else{

              $this->load->view('dashboard/header');

              $this->load->view('dashboard/nav');

              $this->load->view('dashboard/menu');

              $this->load->view('transaction/sale/viewby_date');

              $this->load->view('dashboard/footer');
        }


        }

    }

    public function cr_payment(){

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('transaction/sale/add_payment');
    }

    public function get_credit_bill_dtl(){

      $bill_no  =  $this->input->get('bill_no');
      $bill_dt  =  $this->input->get('bill_dt');

      $data = $this->Sale->get_crbill_detail($bill_no,$bill_dt);

      echo json_encode($data);

    }

    public function addcredit_amt(){

         if($_SERVER['REQUEST_METHOD']=="POST"){

                $data["bill_no"]    = $_POST['bill_no'];
                $data["bill_date"]    = $_POST['bill_dt'];
                $data["amt"]        = $_POST['amt'];
                $data["paid_dt"]    = date('Y-m-d');
                $data["created_by"] = $this->session->userdata('login')->user_id;

    $query = $this->db->get_where('due_payment', array('bill_no =' => $_POST['bill_no'],'bill_date =' => $_POST['bill_dt']));
        
       if($query->num_rows() > 0){
        $this->session->set_flashdata('msg', 'Bill Already paid');
             redirect('Sales/cr_payment'); 
       }else{
               $this->db->insert('due_payment',$data);
               redirect('Sales/creditpay_list');
       }
              
                
            }
     
    }

    public function creditpay_list(){


        $user['data']   =   $this->Sale->table_details("due_payment");
           
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('transaction/sale/cr_view',$user);
            $this->load->view('dashboard/footer');



    }
     public function addsales(){
            
            if($_SERVER['REQUEST_METHOD']=="POST"){


                $next_yr = NEXT_YEAR . '0331';
                if(date("Ymd") > $next_yr){
                    $id= '1';
                }else{

                    $sessionyear    = substr(NEXT_YEAR,2);

                    $saleIdDatas     = $this->Sale->sale_nos();

                    $saleIdData     = CURRENT_YEAR.$sessionyear.$saleIdDatas->Sales_ID;
                   
                }


                $user_id        = $this->session->userdata('login')->user_id;
                //$saleIdData     = $this->Sale->sale_no();
                $in_out_type    = $_POST['in_out_type'];
                $br_cd          = 1;
               // $saleId         = $saleIdData->Sales_ID;
                $saleId         = $saleIdData;
                $id             = $saleIdDatas->Sales_ID;
                $comp_id        = 1;
                $cust_name      = $_POST['cust_name'];
                $doctor         = $_POST['doctor'];
                $trans_dt       = $_POST['trans_dt'];
                $prodid         = $_POST['Prod_ID'];
                $Unit           = $_POST['Unit'];   
                $Batch          = $_POST['Batches'];
                $Expiry         = $_POST['Expiry'];
                $Max_Ret_Price  = $_POST['Max_Ret_Price'];
                $Dis_Rate       = $_POST['Dis_Rate'];
                $dis_amount     = $_POST['Dis_Amount'];
                $GST_Rt         = $_POST['Gst_rt'];
                // $SGST_Rt        = 0;
                $qty            = $_POST['qty'];
                $Net_Price      = $_POST['Net_Price'];
                $tot_amt        =$_POST['Tot_Price'];
                $Unit_count     = count($Unit);  
                $cgst       = $_POST['cgst'];;
                $sgst       =$_POST['sgst'];
                $ph_no          = $_POST['ph_no'];
                $gst_no         = $_POST['gst_no'];
                            
                $this->Sale->insert_sales($saleId,$id, $user_id,$comp_id, $prodid, $Unit,$Batch,$Expiry, $Max_Ret_Price,$Dis_Rate, $dis_amount, $GST_Rt,$qty,$Net_Price,$cgst,$sgst,$tot_amt,$in_out_type,$br_cd,$trans_dt,$cust_name ,$doctor ,$ph_no,$Unit_count,$gst_no);
            
        
            redirect('Sales/sales');
                
            }else{


            $data['product'] = $this->Sale->fetch_product();

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('transaction/sale/add',$data);
            }
     

    }

    public function editsale(){
    
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $this->load->helper('string');
                
                $user_id    = $this->session->userdata('login')->user_id;
                $salelId        = $_POST[ID];
                //$Prod_ID        = $_POST['Prod_ID'];          
                $Prod_ID        = $_POST['Prod_ID'];
                $batch          = $_POST['Batch'];
                $unit           = $_POST['Unit'];
                $Expiry         = $_POST['Expiry'];
                $Max_Ret_Price  = $_POST['Max_Ret_Price'];
                $Basic_Price    = $_POST['Basic_Price'];
                $dis_rate       = $_POST['dis_rate'];
                $dis_amount     = $_POST['dis_amount'];
                $CGST_Rt        = $_POST['CGST_Rt'];
                //$SGST_Rt        = $_POST['SGST_Rt'];
                $qty            = $_POST['qty'];
                $Net_Price      = $_POST['Net_Price'];
                $in_out_type    =$_POST['in_out_type'];

              //var_dump($row);die;
            $this->Process->editsale($row,$salelId  );

            $this->session->set_flashdata('msg', 'Successfully Updated!');

            redirect('Sales/sales');

        }else{
            $user_id    = $this->session->userdata('login')->user_id;
           
            $salesid=$this->Process->salesdtls($user_id);
           
            $this->load->view('dashboard/menu');
            $this->load->view('admin/salesitems',$salesid);
        }
  
    }

    public function js_get_batch_asPer_productSelection()
        {

            $product = $this->input->get('productId');
              //echo "pre";
             //var_dump($product);die;
            $result = $this->Sale->js_get_batch_asPer_productSelection($product);
            echo json_encode($result);

        } 
public function js_get_expiryasbatchSelection()
    {
        $Prod  = $this->input->get('Prod');
        $Batch = $this->input->get('Batch');
        $ex_dt = $this->input->get('ex_dt');
        //echo $Prod;        echo $Batch;

        
        $result = $this->Sale->js_get_expiryasbatchSelection($Prod,$Batch,$ex_dt);
        echo json_encode($result);
    }

    public function viewReport()
        {
            $bill_no = $this->input->get('bill_no');
            $result['data']    = $this->Sale->f_get_billReport_dtls($bill_no);
            $result['bill_no'] = $bill_no;

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('transaction/sale/print', $result);
        }
    public function delsalebill(){

            $bill_no           = $this->input->get('bill_no');
            $Batch_no[]        =$this->db->query("DELETE FROM `Sales_Items` WHERE Sales_ID='$bill_no'"); 
           // $result['data']    = $this->Sale->f_delsale_bill($bill_no);
            $result['bill_no'] = $bill_no;

           redirect("Sales/viewsalebydt");
        }

    public function cancelBill(){

            $bill_no        =  $this->input->get('bill_no');

            $bill_dt        =  $this->input->get('billdt');

            $ret            =  $this->Sale->f_cancel_bill($bill_no,$bill_dt);

            if ($ret == 1){

                $msgData = 'Bill successfully cancelled';

                $this->session->set_flashdata('msg',$msgData);
                
            }else{

                $this->session->set_flashdata('msg', 'Failed to cancel bill.');
            }


            redirect("Sales/viewsalebydt");
    }

    public function delcrbill(){

        $bill_no    = $this->input->get('bill_no');
        $bill_date  = $this->input->get('bill_date');
        $bill       = $this->db->query("DELETE FROM due_payment  WHERE bill_no ='$bill_no' and bill_date ='$bill_date'"); 
       

       redirect("Sales/creditpay_list");
    }
    
}