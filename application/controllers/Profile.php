<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function index()
    {
        $NIK = $this->session->userdata('NIK');
        $getPermohonan = $this->properti_model->getJenisCuti();
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['title'] = "Jenis Cuti";
        $this->template->load('template', 'jenis_cuti', $data);
    }
    public function modeColor($id)
    {
    	$this->session->set_userdata('mode',$id);
    }

    public function SabtuMinggu()
    {
        $date1 = "01-12-2022";
        $date2 = "31-12-2022";
        
        // memecah bagian-bagian dari tanggal $date1
        $pecahTgl1 = explode("-", $date1);
        
        // membaca bagian-bagian dari $date1
        $tgl1 = $pecahTgl1[0];
        $bln1 = $pecahTgl1[1];
        $thn1 = $pecahTgl1[2];
        
        echo "<p>Tanggal yang merupakan hari minggu adalah:</p>";
        
        // counter looping
        $i = 0;
        
        // counter untuk jumlah hari minggu
        $sum = 0;
        
        do
        {
        // mengenerate tanggal berikutnya
        $tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
        
        // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
        if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0 || date("w", mktime(0, 0, 0, $bln1, $tgl1-$i, $thn1)) == 0)
        {
            $sum++;
            echo $tanggal."<br>";
            if ($tanggal != "11-12-2021") {
                $sabming[] = $tanggal;
            }
        }     
        
        // increment untuk counter looping
        $i++;
        }
        while ($tanggal != $date2);

        foreach($sabming as $har) {
            echo "<br>".$har."<br>";
        }

        // looping di atas akan terus dilakukan selama tanggal yang digenerate tidak sama dengan $date2.
        
        // tampilkan jumlah hari Minggu
        echo "<p>Jumlah hari minggu antara ".$date1." s/d ".$date2." adalah: ".count($sabming)."</p>";
    }
}