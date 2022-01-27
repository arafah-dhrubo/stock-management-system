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
                'username'=>$user['username']
            ));
    }

    public function login()
    {
        if (isset($_SESSION['user']['username']))
            redirect('dashboard/index');
        // Form validation rule
        $data = array();
        $data['username'] = $data['password'] = '';
        $this->form_validation->set_rules('username', 'Username', 'required');
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
                        redirect('/dashboard/index');
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
            $this->load->view('accounts/login', ['data' => $data]);
        }
    }

    public function logout(){
        unset($_SESSION['user']['username']);
       redirect('accounts/login');
    }

    public
    function register()
    {
        if (isset($_SESSION['user']['username']))
            redirect('/dashboard/index');
        //Form Validation Added
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            ));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');
        $this->load->model('User_model');

        //Defining $data as array
        $data = array();
        $data['username'] = $data['password'] = $data['confirm_password'] = '';

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
                $this->User_model->register($data);
                $this->current_user($_POST['username']);
                redirect('dashboard/index');
            }
        } else {
            //Showing template for get request
            $this->load->view('accounts/register', ['data' => $data]);
        }
    }
}
