<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function Home(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);

        $userId = $this->facebook->getUser();
 
        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            redirect('main', 'refresh');
        } 
        echo "<script>console.log(".$userId.")</script>";
    }

	public function index()
	{
		

        $data['user'] = $this->facebook->api('/me');
        
        $params = array( 'next' => base_url('home/logout') );
        $data['logout'] = $this->facebook->getLogoutUrl($params);

		$this->load->view('home', $data);
	}

    public function logout()
    {
         $this->facebook->destroySession();
         redirect('main', 'refresh');
    }




}
