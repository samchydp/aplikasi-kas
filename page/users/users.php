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

                             Management User

                        </div>

                        <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>Username</th>

                                            <th>Email</th>

                                            <th>Password</th>

                                            <th>Status</th>

                                            <th>Created</th>

                                            <th>Aksi</th>

                                     </tr>

                                    </thead>

                                    <tbody>

                                     <?php 
                                      $sql = mysqli_query($koneksi, "select * from user");
                                      $no = 1;
                                        while($row = mysqli_fetch_array($sql)) {
                                      

                                     ?>
                                     <tr>
                                         <td>
                                             <?= $no ++

                                             ?>
                                         </td>
                                         <td>
                                             <?= $row['username']
                                             
                                             ?>
                                         </td>
                                         <td>
                                             <?= $row['email']
                                             
                                             
                                             ?>
                                         </td>
                                         <td>
                                             <?php
                                             for($i = 0; $i < strlen($row['password']); $i++){
                                                echo '*';
                                             }                                             
                                             ?>
                                         </td>
                                         <td>
                                             <?= $row['Status'] ? 'online': 'offline'
                                             
                                             ?>
                                         </td>
                                         <td>
                                             <?= $row['Created']
                                             
                                             ?>
                                         </td>
                                         <td>
                                             <a href="?<?= (isset($_GET['page']) ? 'page='.$_GET['page'].'&': '') ?>Aksi=hapus&id=<?= $row['id_user']

                                             ?>">Hapus</a>
                                                                                     
                                         </td>
                                     </tr>
                                      <?php
                                 }
                                 if(isset($_GET['Aksi']) && isset($_GET['id']) && $_GET['Aksi'] == 'hapus') {
                                        $sql = mysqli_query($koneksi,"delete from user where id_user=".$_GET['id']);
                                            echo '<script>alert("Hapus Berhasil");document.location.href="?"'.(isset($_GET['page']) ? 'page='.$_GET['page']: '').'</script>';
                                 }
                                    ?>