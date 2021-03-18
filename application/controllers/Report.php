<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/************************************************************ 
 * This Controller is used for Reports                      *
 *                                                          * 
 ************************************************************/

class Report extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Process');
        $this->load->model('Reports');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','pharmacy_helper'));
    }

    public function openStock(){                    /**Opening Stock report for every year */
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $year   =  $_POST['stk_yr'];

            $stock['item'] = $this->Reports->f_get_open_stk($year);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/open_stock/openStockRep.php',$stock);

            $this->load->view('dashboard/footer');
            
        }else{

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/open_stock/openStockIp.php');

            $this->load->view('dashboard/footer');
        }
    }

/**Itemwise Stock Report */    
 
    public function stockRep(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prod   =  $_POST['prod'];

            $date   =  $_POST['from_dt'];

            $mth    =  date('n',strtotime($date));

            $yr     =  date('Y',strtotime($date));

            if($mth > 3){

                $year = $yr;

            }else{

                $year = $yr - 1;
            }

            $dt     =  date($year.'-04-01');

            $item['batch'] = $this->Reports->f_get_batch($prod);

            $item['name']  = $this->Reports->f_get_name($prod);

            $item['opn']   = $this->Reports->f_get_opening($prod,$dt);

            $item['pur']   = $this->Reports->f_get_purchase($prod,$dt,$date);

            $item['sale']  = $this->Reports->f_get_sale($prod,$dt,$date);

            $item['cls']   = $this->Reports->f_get_tot_qty($prod,$dt,$date);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/stock/stockRep.php',$item);
            
            $this->load->view('dashboard/footer');
        }else{

            $data['product'] = $this->Process->fetch_product();

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/stock/stockRepIp',$data);

            $this->load->view('dashboard/footer');
        }
    }

/**Purchase Book Report */
    public function purchaseBook(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['purc'] = $this->Reports->f_purchase($from,$to);

            $item['tot']  = $this->Reports->f_tot_purchase($from,$to);

            //$item['comp'] = $this->Reports->f_get_comp();

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/purchase_book/purchaseBookRep.php',$item);
            
             $this->load->view('dashboard/footer');
        }else{
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/purchase_book/purchaseBookIp');
             $this->load->view('dashboard/footer');
        }
    }
/**Sale Book Report */
    public function saleBook(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['sale'] = $this->Reports->f_sale($from,$to);

            $item['tot']  = $this->Reports->f_tot_sale($from,$to);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/saleBookRep.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/saleBookIp');

            $this->load->view('dashboard/footer');
        }
    }

    public function itempurchase(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prod   =  $_POST['prod'];

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['itmpurc'] = $this->Reports->f_item_purchase($from,$to,$prod);

            $item['name']    = $this->Reports->f_get_name($prod);

            $item['tot']     = $this->Reports->f_tot_item_purchase($from,$to,$prod);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/item_purchase/ItempurchaseBook.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{

            $data['product'] = $this->Process->fetch_product();
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/item_purchase/itemPurchaseIp',$data);

             $this->load->view('dashboard/footer');
        }
    }
    
/**Itemwise sale report */
    public function itemsale(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $prod   =  $_POST['prod'];

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['itmsal'] = $this->Reports->f_item_sale($from,$to,$prod);

            $item['name']    = $this->Reports->f_get_name($prod);

            $item['tot']     = $this->Reports->f_tot_item_sale($from,$to,$prod);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/item_sale/ItemsaleBook.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{

            $data['product'] = $this->Process->fetch_product();
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');
            $this->load->view('report/item_sale/itemSaleIp',$data);

             $this->load->view('dashboard/footer');
        }
    }

/**Stock report as on a supplied date */   

    public function totStockRep(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $date   =  $_POST['stk_dt'];

            $mth    =  date('n',strtotime($date));

            $yr     =  date('Y',strtotime($date));

            if($mth > 3){

                $year = $yr;

            }else{

                $year = $yr - 1;
            }

            $dt     =  date($year.'-04-01');

            $item['qty'] = $this->Reports->f_get_all_qty($dt,$date);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/total_stk/totStockRep',$item);

             $this->load->view('dashboard/footer');
            
        }else{

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');
            $this->load->view('report/total_stk/totStockIp');

            $this->load->view('dashboard/footer');
        }
    }
    
    public function cr_sale_rep(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['sale'] = $this->Reports->cr_payment($from,$to);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/credit_paylist',$item);

             $this->load->view('dashboard/footer');
            
        }else{
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/credit_payment');

            $this->load->view('dashboard/footer');
        }
    }
    public function composite_gst(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['totsale']  = $this->Reports->f_tot_sales($from,$to);

            $item['totpur']  = $this->Reports->f_tot_purchase($from,$to);

           
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/composite_gstlist',$item);

             $this->load->view('dashboard/footer');
            
        }else{
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/composite_gst');

            $this->load->view('dashboard/footer');
        }
    }

    public function com_GST(){

       if($_SERVER['REQUEST_METHOD']=='POST'){

            $from   =  $_POST['from_dt'];

            $to     =  $_POST['to_dt'];

            $item['sale'] = $this->Reports->f_saless($from,$to);

         //   $item['tot']  = $this->Reports->f_tot_sale($from,$to);

            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/saleBookRep_desc.php',$item);

             $this->load->view('dashboard/footer');
            
        }else{
            
            $this->load->view('dashboard/header');

            $this->load->view('dashboard/nav');

            $this->load->view('dashboard/menu');

            $this->load->view('report/sale_book/saleBook');

            $this->load->view('dashboard/footer');
        }
    }

    public function consolidated_sale(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
 
             $from   =  $_POST['from_dt'];
 
             $to     =  $_POST['to_dt'];

             $_SESSION['frm_dt'] = $_POST['from_dt'];

             $_SESSION['to_dt']  =  $_POST['to_dt'];
 
             $item['sale'] = $this->Reports->f_sale_console($from,$to);
 
          //   $item['tot']  = $this->Reports->f_tot_sale($from,$to);
 
             $this->load->view('dashboard/header');
 
             $this->load->view('dashboard/nav');
 
             $this->load->view('dashboard/menu');
 
             $this->load->view('report/sale_book/saleBookRep_console.php',$item);
 
              $this->load->view('dashboard/footer');
             
         }else{
             
             $this->load->view('dashboard/header');
 
             $this->load->view('dashboard/nav');
 
             $this->load->view('dashboard/menu');
 
             $this->load->view('report/sale_book/saleBook_consol_ip');
 
             $this->load->view('dashboard/footer');
         }
    }
/** */
    public function saleConsole_excel() {

        $this->load->library('excel');

        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_column = array("Sl No.","Bill No.","Bill Date","Name","GST No.","Taxable Amt","CGST","SGST","Total Bill Amt","Discount","Rounded Off","Total");

        $column = 0;

        foreach($table_column as $values){
            $object->getActiveSheet()->SetCellValueByColumnAndRow($column,1,$values);
            $column++;	
        }

        $xldata = $this->Reports->f_sale_console($_SESSION['frm_dt'],$_SESSION['to_dt']);
        $rowCount = 2;
        $i = 1;

        foreach($xldata as $row){

            $object->getActiveSheet()->SetCellValueByColumnAndRow(0,$rowCount,$i++);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(1,$rowCount,$row->Sales_ID);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(2,$rowCount,date('d/m/Y',strtotime($row->trans_dt)));
            $object->getActiveSheet()->SetCellValueByColumnAndRow(3,$rowCount,$row->cust_name);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(4,$rowCount,$row->gst_no);

            $taxable_amt = number_format(($row->sale_amt-$row->CGST_amt-$row->SGST_amt), 2, '.', '');

            $object->getActiveSheet()->SetCellValueByColumnAndRow(5,$rowCount,$taxable_amt);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(6,$rowCount,$row->CGST_amt);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(7,$rowCount,$row->SGST_amt);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(8,$rowCount,$row->sale_amt);

            $discount = number_format(($row->dis_amt), 2, '.', '');
            $object->getActiveSheet()->SetCellValueByColumnAndRow(9,$rowCount,$discount);

            $roundOff = round((($row->sale_amt)-($row->dis_amt)) - ($row->net_price),2);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(10,$rowCount,$roundOff);

            $netPprice = round($row->net_price);
            $object->getActiveSheet()->SetCellValueByColumnAndRow(11,$rowCount,$netPprice);

            $rowCount++;
        }


        $filename = "Consolidated Sale-".date("d-m-Y H-i-s").'.xlsx';
        $object->getActiveSheet()->setTitle("Consolidated Sale Book");

        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object,'Excel2007');
        $writer->save('php://output');
       
        exit;
    }
   /** */    

}