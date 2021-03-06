<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {


/**
* Index Page for this controller.
*
* Maps to the following URL
* http://example.com/index.php/welcome
* - or -
* http://example.com/index.php/welcome/index
* - or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/
//********@Nihala*******//
//********index********//
public function home()
{
	$this->load->view("home");
}
//******User Module******//
public function user_home()
{
	$this->load->view("user_home");
}
public function form()
{
	$this->load->view("regform");
}
public function form_access()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules("fname","fname",'required');
	$this->form_validation->set_rules("lname","lname",'required');
	$this->form_validation->set_rules("email","email",'required');
	$this->form_validation->set_rules("phn","phn",'required');
	$this->form_validation->set_rules("dob","dob",'required');
	$this->form_validation->set_rules("address","address",'required');
	$this->form_validation->set_rules("district","district",'required');
	$this->form_validation->set_rules("pin","pin",'required');
	$this->form_validation->set_rules("uname","uname",'required');
	$this->form_validation->set_rules("password","password",'required');
	if($this->form_validation->run())
		{
			$this->load->model('mainmodel');
			$pass=$this->input->post("password");
			$ep=$this->mainmodel->ecp($pass);
				$a=array("fname"=>$this->input->post("fname"),
						"lname"=>$this->input->post("lname"),
						"email"=>$this->input->post("email"),
						"phn_no"=>$this->input->post("phn_no"),
						"dob"=>$this->input->post("dob"),
						"address"=>$this->input->post("address"),
						"district"=>$this->input->post("district"),
						"pincode"=>$this->input->post("pin"));
			$b=array("uname"=>$this->input->post("uname"),
			"password"=>$ep,);
			$this->mainmodel->regist($a,$b);
			redirect(base_url().'main/form');
			   }
}
//***Common to both admin and user***//
public function login()
{
$this->load->view('login');
}

public function log()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules("uname","uname",'required');
	$this->form_validation->set_rules("password","password",'required');
	if($this->form_validation->run())
	{
	$this->load->model('mainmodel');
	$unm=$this->input->post("uname");
	$pass=$this->input->post("password");
	$rslt=$this->mainmodel->selectpass($unm,$pass);

		if ($rslt)
		{
		$id=$this->mainmodel->getuserid($unm);
		$user=$this->mainmodel->getuser($id);
		$this->load->library(array('session'));
		$this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status,'utype'=>$user->utype,'logged_in'=>(bool)true));
			if($_SESSION['logged_in']==true &&$_SESSION['status']=='1'&& $_SESSION['utype']=='1')
			{
			redirect(base_url().'main/admin_home');
			}
			elseif($_SESSION['status']=='1'&& $_SESSION['utype']=='0')
			{
			redirect(base_url().'main/user_home');
			}
			else
			{
			echo "waiting for approval";
			}
	 	}	
    	else
	    {
	    echo "invalid user";
	    }
	}
	else
	{
	redirect('main/log','refresh');
	}
}
//*******User profile update********//	
public function user_update()
        {
        if($_SESSION['logged_in']==true&& $_SESSION['utype']=='0')
{	
        	$this->load->model('mainmodel');
        	$id=$this->session->id;
        	$data['userdata']=$this->mainmodel->user_update($id);
            $this->load->view('user_update',$data);	
        }
        else{
        	redirect('main/login','refresh');
        }
    }
public function update()
	{
		$a=array("fname"=>$this->input->post("fname"),
				"lname"=>$this->input->post("lname"),
				"email"=>$this->input->post("email"),
				"phn_no"=>$this->input->post("phn_no"),
				"dob"=>$this->input->post("dob"),
				"address"=>$this->input->post("address"),
				"district"=>$this->input->post("district"),
				"pincode"=>$this->input->post("pin"));
		$b=array("uname"=>$this->input->post("uname"));
	    $this->load->model('mainmodel');
		
		if($this->input->post("update"))
		{
			$id=$this->session->id;
			$this->mainmodel->update($a,$b,$id);
			redirect('main/user_update','refresh');
			
		}
	}
	//**********user view**************//
	public function view_table()
	{
		if($_SESSION['logged_in']==true&& $_SESSION['utype']=='0')
{	
		$id=$this->session->id;	
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->view_table($id);
		$this->load->view('view',$data);
	}
	else
	{
		redirect('main/login','refresh');
	}
}
//****Admin Module*****//
public function admin_home()
{
	$this->load->view("admin_home");
}
//*********user view and manage*********//	
public function user_table()
{
if($_SESSION['logged_in']==true&& $_SESSION['utype']=='1')
{
	$this->load->model('mainmodel');
	$data['n']=$this->mainmodel->user_table();
	$this->load->view('user_tab',$data);
}
else
{
	redirect('main/login','refresh');
}
}
public function approve()
{
	$this->load->model('mainmodel');
	$id=$this->uri->segment(3);
	$this->mainmodel->approve($id);
	redirect('main/user_table','refresh');
}
public function reject()
{
	$this->load->model('mainmodel');
	$id=$this->uri->segment(3);
	$this->mainmodel->reject($id);
	redirect('main/user_table','refresh');
}
public function delete()
{
	 $this->load->model('mainmodel');
	 $id=$this->uri->segment(3);
  	 $this->mainmodel->delete($id);
	 redirect('main/user_table','refresh');
}
//******Logout session*****//
	 public function logout()
	
    {
        $data=new stdClass();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true)
        {
            foreach ($_SESSION as $key => $value)
            {
               unset($_SESSION[$key]);
            }
            $this->session->set_flashdata('logout_notification','logged_out');
            redirect('/','refresh');
        }
        else{
            redirect('/','refresh');
        }
    }
 //******Validation********//
    public function email_availibility()  
      {  
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  

           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("mainmodel");  
                if($this->mainmodel->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }  
       

      }
      public function phno_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_phno_available($_POST["phn_no"]))  
                { 
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Phone number Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }
      public function uname_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_uname_available($_POST["uname"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> user name Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }
//******send mail*********//
  public function forget()
{
$this->load->view('forgetpswd');
}

public function send()
{
    $to =  $this->input->post('from');  // User email pass here
    $subject = 'Welcome To Elevenstech';

    $from = 'brainybunch2021@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= $this->input->post('message');  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
               


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'brainybunch2021@orisys@gmail.com';    //Important
    $config['smtp_pass']    = 'brainybunch04';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('main/forget');
}



    }
  

    
