<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="card-body">
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="card mb-3">
                    <div class="card-header">
                    <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <a href="<?php echo site_url('admin/groupsoal/add'); ?>">
                            <i class="fas fa-layer-group"></i> GRAFIK E-SURVEY MAWAS DIRI
                        </a>
                    </div>
                </div>
            </div>
            </div>
                                
                <!-- <p> -->
                    <!-- <?php echo $this->session->userdata('id_subsoal')?></p>
                    <?php print_r($this->session->userdata('id_subsoal')); ?> -->
<br>
                                               <!-- <tr>
                                                    <th scope="row" style="width: 174px;">NIK</th>
                                                    <td>
                                                        <?php echo $tes->namajawaban; ?>

                                                    </td>
                                                </tr> -->
                                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2">Nama Soal</div> :
                                            <div class="col-md-8"><?php echo $carisoal->subnama; ?></div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                    <div class="row">
                                            <div class="col-md-2">Soal</div> :
                                            <div class="col-md-6"><strong><?php echo $tes->id_subsoal; ?></strong></div>
                                        </div>
                                    </li>  -->
                                    <!-- <li>
                                        <div class="row">
                                            <div class="col-md-2">Nama Jawaban</div> :
                                            <div class="col-md-6"><strong><?php echo $tes->namajawaban; ?></strong></div>
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2">Total</div> :
                                            <div class="col-md-6"><strong><?php echo $tes->total; ?></strong></div>
                                        </div>
                                    </li>  -->
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="year_pie" style="width: 900px; height: 620px; margin: 0 auto"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php $this->load->view("admin/_partials/js2.php") ?>
</body>
</html>