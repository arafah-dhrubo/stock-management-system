<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends
    CI_Controller
{
    public function current_user($username)
    {
        if ($this->User_model->get_user($username))
            $user = $this->User_model->get_user($username);
            $this->session->set_userdata('user', array(
                'user_id'=>$user['id'],
                'username'=>$user['username'],
                'is_admin'=>$user['is_admin']
            ));
    }

    public function is_admin(){
        if (isset($_SESSION['user']['username'])) {
            if ($_SESSION['user']['is_admin']==1) {
                redirect('dashboard/index');
            }else{
                redirect('home/index');
            }
        }
    }
    public function login()
    {
        // Form validation rule
        $data = array();
        $data['username'] = $data['password'] = '';
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->model('User_model');
            if ($this->form_validation->run() == false) {
                $data = $_POST;
                $this->load->view('accounts/login', ['data' => $data]);
            } else {
                if ($this->User_model->get_user($_POST['username'])) {
                    if (password_verify($_POST['password'], $this->User_model->login($_POST['username']))) {
                        $item = array(
                            'color' => 'green',
                            'message' => 'Login Successful'
                        );
                        $this->session->set_tempdata($item, NULL, 3);
                        $this->current_user($_POST['username']);
                        $this->is_admin();
                    } else {
                        $item = array(
                            'color' => 'red',
                            'message' => 'Wrong Password'
                        );
                        $this->session->set_tempdata($item, NULL, 3);
                        $this->load->view('accounts/login', ['data' => $data]);
                    }
                } else {
                    $data = $_POST;
                    //Add flash data
                    $item = array(
                        'color' => 'red',
                        'message' => 'Wrong Username'
                    );
                    $this->session->set_tempdata($item, NULL, 3);
                    $this->load->view('accounts/login', ['data' => $data]);
                }
            }
        } else {
            $this->is_admin();
            $this->load->view('accounts/login', ['data' => $data]);
        }
    }

    public function logout(){
        unset($_SESSION['user']);
       redirect(base_url().'accounts/login');
    }

    public
    function register()
    {
        //Form Validation Added
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            ));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');
        $this->load->model('User_model');

        //Defining $data as array
        $data = array();
        $data['username'] = $data['email'] = $data['password'] = $data['confirm_password'] = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Checking if any form filed is empty
            if ($this->form_validation->run() == false) {
                $data = $_POST;
                $this->load->view('accounts/register', ['data' => $data]);
            } else {
                //Creating new user's account
                $data['username'] = $_POST['username'];
                //Hashing Password
                $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                unset($data['confirm_password']);
                $item = array(
                    'color' => 'green',
                    'message' => 'Registration Successful'
                );
                $this->session->set_tempdata($item, NULL, 3);
                $this->User_model->register($data);
                $this->current_user($_POST['username']);
                $this->is_admin();
            }
        } else {
            //Showing template for get request
            $this->load->view('accounts/register', ['data' => $data]);
        }
    }
}
