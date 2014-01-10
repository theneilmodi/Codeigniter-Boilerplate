<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    public function Main(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);

    }
 
    function index(){
        // Try to get the user's id on Facebook
        

        $userId = $this->facebook->getUser();
        echo "<script>console.log(".$userId.")</script>";
        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            // Generate a login url
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
            $this->load->view('main', $data);
        } else {
            // Get user's data and print it
            
            redirect('home', 'refresh');
 
        }
    }
 
}
 
?>