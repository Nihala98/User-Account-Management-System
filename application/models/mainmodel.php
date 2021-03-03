<?php
class mainmodel extends CI_model
{
//**********************Use Module************************//
//*******Inserting values in to the table*******//
public function regist($a,$b)
{
$this->db->insert("login",$b);
$loginid=$this->db->insert_id();
$a["lg_id"]=$loginid;
$this->db->insert("reg_table",$a);
}
//*****Password Encryption*****//
public function ecp($pass)
{
return password_hash($pass, PASSWORD_BCRYPT);
}
//********Login*******//
public function selectpass($unm,$pass)
{
	$this->db->select('password');
	$this->db->from("login");
	$this->db->where("uname",$unm);
	$qry=$this->db->get()->row('password');
	return $this->verifypass($pass,$qry);
}
public function verifypass($pass,$qry)
{
	return password_verify($pass,$qry);
}
public function getuserid($unm)
{
	$this->db->select('id');
	$this->db->from("login");
	$this->db->where("uname",$unm);
	return $this->db->get()->row('id');
}
public function getuser($id)
{
	$this->db->select('*');
	$this->db->from("login");
	$this->db->where("id",$id);
	return $this->db->get()->row();
}
//********Admin module*********//
//******User Table view******//
public function user_table()
{
	$this->db->select('*');
	$this->db->join('login','login.id=reg_table.lg_id','inner');
	$qry=$this->db->get("reg_table");
 	return $qry;
 }
public function approve($id)
 {
	$this->db->set('status','1');
	$qry=$this->db->where("id",$id);
	$qry=$this->db->update("login");
	return $qry;
 }
 public function reject($id)
{
	$this->db->set('status','2');
	$qry=$this->db->where("id",$id);
	$qry=$this->db->update("login");
	return $qry;
 }
public function delete($id)
{
	$this->db->where('id',$id);
	$qry=$this->db->join('reg_table','reg_table.lg_id=login.id','inner');
	$this->db->delete("reg_table");
	$qry=$this->db->where('login.id',$id);
	$this->db->delete("login");

}
//******User Profile Update******//
public function user_update($id)
	{
		$this->db->select('*');
		$qry=$this->db->join('login','reg_table.lg_id=login.id','inner');
		$qry=$this->db->where("reg_table.lg_id",$id);
		$qry=$this->db->get('reg_table');
		return $qry;

	}
	
	public function update($a,$b,$id)
	{
		$this->db->select('*');
		$qry=$this->db->where("lg_id",$id);
		$this->db->join('login','reg_table.lg_id=login.id','inner');
		$qry=$this->db->update("reg_table",$a);
		$qry=$this->db->where("id",$id);
		$qry=$this->db->update("login",$b);
		return $qry;
	}
	//******** user View****//
	public function view_table($id)
{
	$this->db->select('*');
	$qry=$this->db->where("lg_id",$id);
	$this->db->join('login','login.id=reg_table.lg_id','inner');
	$qry=$this->db->get("reg_table");
 	return $qry;
 }
 //*******Validation********//
 function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("reg_table");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      public function is_phno_available($phn_no)  
      {  
           $this->db->where('phn_no', $phn_no);  
           $query = $this->db->get("reg_table");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      public function is_uname_available($uname)
       {  
           $this->db->where('uname', $uname);  
           $query = $this->db->get("login");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      
}
?>