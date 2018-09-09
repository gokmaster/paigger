<?php

namespace paigger\variable;

class siteUrl {

    const sitename = "CoinPlay";
    protected $domainUrl;
    protected $login = '/login_form.php';
    protected $signup = '/signup_form.php';
    
    public function __construct() {
        // Code inside __construct() is executed everytime this class is initialised
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
        $this->domainUrl  = $protocol . $_SERVER['SERVER_NAME'];
    }
    		 
    
    function get_domain_url() {
		return $this->domainUrl;
    }
    
    function get_login_url() {
		return $this->get_domain_url() . $this->login;
    }

    function get_signup_url() {
		return $this->get_domain_url() . $this->signup;
    }

	
}	
?> 