<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
        $this->load->model('M_surat');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        $this->load->helper(array('url','download'));

        if (empty($this->session->userdata('sess_fullname'))) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
            redirect('login');
        }
  
  
        if (empty($this->session->userdata('sess_id_user'))) {
  
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
          redirect('login');
       }
  
       if (empty($this->session->userdata('sess_level')=='admin')) {
  
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
        redirect('login');
      }
      

    }    //******************** Start ABOUT ********************************************************/
     // main view tampilan profile
     public function profile()
     {
       $profile =  $this->M_admin-> getproseseditProfileByID();
       $data = array(
   
         'namafolder'	=> "admin",
         'namafileview'	=> "V_editprofile.php",
         'title'         => "Profile | Desa XYZ",
  
               //variabel
               'editprofile'      => $profile
       );
       $this->load->view('templating/admin/template_admin', $data);

     }

     //proses edit profile
       public function proseseditprofile(){
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
     
         // form validation 
         $this->form_validation->set_rules('full_name', 'full_name', 'required');
         $this->form_validation->set_rules('username','username','required');
         $this->form_validation->set_rules('created_at','created_at','required');
         $this->form_validation->set_rules('nim','nim','required');
        
         // redirect 
         if ($this->form_validation->run() == FALSE){
             echo validation_errors();
         }
         else{
             $upload = $this->M_admin->upload();
             if($upload ['result'] == 'success'){
                 $this->M_admin->updateprofile($upload);
                 // print_r($upload);
                 redirect('admin/profile','refresh');
             }else{
                 echo $upload['error'];
             }
             redirect('admin/profile','refresh');  
     }
     }

   //******************** End ABOUT ********************************************************/




     //******************** ARSIP********************************************************/

     //tampilan tabel arsip
     function arsip()
     {
        $data = array(
        'namafolder' => "admin",
        'title'      => "ARSIP | DESA XYZ",
        'namafileview' => "V_arsip",
    );

        //variabel
        $data['arsip'] = $this->M_admin->dataarsip();
        // templating
        $this->load->view('templating/admin/template_admin',$data);
     }

    //hapus arsip Surat
    public function deletesurat($id_surat)
    {
      
       $this->M_admin->hapusdatasurat($id_surat);
     
    }

    // tambah arsip surat
    public function tambahSuratarsip()
    {
        $data = array(

            'namafolder'    => "admin",
            'namafileview'    => "V_tambahsuratarsip",
            'title'         => " tambah surat arsip | DESA XYZ",

        );
        $this->load->view('templating/admin/template_admin',$data);
    }


    // Proses Tambah Akun
    function prosesTambaharsip()
    {

      // print_r( $this->input->post() );
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
      $this->form_validation->set_rules('kategori', 'kategori', 'required');
      $this->form_validation->set_rules('judul', 'judul', 'required');

      if ($this->form_validation->run() == FALSE) {

        // $this->tambah();
        echo validation_errors();
      } else {
        $upload = $this->M_admin->upload();
        if ($upload['result'] == 'success') {
          $this->M_admin->tambahdataarsip($upload);
          $this->session->set_flashdata('flash-data', 'ditambahkan');
          redirect('surat', 'refresh');
        } else {
          echo $upload['error'];
        }
      }
    }

     //proses tabel tambah surat masuk diterima , di draft dan di revisi
     function prosesTambahsurat()
     {
         // print_r( $this->input->post() );
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
 
         $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
         $this->form_validation->set_rules('kategori', 'kategori', 'required');
         $this->form_validation->set_rules('judul', 'judul', 'required');
 
         if ($this->form_validation->run() == FALSE) {
             // $this->tambah kegiatan;
             echo validation_errors();
         } else {
             // kirim data ke model 
             $this->M_admin->tambahSuratmasuk();
         }
     }

    // detail arsip
    //Menampilkan Detail Pendaftaran 
    public function detailarsip($id_surat)
    {

        $data = array(

            'namafolder'    => "admin",
            'namafileview'  => "V_detailarsip",
            'title'         => " Detail arsip | Desa XYZ"

        );

        $data['surat'] = $this->M_admin->detailarsip($id_surat);
        //$data['data_informasiprofile'] = $this->M_korwil->detailinformasi($id_informasiprofile);
        $this->load->view('templating/admin/template_admin',$data);
    }

    //------ Edit dan Udate kegiatan expired,publish dan draft -------
    public function editarsip($id_surat)
    {
        $data['title'] = 'Edit Data | Senyum Desa';
       // $data['dataCabang'] = $this->M_master->getallwilayah();

        $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
         $this->form_validation->set_rules('kategori', 'kategori', 'required');
         $this->form_validation->set_rules('judul', 'judul', 'required');

        if ($this->form_validation->run() == FALSE) {
            #code...    
            $data['surat'] = $this->M_admin->getArsipByID($id_surat);

            $this->load->view('templating/admin/template_editadmin', $data);
            $this->load->view('admin/V_editarsip', $data);
            $this->load->view('templating/admin/template_footeradmin');
        } else {
            // #code...
            //$this->M_admin->ubahdataArsip();
        }
    }

}