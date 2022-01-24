<?php

class Dashboard extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['username'])
            redirect('/accounts/login');
        $this->load->view('dashboard/index');
    }
}