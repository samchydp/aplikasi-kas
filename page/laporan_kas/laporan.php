<div class="row">

                <div class="col-md-12">

                    <!-- Advanced Tables -->

                    <div class="panel panel-primary">

                        <div class="panel-heading">

                             Penerimaan Kas

                        </div>

                        <div class="panel-body">
                            <a id="downloadLink" onclick="exportF(this)" class="btn btn-primary mr-2">Download</a>



                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" border="1" id="dataTables-example">

                                    <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>Kode</th>

                                            <th>Tanggal</th>

                                            <th>Keterangan</th>

                                            <th>Masuk</th>

                                            <th>Jenis</th>

                                            <th>Keluar</th>

                                           

                                     </tr>

                                    </thead>

                                    <tbody>

                                    <?php



                                        $no = 1;

                                        $total = 0;

                                        $total_keluar=0;

                                        $total_masuk=0;

                                        $saldo_akhir=0;

                                        $sql = mysqli_query($koneksi, "select * from kas");

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

                                            <td>Rp. <?php echo number_format($data['jumlah']).",-";?></td>

                                            <td><?php echo $data['jenis'];?></td>

                                            <td>Rp. <?php echo number_format($data['keluar']).",-";?></td>

                                                

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

                                                    <input class="form-control" value="<?= $data['jumlah'] ?>" name="jml" type="number" id="jml"/>

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

                                            $total+=$data['jumlah'];

                                            $total_keluar=$total_keluar+$data['keluar'];

                                            $saldo_akhir=$total-$total_keluar;

                                            }

                                        ?> 



                                    </tbody>

                                        <tr>

                                            <th colspan="5" style="text-align: center; font-size: 16px;">Total Kas Masuk</th>

                                            <td align="left"style="font-size: 17px"><?php echo number_format($total).",-";?></td>

                                          </tr>

                                          <tr>

                                            <th colspan="5" style="text-align: center; font-size: 16px;">Total Kas keluar</th>

                                            <td align="left"style="font-size: 17px"><?php echo number_format($total_keluar).",-"; ?></td>

                                          </tr>

                                          <tr>

                                            <th colspan="5" style="text-align: center; font-size: 16px;">Total Saldo Akhir</th>

                                            <td align="left"style="font-size: 17px"><?php echo"Rp. " .number_format($saldo_akhir).",-";?></td>

                                          </tr>

                                </table>

                            </div>
 <iframe id="txtArea1" style="display:none"></iframe>

<script type="text/javascript">
function exportF(elem) {
  var table = document.getElementById("dataTables-example");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  console.log(elem);

  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>