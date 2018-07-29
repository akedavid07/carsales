<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
	}

	public function index()
	{	
		 $data['vehicles'] = $this->model_vehicle->getAll();
//		$data['vehicles'] = $this->model_vehicle->getLatest();
		$data['featured'] = $this->model_vehicle->getFeatured();
		$data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
		$data['models'] = $this->model_car_model->getAllModels();
		
		$this->parser->parse('public/view_index', $data);   

        // $this->load->view('public/view_index');
	}

	public function show($vehicle_id)
	{
		$data['vehicle'] = $this->model_vehicle->getById($vehicle_id);
		
		$this->parser->parse('public/view_single.php', $data);
	}

	public function about(){
		$this->load->view('public/partials/view_public_header.php');
		$this->load->view("public/about");
		$this->load->view('public/partials/view_public_footer.php');
	}

	public function contact(){
		$this->load->view('public/partials/view_public_header.php');
		$this->load->view("public/contact");
//		$this->load->view('public/partials/view_public_footer.php');
	}

	public function send_msg(){
		$this->load->library('email');
        $name = $this->input->post("name");
        $phone_number = $this->input->post("phone_number");
        $email = $this->input->post("email");
        $message = $this->input->post("message");
		$vehicle_id = $this->input->post('vehicle_id');

		$query = $this->db->query("SELECT * FROM vehicles WHERE vehicle_id='$vehicle_id'");
		$row = $query->row();
		$user_id = $row->user_id;
		$q = $this->db->query("SELECT * FROM users WHERE id='$user_id'");
		$r = $q->row();

        $config['mailtype'] = 'html';
        $this->email->initialize($config);
		$this->email->from($email, 'Felanmotors.com - Contact Message');
        $this->email->reply_to($email, $name);
		$this->email->to($r->email);
		$this->email->cc('akedavid07@gmail.com');
		$this->email->bcc('');

		$this->email->subject('Car Interest Message from '.$email);
		$this->email->message("<p>".$message."</p><p>Phone Number : ".$phone_number);


		if($this->email->send())
			redirect("pages/show/".$vehicle_id."?msg=3&pli=1");
		else
			redirect("pages/show/".$vehicle_id."?msg=3&pli=1");
    
	  }
		
      public function search(){
        $filter_cartype = $this->input->post('car_type');
        $filter_minprice = $this->input->post('minimum_price');
        $filter_maxprice = $this->input->post('maximum_price');


			$query = $this->db->query("SELECT * FROM manufacturers WHERE manufacturer_name='$filter_cartype'");
		
        if(!$filter_cartype){

            redirect(base_url());
        }

		if($query == TRUE){
			$row = $query->row();

        if(isset($filter_cartype)){
           $this->db->select('*');
           $this->db->from('vehicles');
           $this->db->where("manufacturer_id",$row->id);
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');

           $query = $this->db->get();
           

               $result["vehicles"] = $query->result();

		$this->load->view('public/partials/view_public_header.php');
		$this->load->view("public/search",$result);
		$this->load->view('public/partials/view_public_footer.php');
                    
        }else if(isset($filter_cartype) && isset($filter_minprice)){
           $this->db->select('*');
           $this->db->from('vehicles');
           $this->db->where("manufacturer_id",$row->id);
           $this->db->where('buying_price >=',$filter_minprice);
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');

           $query = $this->db->get();
           

               $result["vehicles"] = $query->result_array();

		$this->load->view('public/partials/view_public_header.php');
		$this->load->view("public/search",$result);
		$this->load->view('public/partials/view_public_footer.php');

        }else if(isset($filter_cartype) && isset($filter_maxprice)){
           $this->db->select('*');
           $this->db->from('vehicles');
           $this->db->where("manufacturer_id",$row->id);
           $this->db->where('buying_price <=',$filter_maxprice);
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');

           $query = $this->db->get();
           

               $result["vehicles"] = $query->result_array();

		$this->load->view('public/partials/view_public_header.php');
		$this->load->view("public/search",$result);
		$this->load->view('public/partials/view_public_footer.php');

        }else if(isset($filter_cartype) && isset($filter_minprice) && isset($filter_maxprice)){
           $this->db->select('*');
           $this->db->from('vehicles');
           $this->db->where("manufacturer_id",$row->id);
           $this->db->where('buying_price >=',$filter_minprice);
           $this->db->where('buying_price <=',$filter_maxprice);
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');

           $query = $this->db->get();
           

               $result["vehicles"] = $query->result_array();

		$this->load->view('public/partials/view_public_header.php');
		$this->load->view("public/search",$result);
		$this->load->view('public/partials/view_public_footer.php');
        }


  
		}else{
			redirect(base_url()."/?msg=Search+Not+found");
		}
    }

}