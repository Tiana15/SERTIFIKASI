<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
                $this->load->library('form_validation');
    }


    // main view tampilan
    function index()
    {
        if ($this->session->userdata('username')) {
            redirect('login');
        }
        $data = array(
            'namafolder'    => "login",
            'namafileview'  => "V_login",
            'title'         => "Login Page | DESA XYZ"
        );
        // templating
        $this->load->view('templating/login/template_login', $data);
    }

   

    function processLogin()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username
        );
        
        $dataAkun = $this->M_login->getDataAkun($where);
     
        // mengecek isi tabel
        if ($dataAkun->num_rows() > 0) {

            // alias
            $row = $dataAkun->row_array();

            // status account
            if ($row['status_account'] == "active") {
            
                // // pencocokan password
                if (password_verify($password, $row['password'])) {
                 
                //     // add session
                    $data_session = array(

                        'sess_id_user'      => $row['id_user'],
                        'sess_fullname'     => $row['full_name'],
                        'sess_level'        => $row['level'],
                        'sess_foto'         => $row['photo']
                    );

                    $this->session->set_userdata($data_session);

                    // switch case | pencocokan level
                    switch ($row['level']) {

                        case 'admin':
                            redirect('admin/profile');
                            break;
                        case 'pegawai':
                            redirect('pegawai');
                            break;
                        case 'super_admin';
                            redirect('superadmin');
                            break;
                        }
                  
                } else {
                    
                    echo "Mohon maaf Password yang Anda masukkan salah! Mohon coba lagi ";
                    // wrong password
                    $this->session->set_flashdata('pesan', '<div class="alert alert-primary"><small>Mohon maaf Password yang Anda masukkan salah! Mohon coba lagi </small></div>');
                    redirect('login');
                }
            } else {
                
                echo "Akun tidak aktif";
                //flashdata 
                $this->session->set_flashdata('pesan', '<div class="alert alert-success"><small>Akun ' . $username . ' tidak aktif </small></div>');
                redirect('login');
            }
        } else {
            echo "account not register";

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><small>Akun ' . $username . ' tidak terdaftar</small></div>');
            redirect('login');
        }

  
        // bener | not registered | account status | password
    }

    // logout
    function logout()
    {
        $this->session->sess_destroy();
        //$this->session->set_flashdata('pesan', '<div class="alert alert-danger"><small>Anda ' . $username . ' Sudah Logout Akun </small></div>');
        redirect('login');
    }
            }
