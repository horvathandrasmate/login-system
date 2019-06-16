<?php


class Account_model extends CI_Model
{

    public static $TABLE_NAME = "users";
    public static $LOG_TABLE_NAME = "users_log";

    public static $username = "";
    public static $email = "";
    public static $nice_user_name = "";
    public static $logged_in = false;

    function __construct()
    {
        parent::__construct();
        self::$TABLE_NAME = $this->config->item('table_prefix') . self::$TABLE_NAME;
        self::$LOG_TABLE_NAME = $this->config->item('table_prefix') . self::$LOG_TABLE_NAME;
    }

    function index(){
        redirect(base_url('account/login'));
    }

    /**
     * @param $username
     * @param $nice_user_name
     */
    function login($username, $password)
    {


        $result = $this->db->get_where(self::$TABLE_NAME, array("username" => $username))->result_array();


        if (empty($result[0]['username'])) {
            throw new Exception("unknown_username");
        }

        $real_password = $result[0]['password'];

        if (encrypt($password) !== $real_password) {
            throw new Exception('password_dont_match');
        }

        $this->session->set_userdata('username', "$username");
        $this->session->set_userdata('logged_in', true);
        $this->session->set_userdata('email', $this->get_email_by_username($username));
        $this->session->set_userdata('nice_user_name', $this->get_nice_user_name_by_username($username));

        self::$nice_user_name = $this->get_nice_user_name_by_username($username);
        self::$username = $username;
        self::$email = $this->get_email_by_username($username);
        self::$logged_in = true;
        $this->db->insert(self::$LOG_TABLE_NAME, array('username' => $username, "date" => date('Y-m-d h:i:s'), "type" => 'login'));

    }

    function get_nice_user_name_by_username($username)
    {
        $result = $this->db->get_where(self::$TABLE_NAME, array('username' => $username))->result_array();
        if (!empty($result)) {
            return $result[0]['nice_user_name'];
        } else {
            return "";
        }
    }

    function get_email_by_username($username)
    {
        $result = $this->db->get_where(self::$TABLE_NAME, array('username' => $username))->result_array();
        if (!empty($result)) {
            return $result[0]['email'];
        } else {
            return "";
        }
    }

    /**
     * @param $username
     * @param $nice_user_name
     * @param $password
     * @param $email
     * @throws Exception
     */
    function register($username, $nice_user_name, $password, $email)
    {
        $this->load->database();
        if (!is_alphanumeric($username)) {
            throw new Exception("not_valid_username");
        }
        $this->db->select('username');
        $result_array = $this->db->get_where(self::$TABLE_NAME, array("username" => $username))->result_array();

        if (!empty($result_array)) {

            throw new Exception("username_match");
        }
        $result_array = $this->db->get_where(self::$TABLE_NAME, array("email" => $email))->result_array();

        if (!empty($result_array)) {
            throw new Exception("email_match");
        }

        if (!is_alphanumeric($nice_user_name)) {

            throw new Exception("not_valid_nice_user_name");
        }
        if (!is_valid_email($email)) {

            throw new Exception("not_valid_email");
        }

        $this->db->insert(self::$TABLE_NAME, array("username" => $username, "nice_user_name" => $nice_user_name, "email" => $email, "password" => encrypt($password)));
        $this->db->insert(self::$LOG_TABLE_NAME, array('username' => $username, "date" => date('Y-m-d h:i:s'), "type" => 'register'));
    }

    function get_table($table_name)
    {
        return $this->db->get($table_name)->result_array();
    }

    function logout()
    {
        if ($this->session->userdata('logged_in')) {
            $this->session->sess_destroy();
            $this->db->insert(self::$LOG_TABLE_NAME, array('username' => $this->session->userdata('username'), "date" => date('Y-m-d h:i:s'), "type" => 'logout'));
            self::$nice_user_name = "";
            self::$username = "";
            self::$logged_in = false;
        }
    }


}