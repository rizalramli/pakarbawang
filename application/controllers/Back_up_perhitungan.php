<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("Login"));
        }
        $this->load->model("MPerhitungan");
        $this->load->model("Penyakit_model");
        $this->load->model("Form_konsultasi_gejala_model");
        $this->load->model("Gejala_model");
    }

    public function simpanHasil()
    {
        $namauser = $this->input->post('namauser');
        $tanggal = $this->input->post('tanggal');
        $namahamapenyakit = $this->input->post('namahamapenyakit');
        $persentase = $this->input->post('persentase');

        $data = array();
        $index = 0;
        foreach ($namauser as $nama) {
            array_push($data, array(
                'tgl_user' => $tanggal,
                'Nm_user' => $nama,
                'Nm_penyakit' => $namahamapenyakit[$index],
                'Nilai' => $persentase[$index],
                'notif' => 'baru'
            ));
            $index++;
        }
        $sql = $this->MPerhitungan->save_batch_riwayat($data);
        if ($sql) {
            redirect('Userbaruu/index');
        } else {
            echo 'gagal';
        }
    }

    public function index()
    {
        $nama_user_login = array(
            'nama_user' => $this->session->userdata("nama")
        );
        $query_select_v_gejala = $this->Form_konsultasi_gejala_model->getWhere("v_gejala", $nama_user_login)->num_rows();
        if ($query_select_v_gejala > '1') {
            // lebih dari 1 gejala
            $kode_gejala = $this->input->post('kodegejala');
            $nilai_dari_user = $this->input->post('Nilai');
            // insert nilai gejala yg di input user
            $data = array();
            $index = 0;
            foreach ($kode_gejala as $kd_gejala) {
                array_push($data, array(
                    'Kd_gejala' => $kd_gejala,
                    'nilai_gejala_user' => $nilai_dari_user[$index],
                    'nama_user' => $this->session->userdata("nama")
                ));
                $index++;
            }
            $sql = $this->MPerhitungan->save_batch($data);
            if ($sql) {
                $wherenama = array('nama_user' => $this->session->userdata("nama"));
                $data['nilai_gejala_user'] = $this->MPerhitungan->getWhere($wherenama, 'nilai_gejala_user')->result();
                $this->load->view('user/perhitunganbanyakgejala', $data);
            } else {
                echo 'gagal';
            }
        } else {
            // 1gejala
            if ($this->input->post('Nilai') == '0') {
                $this->session->set_flashdata('gagalKonsultasi', '<div style="color:red;"><b>Mohon, isi nilai kepastian pada setiap gejala yang terpilih !<b></div>');
                redirect('Userbaruu/form_konsultasi_gejala');
            } else {
                $data['dataPenyakit'] = $this->Penyakit_model->tampil_data()->result();
                $data['nilaidariuser'] = $this->input->post('Nilai');
                $where = array('Kd_gejala' => $this->input->post('kodegejala'));
                $data['penyakit'] = $this->MPerhitungan->getWhere($where, 'v_hamapenyakit')->result();
                $data['gejala'] = $this->MPerhitungan->getWhere($where, 'gejala')->result();
                $data['kodegejala'] = $this->input->post('kodegejala');
                $data['namagejala'] = $this->input->post('namagejala');
                $this->load->view('user/perhitungan', $data);
            }
        }
    }

    public function tesnilai()
    {
        $nilai_user = $this->input->post('nilai_user');
    }

    public function hitung()
    {
        $kode_gejala = $this->input->post('kode_gejala');
        $nilai_dari_user = $this->input->post('nilai_user');

        $data_penyakit = $this->Penyakit_model->getALlBy();
        // echo "<pre>"; 
        foreach ($nilai_dari_user as $key) {
        }
        if ($key == '0') {
            $this->session->set_flashdata('gagalKonsultasi', '<div style="color:red;"><b>Mohon, isi nilai kepastian pada setiap gejala yang terpilih !</b></div>');
            redirect('Userbaruu/form_konsultasi_gejala');
        } else {

            // JOIN kan kode gejala dengan nilai dari user
            $data_gejala_nilai = [];
            foreach ($kode_gejala as $key => $value) {
                $data_gejala_nilai[$value] = $nilai_dari_user[$key]; // perulangan unttuk mencocokkan nilai gejala dengan nilai dari user
            }
            // print_r($data_gejala_nilai);

            //tabel kombinasi Hsil nilai kali user dan pakar
            $table_kombinasi = [];
            foreach ($data_penyakit as $key => $value) {
                $table_kombinasi[$key]['kd_penyakit'] = $value->Kd_penyakit; //menampilkan
                $table_kombinasi[$key]['Definisi'] = $value->Definisi;
                $table_kombinasi[$key]['kategori'] = $value->kategori;
                $table_kombinasi[$key]['Saran'] = $value->Saran;
                $table_kombinasi[$key]['Foto'] = $value->foto;
                $table_kombinasi[$key]['nm_penyakit'] = $value->Nm_penyakit;
                $table_kombinasi[$key]['kd_gejala'] = $value->Kd_gejala;
                $table_kombinasi[$key]['nilai_cf'] = $value->Nilai_CF;
                //cara mencari nilai dari user berdasarkan gejala yang dipilih
                $table_kombinasi[$key]['nilai_dari_user'] = $this->findNilaiGejala($value->Kd_gejala, $data_gejala_nilai);
                $table_kombinasi[$key]['nilai_pakar'] = $table_kombinasi[$key]['nilai_cf'] *  $table_kombinasi[$key]['nilai_dari_user'];
            }
            // print_r($table_kombinasi);

            //group by penyakit ada gejala apa aja #table 2-5
            $data_kombinasi = $this->_group_by($table_kombinasi, 'kd_penyakit');
            // print_r($data_kombinasi);

            $hasil_hitungan = array();
            foreach ($data_kombinasi as $value) {
                $hasil = new stdClass();
                if (count($value) > 1) {
                    $hasil->kd_penyakit = $value[0]['kd_penyakit'];
                    // echo $hasil->kd_penyakit."<br>";
                    $hasil->nm_penyakit = $value[0]['nm_penyakit'];
                    $hasil->Definisi = $value[0]['Definisi'];
                    $hasil->kategori = $value[0]['kategori'];
                    $hasil->Saran = $value[0]['Saran'];
                    $hasil->Foto = $value[0]['Foto'];
                    $hasil->nilai = 0;
                    $last_nilai = 0;
                    foreach ($value as $key => $gejala) {
                        //rumus CERTAINTY FACTOR jika urutan gejala yang pertama
                        if ($value[$key]['nilai_dari_user'] > 0) {
                            if ($key == 0) {
                                // echo $key."- - ";

                                $hasil->nilai = $value[0]['nilai_pakar'] + ($value[1]['nilai_pakar'] * (1 - $value[0]['nilai_pakar']));
                                // echo $hasil->nilai."<br>";
                                $last_nilai = $hasil->nilai;
                            } else {

                                // echo $key."- -- ".$value[$key]['nilai_dari_user']."||";
                                //rumus CERTAINTY FACTOR jika urutan gejala setelah yang pertama
                                $hasil->nilai = $last_nilai + ($value[$key]['nilai_pakar'] * (1 - $last_nilai));
                                // echo $last_nilai." + ".$value[$key]['nilai_pakar']."*".(1- $last_nilai)."=".$hasil->nilai."<br>";
                                $last_nilai = $hasil->nilai;
                            }
                            // array_push($hasil_hitungan,$hasil);
                        }
                    }
                } else {
                    //rumus CERTAINTY FACTOR jika cuma ada satu gejala yang bernilai tidak sama dengan nol

                    $hasil->kd_penyakit = $value[0]['kd_penyakit'];
                    $hasil->nm_penyakit = $value[0]['nm_penyakit'];
                    $hasil->Definisi = $value[0]['Definisi'];
                    $hasil->kategori = $value[0]['kategori'];
                    $hasil->Saran = $value[0]['Saran'];
                    $hasil->Foto = $value[0]['Foto'];
                    $hasil->nilai = $value[0]['nilai_pakar'];
                }
                if ($hasil->nilai > 0) {

                    array_push($hasil_hitungan, $hasil);
                }
            }

            // print_r($hasil_hitungan);
            //mencari nilai maximuman dan set detail penyakit terpilih dari hasil hitungan CERTAINTY FACTOR
            $max = 0;
            $nama_penyakit = "";
            $kategori = "";
            $saran = "";
            $definisi = "";
            $foto = "";
            foreach ($hasil_hitungan as $value) {
                if ($max < $value->nilai) {
                    $max = $value->nilai;
                    $nama_penyakit = $value->nm_penyakit;
                    $kategori = $value->kategori;
                    $definisi = $value->Definisi;
                    $saran = $value->Saran;
                    $foto = $value->Foto;
                }
            }

            $data['nilai_max'] = $max;
            $data['nama_penyakit'] = $nama_penyakit;
            $data['kategori'] = $kategori;
            $data['definisi'] = $definisi;
            $data['saran'] = $saran;
            $data['foto'] = $foto;


            //sorting dari yang tertinggi sampe terendah
            usort($hasil_hitungan, function ($a, $b) {
                return strcmp($b->nilai, $a->nilai);
            });
            $data['hasil_hitungan'] = $hasil_hitungan;
            $this->load->view('user/perhitungan', $data);
        }
    }

    //fungsi untuk mencari nilai dari user berdasarkan gejala yang dipilih
    private function findNilaiGejala($kd_gejala, $data_gejala)
    {
        foreach ($data_gejala as $key => $value) {
            if ($key === $kd_gejala) return $value;
        }

        return 0;
    }



    //fungsi untuk group by penyakit ada gejala apaa saja yang terpilih
    private function _group_by($array, $key)
    {
        $return = array();
        foreach ($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
}
        
    /* End of file  Perhitungan.php */
