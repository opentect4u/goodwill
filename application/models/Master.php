<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Model{

	public function productDtls(){           /**Retrieves password against supplied user id,user must be active with value A */

        $this->db->select('*');

        $this->db->order_by('ID');
        
        $data = $this->db->get('products');

		return $data->result();
  }

  public function getAllhsn(){

        $this->db->select('*');

        $this->db->order_by('Code');

        $data = $this->db->get('HS_code');

    return $data->result();    
  }

  public function getMaxId(){

    $query = $this->db->query("select (max(ID) + 1)maxid from products");

    return $query->row(); 
  }

  public function insertNewProd($data){

        $this->db->insert('products',$data);

        if($this->db->affected_rows() > 0){

          return 1;

        }else{

          return 0;
        }
  }

  public function prodDtls($id){           /**Retrieves password against supplied user id,user must be active with value A */

    $this->db->select('*');

    $this->db->where('ID',$id);
    
    $data = $this->db->get('products');

    return $data->row();
  }

  public function updateProd($data,$where){

    $this->db->where($where);

    $this->db->update('products',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }
/**********************************************HSN Code*************************************************** */  
  public function hsnDtls(){

    $this->db->select('*');

    $this->db->order_by('Code');
    
    $data = $this->db->get('HS_code');

    return $data->result();
  }

  public function insertNewHsn($data){

    $this->db->insert('HS_code',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }

  public function gethsn($code){       

  $this->db->select('*');

  $this->db->where('Code',$code);

  $data = $this->db->get('HS_code');

  return $data->row();
  }

  public function updateHsn($data,$where){

  $this->db->where($where);

  $this->db->update('HS_code',$data);

    if($this->db->affected_rows() > 0){

    return 1;

    }else{

    return 0;
    }
  }

  public function chkhsn($code){       

    $data = $this->db->query("select count(*)hcount from HS_code where Code = '$code' ");

    return $data->row();
  }
/**********************************************Company*************************************************** */  
  public function compDtls(){

    $this->db->select('*');

    $this->db->order_by('ID');
    
    $data = $this->db->get('Companies');

    return $data->result();
  }

  public function insertNewComp($data){

    $this->db->insert('Companies',$data);

    if($this->db->affected_rows() > 0){

      return 1;

    }else{

      return 0;
    }
  }

  public function getComp($id){       

    $this->db->select('*');

    $this->db->where('ID',$id);

    $data = $this->db->get('Companies');

    return $data->row();
  }

  public function updateComp($data,$where){

    $this->db->where($where);

    $this->db->update('Companies',$data);

      if($this->db->affected_rows() > 0){

        return 1;

      }else{

        return 0;
      }
  }  
}
?>
