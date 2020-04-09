<?php 
 
class M_peminjaman extends CI_Model{
    function tampil_data(){
        return $this->db->get('peminjaman');
    }
    
    function tambah_data() {
        $namaPeminjam = $this->input->post('namaPeminjaman');
        $ruang = $this->input->post('ruang');
        $tanggal = $this->input->post('tanggal');
        $jamAwal = $this->input->post('jamAwal');
        $jamAkhir = $this->input->post('jamAkhir');
        $keperluan = $this->input->post('keperluan');
        $statusPeminjaman = $this->input->post('statusPeminjaman');
 
        $data = array(
            'namaPeminjaman' => $namaPeminjaman,
            'ruang' => $ruang,
            'tanggal' => $tanggal,
            'jamAwal' => $jamAwal,
            'jamAkhir' => $jamAkhir,
            'keperluan' => $keperluan,
            'statusPeminjaman' => $statusPeminjaman
            );
        $this->db->insert('peminjaman', $data);
        redirect('../peminjaman');
    }
  
    function ubah_data ($idpeminjam) {
         $namaPeminjam = $this->input->post('namaPeminjaman');
        $ruang = $this->input->post('ruang');
        $tanggal = $this->input->post('tanggal');
        $jamAwal = $this->input->post('jamAwal');
        $jamAkhir = $this->input->post('jamAkhir');
        $keperluan = $this->input->post('keperluan');
        $statusPeminjaman = $this->input->post('statusPeminjaman');
 
        $data = array(
            'namaPeminjaman' => $namaPeminjaman,
            'ruang' => $ruang,
            'tanggal' => $tanggal,
            'jamAwal' => $jamAwal,
            'jamAkhir' => $jamAkhir,
            'keperluan' => $keperluan,
            'statusPeminjaman' => $statusPeminjaman
            );

        $this->db->where(array('idpeminjaman' => $idpeminjaman));
        $this->db->update('peminjaman', $data);
        redirect('../peminjaman');
    }
    
    function hapus_data ($idPeminjaman) {
        $this->db->where(array('idPeminjaman' => $idPeminjaman));
        $this->db->delete('peminjaman');
        redirect('../peminjaman');
    }

    function accept($idpeminjaman)
    {
        $data = array(
            'statusPeminjaman' => 'ACCEPTED'
            );

        $this->db->where(array('idpeminjaman' => $idpeminjaman));
        $this->db->update('peminjaman', $data);
        redirect('../peminjaman');
    }

    function reject($idpeminjaman)
    {
        $data = array(
            'statusPeminjaman' => 'REJECTED'
            );

        $this->db->where(array('idpeminjaman' => $idpeminjaman));
        $this->db->update('peminjaman', $data);
        redirect('../peminjaman');
    }
}

