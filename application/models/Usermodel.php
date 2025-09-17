<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Usermodel extends CI_Model
{
   public function publicreg($data, $da)
   {
      $this->db->insert("login", $da);
      $loginid = $this->db->insert_id();
      $data['loginid'] = $loginid;
      return $this->db->insert('publicreg', $data);
   }
   public function companyreg($data, $da)
   {
      $this->db->insert("login", $da);
      $loginid = $this->db->insert_id();
      $data['loginid'] = $loginid;
      return $this->db->insert('companyreg', $data);
   }
   public function contractreg($data, $da)
   {
      $this->db->insert("login", $da);
      $loginid = $this->db->insert_id();
      $data['loginid'] = $loginid;
      return $this->db->insert('contractreg', $data);
   }
   public function hash_password($pass)
   {
      return password_hash($pass, PASSWORD_BCRYPT);
   }
   public function admincontra()
   {
      $this->db->select('*');
      $this->db->from('contractreg');
      $this->db->join('login', 'login.id=contractreg.loginid', 'inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function admincomp()
   {
      $this->db->select('*');
      $this->db->from('companyreg');
      $this->db->join('login', 'login.id=companyreg.loginid', 'inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function adminpublic()
   {
      $this->db->select('*');
      $this->db->from('publicreg');
      $this->db->join('login', 'login.id=publicreg.loginid', 'inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function companyapprove($get, $status)
   {
      $this->db->where('id', $get);
      return $this->db->update('login', $status);
   }
   public function contractapprove($get, $status)
   {
      $this->db->where('id', $get);
      return $this->db->update('login', $status);
   }
   public function contractreject($get, $status)
   {
      $this->db->where('id', $get);
      return $this->db->update('login', $status);
   }
   public function companyreject($get, $status)
   {
      $this->db->where('id', $get);
      return $this->db->update('login', $status);
   }
   public function checklogin($id, $id1)
   {
      $this->db->select('password');
      $this->db->from('login');
      $this->db->where('email', $id);
      $tablepass = $this->db->get()->row('password');
      return $this->verifypassword($id1, $tablepass);

   }
   public function verifypassword($id1, $tablepass)
   {
      return password_verify($id1, $tablepass);
   }
   public function getuserid($id)
   {

      $this->db->select('id');
      $this->db->from('login');
      $this->db->where('email', $id);
      return $this->db->get()->row('id');
   }
   public function getuserdetail($id2)
   {
      $this->db->select('*');
      $this->db->from('login');
      $this->db->where('id', $id2);
      return $this->db->get()->row();
   }
   public function companyupdation_dataview($id)
   {
      $this->db->select('*');
      $this->db->from('companyreg');
      $this->db->join('login', 'login.id=companyreg.loginid', 'inner');
      $this->db->where('login.id', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function companyupdation($data, $id)
   {
      $this->db->where('loginid', $id);
      return $this->db->update('companyreg', $data);
   }
   public function companyemailupdate($da, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('login', $da);
   }
   public function contractupdation_dataview($id)
   {
      $this->db->select('*');
      $this->db->from('contractreg');
      $this->db->join('login', 'login.id=contractreg.loginid', 'inner');
      $this->db->where('login.id', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function contractupdation($data, $id)
   {
      $this->db->where('loginid', $id);
      return $this->db->update('contractreg', $data);
   }
   public function contractemailupdate($da, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('login', $da);
   }
   public function publicupdation_dataview($id)
   {
      $this->db->select('*');
      $this->db->from('publicreg');
      $this->db->join('login', 'login.id=publicreg.loginid', 'inner');
      $this->db->where('login.id', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function publicupdation($data, $id)
   {
      $this->db->where('loginid', $id);
      return $this->db->update('publicreg', $data);
   }
   public function publicemailupdate($da, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('login', $da);
   }
   public function newsupdate()
   {
      $this->db->select('*');
      $this->db->from('newsupdate');
      $this->db->join('login', 'login.id=newsupdate.loginid', 'inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function addnews($data)
   {
      return $this->db->insert('newsupdate', $data);
   }
   public function newstable()
   {
      $this->db->select('*');
      $this->db->from('newsupdate');
      //  $this->db->join('login','login.id=newsupdate.loginid','inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function newsupdation_dataview($id)
   {
      $this->db->select('*');
      $this->db->from('newsupdate');
      //  $this->db->join('login','login.id=newsupdate.loginid','inner');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function newsupdation($data, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('newsupdate', $data);
   }
   public function newsreject($get)
   {
      $this->db->where('id', $get);
      return $this->db->delete('newsupdate');
   }
   public function newstableviews()
   {
      $this->db->select('*');
      $this->db->from('newsupdate');
      $this->db->order_by('id', 'DESC');
      //  $this->db->join('id','id=newsupdate.id','inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function shipdetails($data)
   {
      return $this->db->insert('ship', $data);
   }
   public function shipdetailsviews()
   {
      $this->db->select('*');
      $this->db->from('ship');
      $this->db->order_by('loginid');
      // $this->db->where('login.id',$id);
      //  $this->db->join('login','login.id=newsupdate.loginid','inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function shipupdation_dataview($shipid)
   {
      $this->db->select('*');
      $this->db->from('ship');
      $this->db->where('id', $shipid);
      $query = $this->db->get();
      return $query->result();
   }
   public function shipupdation($data, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('ship', $data);
   }
   public function shipdelete($get)
   {
      $this->db->where('id', $get);
      return $this->db->delete('ship');
   }
   public function shippublic()
   {
      $this->db->select('*');
      $this->db->from('ship');
      $this->db->order_by('loginid');
      $query = $this->db->get();
      return $query->result();
   }
   public function exports($data)
   {
      return $this->db->insert('shipexport', $data);

   }
   public function shipexportviews($search)
   {
      $this->db->select('*');
      $this->db->from('ship');
      if (!empty($search)) {
         $this->db->where('shipcategory', $search);
         $this->db->or_where('shipname', $search);
         $this->db->or_where('source', $search);
         $this->db->or_where('destination', $search);
         $this->db->or_where('shipdetails', $search);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function exportupdation_dataview($shipid)
   {
      $this->db->select('*');
      $this->db->from('ship');
      $this->db->where('id', $shipid);
      $query = $this->db->get();
      return $query->result();
   }
   public function exportupdation($data, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('ship', $data);
   }
   public function exportdelete($get)
   {
      $this->db->where('id', $get);
      return $this->db->delete('ship');
   }
   public function exportdetailsview($id)
   {
      // echo $id;exit;
      $this->db->select('*');
      $this->db->from('shipexport');
      $this->db->join('publicreg', 'publicreg.loginid=shipexport.loginid', 'inner');
      // $this->db->join('login','login.id=publicreg.loginid','inner');
      // $this->db->where('login.id',$id);
      $query = $this->db->get();
      return $query->result();
   }
   public function exportingchannel($data)
   {
      return $this->db->insert('exportingchannel', $data);
   }
   public function exportinsertchannel()
   {
      $this->db->select('*');
      $this->db->from('exportingchannel');
      //  $this->db->join('login','login.id=newsupdate.loginid','inner');
      $query = $this->db->get();
      return $query->result();
   }
   public function insertpayment($data)
   {
      $this->db->insert('payment', $data);
      return $this->db->insert_id();
   }

   public function getcategory()
   {
      $this->db->select('productcategory');
      $this->db->from('exportingchannel');
      return $query = $this->db->get()->row('productcategory');
   }

   public function getpriceofitem($category)
   {
      $this->db->select('exportingcharge');
      $this->db->from('exportingchannel');
      $this->db->where('productcategory', $category);
      return $query = $this->db->get()->row('exportingcharge');
   }
   public function gettaxofitem($category)
   {
      $this->db->select('taxamount');
      $this->db->from('exportingchannel');
      $this->db->where('productcategory', $category);
      return $query = $this->db->get()->row('taxamount');
   }

   public function gettotalamountbank($cardno, $cvv)
   {
      $this->db->select('amount');
      $this->db->from('bank');
      $this->db->where('cardnumber', $cardno);
      $this->db->where('cvv', $cvv);
      return $query = $this->db->get()->row('amount');
   }

   public function updatebalance($cardno, $cvv, $updatebankamount)
   {
      $this->db->where('cardnumber', $cardno);
      $this->db->where('cvv', $cvv);
      return $this->db->update('bank', $updatebankamount);
   }

   public function updatepaystatus($paystatus, $result)
   {
      $this->db->where('id', $result);
      return $this->db->update('payment', $paystatus);
   }
   public function userexport($id)
   {
      $this->db->select('*');
      $this->db->from('payment');
      $this->db->join('shipexport', 'shipexport.loginid = payment.loginid', 'inner');
      $this->db->join('ship', 'ship.id = shipexport.shipid', 'inner');
      $this->db->where('payment.loginid', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function cancelstatus($shipid, $status)
   {
      $this->db->where('id', $shipid);
      return $this->db->update('shipexport', $status);
   }
   public function shiporders($id)
   {
      $this->db->select('*');
      $this->db->from('shipexport');
      $this->db->join('publicreg', 'publicreg.loginid = shipexport.loginid', 'inner');
      $this->db->where('shipid', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function complaints($data)
   {
      return $this->db->insert('complaints', $data);
      //  $this->db->where('shipid',$id);

   }
   public function complaintsview($shipid)
   {
      $this->db->select('*');
      $this->db->from('complaints');
      $this->db->where('shipid', $shipid);
      $query = $this->db->get();
      return $query->result();
   }

   public function getcontactno($exportid)
   {
      $this->db->select('contact');
      $this->db->from('publicreg');
      $this->db->join('shipexport', 'shipexport.loginid = publicreg.loginid', 'inner');
      $this->db->where('exportid', $exportid);
      return $query = $this->db->get()->row('contact');
   }

   public function gettotalamountcredit($contactnouser)
   {
      $this->db->select('amount');
      $this->db->from('bank');
      $this->db->where('contact', $contactnouser);
      return $query = $this->db->get()->row('amount');
   }

   public function updatecreditbank($contactnouser, $credit_amount_update)
   {
      $this->db->where('contact', $contactnouser);
      return $this->db->update('bank', $credit_amount_update);
   }

   public function updaterefundstatus($refund_status, $complaintid)
   {
      $this->db->where('id', $complaintid);
      return $this->db->update('complaints', $refund_status);
   }
   public function admintenders($data)
   {
      return $this->db->insert('tender', $data);
      //  $this->db->where('shipid',$id);

   }

   public function tenderview()
   {
      $this->db->select('*');
      $this->db->from('tender');
      $this->db->order_by('id');
      $query = $this->db->get();
      return $query->result();
   }

   public function tenderupdation_view($id)
   {
      $this->db->select('*');
      $this->db->from('tender');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->result();
   }
   public function tenderupdation($data, $id)
   {
      $this->db->where('id', $id);
      return $this->db->update('tender', $data);
   }

   public function tenderdelete($get)
   {
      $this->db->where('id', $get);
      return $this->db->delete('tender');
   }

   public function tendercontractview()
   {
      $this->db->select('*');
      $this->db->from('tender');
      $this->db->order_by('id');
      $query = $this->db->get();
      return $query->result();
   }

   public function tenderapplynow_1($data, $id)
   {
      // $this->db->where('id', $id);
      return $this->db->insert('tenderapply', $data);
   }

   public function tenderapplynow1()
   {
      $this->db->select('*');
      $this->db->from('tenderapply');
      $this->db->join('contractreg', 'contractreg.loginid = tenderapply.contract_loginid', 'inner');
      // $this->db->where('shipid', $id);
      $this->db->order_by('tenderapply.tapplyid', 'DESC');

      $query = $this->db->get();
      return $query->result();
   }

   public function tenderapprove($get,$status)
   {
      $this->db->where('tapplyid', $get);
      return $this->db->update('tenderapply',$status);
   }

   public function tenderapproveview1()
   {
      $this->db->select('*');
      $this->db->from('tenderapply');
      $this->db->join('contractreg', 'contractreg.loginid = tenderapply.contract_loginid', 'inner');
      $this->db->join('tender','tender.id= tenderapply.tenderid','inner');
      $this->db->order_by('tenderapply.tapplyid', 'DESC');
      $query = $this->db->get();
      return $query->result();
   }

   public function job($data)
   {
      return $this->db->insert('job', $data);
   }

   public function jobview()
   {
      $this->db->select('*');
      $this->db->from('job');
      $this->db->order_by('jobid');
      $query = $this->db->get();
      return $query->result();
   }

   public function jobedit_dataview($jobid)
   {
      $this->db->select('*');
      $this->db->from('job');
      $this->db->where('jobid', $jobid);
      $query = $this->db->get();
      return $query->result();
   }

   public function jobupdation($data, $id)
   {
      $this->db->where('jobid', $id);
      return $this->db->update('job', $data);
   }
   public function job_delete($get)
   {
      $this->db->where('jobid', $get);
      return $this->db->delete('job');
   }
   // public function jobapplyview()
   // {
   //    $this->db->select('*');
   //    $this->db->from('jobapply');
   //    $this->db->order_by('jobid');
   //    $query = $this->db->get();
   //    return $query->result();
   // }

   public function jobapplynow_1($data,$jobid)
   {
      return $this->db->insert('jobapply',$data);
   }
   public function jobedit_companyview($jobid)
   {
      $this->db->select('*');
      $this->db->from('job');
      $this->db->where('jobid', $jobid);
      $query = $this->db->get();
      return $query->result();
   }

   public function jobupdations($data,$id)
   {
      $this->db->where('jobid',$id);
      return $this->db->update('job',$data);
   }
   public function jobdeletecom($get)
   {
      $this->db->where('jobid', $get);
      return $this->db->delete('job');
   }


   public function jobviewadmins()
   {
      $this->db->select('*');
      $this->db->from('job');
      $this->db->order_by('jobid');
      $query = $this->db->get();
      return $query->result();
   }
   public function interview1($data,$id)
   {
      return $this->db->insert('interview',$data);
   }

   public function candidateapplyview1($id)
   {
      // echo $id;exit;
      $this->db->select('*');
      $this->db->from('jobapply');
      $this->db->join('publicreg', 'publicreg.loginid=jobapply.loginid','inner');
      // $this->db->join('login','login.id=publicreg.loginid','inner');
      $this->db->where('jobapply.jobid',$id);
      $query = $this->db->get();
      return $query->result();
   }
}
?>