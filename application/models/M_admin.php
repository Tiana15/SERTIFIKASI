<<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
     /// ******* PUNYA ADMIN  ******//////
//start function
  
  //--------------  *** start  model Tabel ABOUT ****/--------------------------------------------------------//
    
    // Menampilkan isi informasi profile
  public function getproseseditProfileByID()
    {

        $id_profile = $this->session->userdata('sess_id_profile');
        $sql = "SELECT * FROM user";

        return $this->db->query($sql)->row_array();
    }

    //proses edit
    public function updateprofile($upload)
    {
        $this->session->set_userdata('sess_foto',$upload['file']['file_name']);
        $id_user = $this->input->post('id_user');
        
        // updae data di akun_profile 
        $dataProfile = array(
            'photo'  => $upload ['file']['file_name']
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('user', $dataProfile);

        $data = [
           
            'full_name'           => $this->input->post('full_name',true),
            'username'            => $this->input->post('username',true),
            'nim'               => $this->input->post('nim',true),
            'created_at'                => $this->input->post('created_at',true),
        ];


        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        //flashdata 
        $msg = '<div class="alert alert-info">Profile berhasil  diperbarui <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
        $this->session->set_flashdata('profile', $msg);
        //redirect
        redirect('Admin/profile/' . $id_user);

        // echo "<pre>";
		// 	echo var_dump($data);
		// 	echo "</pre>";
        //Mencari eror
        //print_r($data);
    
    }
    //--------------  *** end  model Tabel ABOUT ****/--------------------------------------------------------//

    //--------------  *** start  model Tabel Akun surat ****/--------------------------------------------------------//
    
    //Menampilkan Data Arsip
    function dataarsip(){
        $sql = " SELECT *FROM surat ";
        return $this->db->query($sql)->result_array();
    }
    
    //Hapus surat
    public function hapusdatasurat($id_surat)
    {
  
        $this->db->where('id_surat', $id_surat);
        $this->db->delete('surat');

        //flashdata 
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Surat berhasil dihapus </div>';
        $this->session->set_flashdata('surat', $elementHTML);

        //redirect
        redirect('Admin/arsip', 'refresh');
    }
   

    public function tambahSuratmasuk()
    {
        $upload = "";

       // $id_profile = $this->session->userdata('sess_id_user');
       // $id_cabang = $this->session->userdata('sess_id_cabang');

        $dataUploaded = array();
        $dataError    = array();


        for ($i = 0; $i < count($_FILES['namaberkas']['name']); $i++) {

            $_FILES['namaberkas[]']['name']     = $_FILES['namaberkas']['name'][$i];
            $_FILES['namaberkas[]']['type']     = $_FILES['namaberkas']['type'][$i];
            $_FILES['namaberkas[]']['tmp_name']  = $_FILES['namaberkas']['tmp_name'][$i];
            $_FILES['namaberkas[]']['error']     = $_FILES['namaberkas']['error'][$i];
            $_FILES['namaberkas[]']['size']     = $_FILES['namaberkas']['size'][$i];


            // name = variable.jpg 
            // type = .jpg 
            // alamat memori
            // error file
            // 52 kb

            $config['upload_path']          = './assets/datapenting/'; // direktori lokal
            $config['allowed_types']        = 'pdf'; // ekstensi
            $config['max_size']             = 3000; // 3 mb

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // check data upload 
            if (!$this->upload->do_upload('namaberkas[]')) {

                array_push($dataError, array(

                    'name'  => $_FILES['namaberkas']['name'][$i],
                    'error' => $this->upload->display_errors()
                ));
            } else {

                array_push($dataUploaded, $this->upload->data('file_name'));
            }
        }

        // sesi insert
        if (count($dataError) > 0) { // upload error



            $file_gagalupload = "";
            foreach ($dataError as $row) {

                $file_gagalupload .= '<p>- ' . $row['name'] . ' <br> ' . $row['error'] . '</p>';
            }

            $pesan = '<div class="alert alert-danger">Pemberitahuan <br> ' . $file_gagalupload . '</div>';
            $this->session->set_flashdata('msg', $pesan);

            redirect('admin/arsip');
        } else {

            $upload = implode(',', $dataUploaded);
        }

       // $status = $this->input->post('status');
        $data = array(
            
            'nomor_surat'    => $this->input->post('nomor_surat'),
            'judul'    => $this->input->post('judul'),
            'kategori'    => $this->input->post('kategori'),
            'namaberkas'  => $upload,
        );

    
         $this->db->insert('surat', $data);
        
         $id_surat = $this->db->insert_id();
    
        $pesan = '<div class="alert alert-info">Data Surat arsip Berhasil Disimpan! </div>';
        $this->session->set_flashdata('surat', $pesan);
        redirect('admin/arsip');
    }
   

    //detail pendaftaran 
    public function detailarsip($id_surat)
    {

        $sql = "SELECT * FROM surat
        WHERE surat.id_surat = '$id_surat'
        ";
 
        return $this->db->query($sql)->row_array();
    }

    public function getArsipByID($id_surat)
    {
        $sql = "SELECT * FROM surat
        WHERE surat.id_surat = '$id_surat'
        ";
        return $this->db->query($sql)->row_array();
    }

     //proses edit
     public function updatearsip($upload)
     {
         //$this->session->set_userdata('sess_foto',$upload['file']['file_name']);
         $id_surat = $this->input->post('id_surat');
         
         // updae data di akun_profile 
        $dataarsip = array(
             'namaberkas'  => $upload ['file']['file_name']
         );
         $this->db->where('id_surat',$id_surat);
         $this->db->update('surat',$dataarsip);
 
         $data = [
             'nomor_surat'           => $this->input->post('nomor_surat',true),
             'judul'            => $this->input->post('judul',true),
             'kategori'              => $this->input->post('kategori',true),
            
         ];
 
         $this->db->where('id_surat', $id_surat);
         $this->db->update('surat', $data);
 
         //flashdata 
         $msg = '<div class="alert alert-info">arsip berhasil  diperbarui <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
         $this->session->set_flashdata('profile', $msg);
         //redirect
         redirect('Admin/arsip/' . $id_surat);
 
         // echo "<pre>";
         // 	echo var_dump($data);
         // 	echo "</pre>";
         //Mencari eror
         //print_r($data);
     
     }
    


}
