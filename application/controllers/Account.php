<?php

/**
 * @property Account_model Account_model
 */
class Account extends CI_Controller
{





    function index()
    {
        $this->load->view("templates/header");
        $this->load->view("templates/footer");

        require_login();


    }

    /**
     *
     */
    function login()
    {
        if($this->session->userdata("logged_in")){
            redirect(base_url("account/profile"));
        }


        if (NULL !== $this->input->post('register')) {
            $nice_user_name = $this->input->post("nice_user_name");
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $repeat_password = $this->input->post("repeat_password");
            $email = $this->input->post("email");

            if ($password != $repeat_password) {
                $this->load->view("templates/header");
                alert_swal("Passwords dont match");

            }
            try {
                $this->Account_model->register($username, $nice_user_name, $password, $email);
            } catch (Exception $e) {

                if ($e->getMessage() == "not_valid_username") alert_swal("Username not valid", "account/login");
                if ($e->getMessage() == "not_valid_nice_user_name") alert_swal("Real name not valid", "account/login");
                if ($e->getMessage() == "not_valid_email") alert_swal("Email not valid", "account/login");
                if ($e->getMessage() == "username_match") alert_swal("Username Match", "account/login");
                if ($e->getMessage() == "email_match") alert_swal("Email Match", "account/login");
            }
            redirect(base_url("account/login"));

        } elseif (NULL !== $this->input->post('login')) {

            $username = $this->input->post("username");
            $password = $this->input->post("password");


            try {
                $this->Account_model->login($username, $password);
            }catch (Exception $e){
                if($e->getMessage() == "password_dont_match") alert_swal("Password dont match", "account/login");
                if($e->getMessage() == "unknown_username") alert_swal("Unknown Username", "account/login");
            }
            redirect(base_url("account/profile"));


        } else {

            $this->load->view("templates/header");
            $this->load->view("account/login");
            $this->load->view("templates/footer");
        }
    }
    function logout(){
        $this->Account_model->logout();
        redirect(base_url("account/login"));
    }
    function profile(){

        require_login();

        $this->load->view("templates/header");
        $data = array("nice_user_name" => $this->session->userdata('nice_user_name'),
            "username" => $this->session->userdata('username'),
            "email" => $this->session->userdata('email'),
            "logged_in" => $this->session->userdata('logged_in'));
        $table_users = $this->Account_model->get_table($this->Account_model::$TABLE_NAME);
        $table_users_log = $this->Account_model->get_table($this->Account_model::$LOG_TABLE_NAME);
        $this->load->view("account/profile", array("data" => $data, "table_users" => $table_users, "table_users_log" => $table_users_log));
        $this->load->view("templates/footer");
    }
}