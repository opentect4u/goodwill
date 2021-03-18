<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Model{


  public function Salesitemdtls(){

    $user_id    = $this->session->userdata('login')->user_id;
        $trans_dt = date('Y-m-d');

    $data = $this->db->query("select distinct a.cust_name cust_name,a.Sales_ID bill_no ,a.trans_dt bill_dt,round(sum(tot_amt))tot_amt
                from Sales_Items a ,products b 
                where  a.Prod_ID=b.ID
                and    a.trans_dt = '$trans_dt'
                group by a.cust_name, a.Sales_ID,a.trans_dt
                order by a.trans_dt,a.Sales_ID");

     return $data->result();
  
    
  }
  public function table_details($tablename){
    $data = $this->db->query("select * from $tablename ");

     return $data->result();
  }
  public function allsale_dt($from_dt,$to_dt){  
        
        $data = $this->db->query("select distinct a.cust_name cust_name,a.Sales_ID bill_no ,a.trans_dt bill_dt,round(sum(tot_amt))tot_amt
                from Sales_Items a ,products b 
                where  a.Prod_ID=b.ID 
                and    a.trans_dt between '$from_dt' and '$to_dt'
                group by a.cust_name, a.Sales_ID,a.trans_dt
                order by a.trans_dt,a.Sales_ID");

          return $data->result();
  }

  public function get_crbill_detail($bill_no,$bill_dt){  


 $data = $this->db->query("select cust_name,Sales_ID,trans_dt,sum(Net_Price) tot_amt
                from Sales_Items 
                where Sales_ID='$bill_no'
                and trans_dt='$bill_dt'
                group by cust_name, Sales_ID,trans_dt
                ");

          return $data->row();
  }

  public function fetch_product(){

    $this->db->order_by('Name','ASC');
    //$this->db->order_by('Name',ASC);
    $query = $this->db->get('products');
    
    return $query->result();
  }

  public function js_get_batch_asPer_productSelection($product){

    $sql = $this->db->query("SELECT Batch,Expiry_dt FROM Inventory WHERE Prod_ID = '$product' and `Qty` > 0 Order by Expiry_dt");

    return $sql->result();

  }

  public function js_get_expiryasbatchSelection($Prod ,$Batch,$ex_dt) {

    $sql = $this->db->query("SELECT a.Expiry_dt Expiry_dt, a.Max_Ret_Price Max_Ret_Price,a.Units Units,a.Qty Qty ,b.gst_rt gst_rt
                             FROM Inventory a ,products b 
                             WHERE a.prod_id=b.id and a.Batch  = '$Batch'  and a.prod_id='$Prod' and a.Expiry_dt='$ex_dt' ");
      
    return $sql->result();   

  }

  public function sale_no(){

      $data = $this->db->query("select ifnull(max(Sales_ID),0)+1 as Sales_ID from Sales_Items");

      return $data->row();
       
  }
  public function insert_sales($saleId, $user_id,$comp_id, $prodid, $Unit,$Batch,$Expiry, $Max_Ret_Price,$Dis_Rate, $dis_amount, $GST_Rt,$qty,$Net_Price,$cgst,$sgst,$tot_amt,$in_out_type,$br_cd,$trans_dt,$cust_name ,$doctor ,$ph_no,$Unit_count,$gst_no)
  {
  
    
    for($j=0; $j<$Unit_count ; $j++)
    {
      $value1 = array(
              'Sales_ID'      => $saleId,
              'in_out_type'   => $in_out_type,
              'trans_dt'      => $trans_dt,
             'cust_name'     => $cust_name ,
              'doctor'        => $doctor,
              'Prod_ID'       => $prodid[$j],
              'Unit'          => $Unit[$j],
              'Batch'         => $Batch[$j],
              'Expiry'        => $Expiry[$j],
              'Max_Ret_Price' => $Max_Ret_Price[$j],
              'Dis_Rate'      => $Dis_Rate[$j],
              'Dis_Amount'    => $dis_amount[$j],
              'qty'         => $qty[$j],
              'GST_Rt'       => $GST_Rt[$j],
              'CGST_amt'	    => $cgst[$j],
              'SGST_amt'	     => $sgst[$j],
              'Net_Price'     => $Net_Price[$j],
              'tot_amt'        => $tot_amt[$j],
              'ph_no'         => $ph_no,
              'gst_no'        => $gst_no,
              'created_by'    => $user_id,
              'created_dt'    => date('Y-m-d')

                          );
               // 'CGST_amt'      => $gst_amt);

              
      $this->db->insert('Sales_Items',$value1);
      $sql = "update Inventory set qty=qty - $qty[$j]  WHERE Batch='$Batch[$j]' and Prod_Id=$prodid[$j] and Expiry_dt='$Expiry[$j]'";
      $this->db->query($sql);
      // echo $this->db->last_query();
      // die;
    }
    
  }

  public function edit_sales($data,$where) {
        $this->db->where('ID',$where); 
      $this->db->update('Sales_Items', $data);
    }

  public function f_get_billReport_dtls($bill_no)
    {

      $sql = $this->db->query(" select b.Name,a.cust_name cust_name,a.bill_type bill_type,  a.cust_add  cust_add,a.doctor doctor,a.Expiry Expiry,a.Batch Batch,a.Sales_ID bill_no ,a.trans_dt bill_dt,Dis_Rate,Dis_Amount,CGST_amt,SGST_amt,sum(Net_Price)Net_Price ,sum(a.qty) qty,sum(Max_Ret_Price)mrp,a.in_out_type in_out_type,a.ph_no ph_no
                                from Sales_Items a ,products b where a.Prod_ID=b.ID AND Sales_ID = '$bill_no' 
                    group by a.cust_name ,a.bill_type,a.cust_add ,a.doctor ,a.Expiry,a.Batch,b.Name,a.Sales_ID ,a.trans_dt ,Dis_Rate,Dis_Amount,CGST_amt,SGST_amt,a.in_out_type,a.ph_no");
                  
                    
      return $sql->result();

    }

  public function f_delsale_bill($bill_no)
    {
      $query = $this->db->query("SELECT count(*)cnt FROM Sales_Items  WHERE ID='$bill_no'");

      $sql = $this->db->query("DELETE FROM Sales_Items  WHERE ID = '$bill_no'");
      $sql1=$this->db->query("SELECT Batch FROM Sales_Items  WHERE ID='$bill_no'");           
                    
      return $sql1->result();

    }
  
}

?>