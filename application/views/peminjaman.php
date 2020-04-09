

<!-- Page-Title -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Data Peminjaman Ruang</b></h4>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Peminjam</th>
                    <th>Ruang</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Keperluan</th>
                    <th>Status Peminjaman</th>
                    <th>Persetujuan</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        foreach($query->result() as $u){
                            echo"                    
                                <tr>
                                    <td>".$no."</td>
                                    <td>".$u->namaPeminjam."</td>
                                    <td>".$u->ruang."</td>
                                    <td>".$u->tanggal."</td>
                                    <td>".$u->jamAwal."</td>
                                    <td>".$u->jamAkhir."</td>
                                    <td>".$u->keperluan."</td>
                                    <td>".$u->statusPeminjaman."</td>
                                    <td>
                                        <a href='".base_url().'peminjaman/accept/'.$u->idPeminjaman."' title='Terima' class='on-default delete-row btn btn-success'><i class='fa fa-check'></i></a>
                                        <a href='".base_url().'peminjaman/reject/'.$u->idPeminjaman."' title='Tolak' class='on-default delete-row btn btn-danger'><i class='fa fa-times'></i></a>
                                    </td>
                                    <td>
                                        <a href='#' class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal' onClick=\"SetInput1('".$u->idPeminjaman."')\" class='col-sm-6 col-md-4 col-lg-3'>
                                            <i class='ti-trash'></i></a>
                                    </td>
                                </tr>";
                            $no++;
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->

<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="custom-width-modalLabel">KONFIRMASI HAPUS DATA</h4>
                        <form action="<?php echo base_url('peminjaman/hapus'); ?>" method="post" class="form-horizontal" role="form">
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini ?</p>
                        <div class="form-group">
                             <input type="hidden" id="idPeminjaman1" name="idPeminjaman1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                
            </div>
            <!-- /.modal-dialog -->
        </div>
                    </div>
                    <!-- content -->

                <script type="text/javascript">
                function SetInput(idPeminjaman, namaPeminjam, ruang, tanggal, jamAwal, jamAkhir, keperluan, statusPeminjaman) {
                    document.getElementById('idPeminjaman').value = idPeminjaman;
                    document.getElementById('namaPeminjam').value = namaPeminjam;
                    document.getElementById('ruang').value = ruang;
                    document.getElementById('tanggal').value = tanggal;
                    document.getElementById('jamAwal').value =jamAwal;
                    document.getElementById('jamAkhir').value = jamAkhir;
                    document.getElementById('keperluan').value = keperluan;
                    document.getElementById('statusPeminjaman').value = statusPeminjaman;

                }
                 function SetInput1(idPeminjaman) {
                    document.getElementById('idPeminjaman1').value = idPeminjaman;
                }

                 function ResetInput(idPeminjaman, namaPeminjam, ruang, tanggal, jamAwal, jamAkhir, keperluan, statusPeminjaman) {
                    document.getElementById('idPeminjaman').value = "";
                    document.getElementById('namaPeminjam').value =  "";
                    document.getElementById('ruang').value =  "";
                    document.getElementById('tanggal').value =  "";
                    document.getElementById('jamAwal').value = "";
                    document.getElementById('jamAkhir').value =  "";
                    document.getElementById('keperluan').value =  "";
                    document.getElementById('statusPeminjaman').value =  "";
                }

               
                </script>
                    <footer class="footer">
                       
                    </footer>
                </div>
