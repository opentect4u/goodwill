<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Model{

	public function allPurchase(){  

        $currentdate = date('Y-m-d');
        
        $data = $this->db->query("select distinct bill_no,
                                                  bill_dt,
                                                  round(sum(tot_amt)+sum(CGST_Amt)+sum(SGST_Amt),0)net_amt
		                              from Purchase_Items where bill_dt = '$currentdate'
                                  group by  bill_no,bill_dt 
                                  order by  bill_dt,bill_no");
		return $data->result();
  }
  public function allPurchase_dt($from_dt,$to_dt){  
        
        $data = $this->db->query("select distinct bill_no,
                                                  bill_dt,
                                                  round(sum(tot_amt)+sum(CGST_Amt)+sum(SGST_Amt),0)net_amt
                                  from Purchase_Items  where bill_dt between '$from_dt' and '$to_dt'
                                  group by  bill_no,bill_dt 
                                  order by  bill_dt,bill_no");
    return $data->result();
  }

  public function getComp($id){       

    $this->db->select('*');

    $this->db->where('ID',$id);

    $data = $this->db->get('Companies');

    return $data->result();
  }

  public function getgstrate($id){       

    $sql = "select * from HS_code,products
           where HS_code.Code = products.HSN_ID
           AND   products.ID = '$id' ";

    $data = $this->db->query($sql);
    return $data->row();
  }

  public function getPurNo($date){

    $sql = $this->db->query("select ifnull(max(Purchase_ID),0)+1 as id
                             from Purchase_Items
                             where bill_dt = '$date'");

    return $sql->row();
  }

  public function insertPurchase($data){

    $this->db->insert('Purchase_Items',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }

  public function purBill($bill_no){

    $sql = $this->db->query("select distinct a.comp_name comp,
                                             a.Purchase_ID purId,
                                             a.bill_dt bill_dt,
                                             a.bill_no bill_no,
                                             a.bill_type bill_type,
                                             b.GST_ID GSTIN,
                                             b.Contact ph_no
                             from Purchase_Items a, Companies b
                             where a.comp_name = b.ID
                             and   a.bill_no ='$bill_no'");

    return $sql->row();
  }

  public function purBillDtls($bill_no){

      $sql = $this->db->query("select Pro_ID pro_id,
                                      Unit unit,
                                      Batch batch, 
                                      Expiry exp_dt,
                                      Max_Ret_Price mrp,
                                      Qty qty,
                                      Purchase_Rt pur_rt,  
                                      Dis_Amt dis_amt,
                                      CGST_Rt cgst_rt,
                                      CGST_Amt cgst_amt,
                                      SGST_Rt sgst_rt,
                                      SGST_Amt sgst_amt,
                                      tot_Amt
                                from  Purchase_Items
                                where bill_no ='$bill_no'
                                order by sl");
									
			return $sql->result();

    }  

  public function purSum($bill_no){

    $sql = $this->db->query("Select sum(Dis_Amt)dis_amt,
                                    sum(CGST_Amt) + sum(SGST_Amt)tax_amt,
                                    sum(tot_Amt) + sum(CGST_Amt) + sum(SGST_Amt)net_amt,
                                    sum(tot_Amt) + sum(Dis_Amt)  gross_amt 
                              from  Purchase_Items
                              where bill_no ='$bill_no'");

      return $sql->row();
  }

  public function deletePurchasemultiple_row($transDt,$bill_no,$purId){

      $query = $this->db->query("delete from Purchase_Items 
                                        where bill_no = '$bill_no'
                                        AND   bill_dt =  '$transDt'
                                        AND   Purchase_ID = '$purId' 
                                        ");

      if($this->db->affected_rows() > 0){

        return 1;
  
      }else{
  
        return 0;
      }
  }  
    
  public function deletePurchase($bill_no){

      $query = $this->db->query("delete from Purchase_Items where bill_no = '$bill_no'");

      if($this->db->affected_rows() > 0){

        return 1;
  
      }else{
  
        return 0;
      }
  }
  
  
  public function getpro_name($prod_id){

        $sql = $this->db->query("Select Name
                              from  products
                              where ID ='$prod_id'");

      return $sql->row();
  }

  public function pur_return(){

      $data = $this->db->query("select * from td_purchase_return");
       return $data->result();

  }
  
  public function get_pur_batch($product_id){

      $data=$this->db->query("select Pro_ID,Batch from Purchase_Items where Pro_ID ='$product_id' group by Pro_ID,Batch");
      return $data->result();

  }

  public function get_pur_expiry($product_id,$batch){

    $data=$this->db->query("select Expiry from Purchase_Items where Pro_ID ='$product_id' and Batch ='$batch'");
    return $data->row();

  }
  
  public function del_ret_pur($inv_no,$ret_batch){

      $query = $this->db->query("delete from td_purchase_return where inv_no = '$inv_no' and ret_batch ='$ret_batch'");

      if($this->db->affected_rows() > 0){

        return 1;
  
      }else{
  
        return 0;
      }
  }
}

?>