
 <!-- BOOTSTRAP STYLES-->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- MORRIS CHART STYLES-->



    <!-- CUSTOM STYLES-->

    <link href="assets/css/custom.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />

    <!-- TABLE STYLES-->

    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

 		<div class="row">

                <div class="col-md-12">

                    <!-- Advanced Tables -->

                    <div class="panel panel-primary">

                        <div class="panel-heading">

                             Pengeluaran Kas

                        </div>

                        <div class="panel-body">
                            <?php
                                        $sql = mysqli_query($koneksi, "select * from kas where jenis = 'keluar' ");

                            include('page/filter.php');

                            ?>
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>Kode</th>

                                            <th>Tanggal</th>

                                            <th>Keterangan</th>

                                            <th>Jumlah</th>

                                            <th>Aksi</th>

                                     </tr>

                                    </thead>

                                    <tbody>

                                    <?php



                                        $no = 1;

                                        $total = 0;


                                        while($data = mysqli_fetch_array($sql)) {

                                        ?>

                                        

                                        <tr class="odd gradeX">

                                            <?php 

                                            // echo date('Y-d-m', strtotime($data['tgl'])) 

                                            ?>

                                            <td><?php echo $no++; ?></td>

                                            <td><?php echo $data['kode'];?></td>

                                            <td><?php echo date('d F Y', strtotime($data['tgl']));?></td>

                                            <td class="center"><?php echo $data['keterangan'];?></td>

                                            <td>Rp. <?php echo number_format($data['keluar']).",-";?></td>

                                            <td>

                                                <a id="edit_data" data-toggle="modal" data-target="#edit-<?= $data['kode'] ?>"  class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>



                                                <form action="" method="post" class="d-flex hps">

                                                <input type="hidden" name="kode" value="<?= $data['kode'] ?>">

                                                <button type="submit" name="hapus" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin hapus?')"><i class="fa fa-trash"></i>Hapus</button>

                                                </form>



                                            </td>

                                                

                                        </tr>

                                        <div class="modal fade" id="edit-<?= $data['kode'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 

                                            

                                        </div>

                                        <div class="modal-body">



                                            <form role="form" method="POST">

                                                <div class="form-group">

                                                    <label>Kode</label>

                                                    <input class="form-control" name="Kode" value="<?= $data['kode'] ?>" placeholder="Input Kode" id="kode" readonly='true'/>

                                                </div>

                                                <div class="form-group">

                                                    <label>Keterangan</label>

                                                    <textarea class="form-control" rows="3" name="ket"><?= $data['keterangan'] ?></textarea>

                                                 </div>



                                                 <div class="form-group">

                                                    <label>Tanggal</label>

                                                    <input class="form-control" type="date" value="<?php echo date('Y-m-d', strtotime($data['tgl'])); ?>" name="tgl" id="tgll" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Jumlah</label>

                                                    <input class="form-control" value="<?= $data['keluar'] ?>" name="jml" type="number" id="jml"/>

                                                </div>



                                            

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                            <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">                                        

                                        </div>

                                    </form>

                                    </div>

                                </div>

                            </div>

                                        <?php 

                                            $total+=$data['keluar'];



                                            }

                                        ?> 



                                    </tbody>

                                        <tr>

                                            <th colspan="4" style="text-align: center; font-size: 16px;">Total Kas Keluar</th>

                                            <td align="left"style="font-size: 17px"><?php echo"Rp. " .number_format($total).",-";$total ?></td>

                                          </tr>

                                </table>

                            </div>

                            <!-- halaman tambah-->



                        <div class="panel-body">

                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">



                              Tambah Data

                            </button>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h4 class="modal-title" id="myModalLabel">Form Tambah Data Kas Keluar</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                            

                                        </div>

                                        <div class="modal-body">



                                            <form role="form" method="POST">



                                                <div class="form-group">

                                                    <label>Kode</label>

                                                    <input class="form-control" name="Kode" placeholder="Input Kode" placeholder="Input Kode" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Keterangan</label>

                                                    <textarea class="form-control" rows="3" name="ket"></textarea>

                                                 </div>

                                                 <div class="form-group">

                                                    <label>Tanggal</label>

                                                    <input class="form-control" type="date" name="tgl"/>

                                                </div>

                                                <div class="form-group">

                                                    <label>Jumlah</label>

                                                    <input class="form-control" name="jml" type="number" />

                                                </div>



                                            

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">                                        

                                        </div>

                                    </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php

                            if (isset($_POST['simpan'])) {

                                    

                                $kode= $_POST['Kode'];

                                $ket = $_POST['ket'];

                                $tgl = $_POST['tgl'];

                                $jml = $_POST['jml'];



                                $sql = $koneksi->query("insert into kas (kode, keterangan, tgl, jumlah, jenis, keluar)values('$kode','$ket', '$tgl', 0 , 'keluar', '$jml')");

                                // var_dump($koneksi);

                                if ($sql) {

                                    ?> 

                                        <script type="text/javascript">

                                            alert('Simpan Data Berhasil');

                                            window.location.href="?page=keluar";

                                        </script>

                                    <?php 

                                }

                            }

                            if(isset($_POST['hapus'])) {

                                $koneksi->query("delete from kas where kode='".$_POST['kode']."'");

                                echo '<script type="text/javascript">

                                            alert(\'Hapus Data Berhasil\');

                                            window.location.href="?page=keluar";

                                        </script>';

                            }

                        ?>



                        <!-- akhir halaman tambah-->



                        <!-- halaman ubah-->



                        <div class="panel-body">

                            </button>

                            

                        </div>



                        <script src="assets/js/jquery-1.10.2.js">

                        

                        </script>



                        <script type="text/javascript">

                            $('.hps').submit(function(){

                            // if (confirm('Are you sure you want to save this thing into the database?')) {

                            //       // Save it!

                            //       // alert('Thing was saved to the database.');

                            //     } else {

                            //       // Do nothing!

                            //       console.log('Thing was not saved to the database.');

                            //       return false;

                            //     }

                        });

                        </script>



                        <script type="text/javascript">

                            



                               </script>



                               <?php 

                                    if (isset($_POST['ubah'])) {



                                        $kode= $_POST['Kode'];

                                        $ket = $_POST['ket'];

                                        $tgl = $_POST['tgl'];

                                        $jml = $_POST['jml'];



                                        $sql = $koneksi->query("update kas set keterangan = '$ket', tgl ='$tgl', keluar = '$jml' where kode='$kode' ");

                                        echo '<script type="text/javascript">

                                            alert(\'Ubah Data Berhasil\');

                                            window.location.href="?page=keluar";

                                        </script>';



                                    }

                                        ?> 

                                        



                            

                        <!-- akhir halaman ubah-->

        