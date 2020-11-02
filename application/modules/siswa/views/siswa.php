<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Siswa | Sistem Zonasi Sekolah</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <?php $this->load->view('includes/sidebar'); ?>

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Siswa</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="col">
                                <table id="tableSiswa" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Waktu Mendaftar</th>
                                        <th>Lat</th>
                                        <th>Long</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($siswa as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['no_peserta']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['asal_sekolah']; ?></td>
                                                <td><?php echo $row['waktu_daftar']; ?></td>
                                                <td><?php echo $row['lat']; ?></td>
                                                <td><?php echo $row['lng']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>

        <?php $this->load->view('includes/footer'); ?>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $("#tableSiswa").DataTable({
            destroy: true,
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?php echo base_url('siswa/siswa_data'); ?>',
                dataType: "json",
                type: "POST"
            },
            columns: [{
                    "data": "no_peserta"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "asal_sekolah"
                },
                {
                    "data": "waktu_daftar"
                },
                {
                    "data": "lat"
                },
                {
                    "data": "lng"
                },
            ],
        });
    </script>
</body>

</html>