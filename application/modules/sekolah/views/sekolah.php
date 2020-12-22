<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sekolah | Sistem Zonasi Sekolah</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        .mapboxgl-canvas {
            width: 100%;
        }
    </style>
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
                            <h1>Sekolah</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Sekolah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Sekolah</h3>
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
                                <p class="text-right">
                                    <a href="javascript:tambah()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Sekolah</a>
                                </p>
                                <table id="tableSekolah" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Kuota</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sekolah as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['telepon']; ?></td>
                                                <td><?php echo $row['kuota']; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-map-marker"></i></a>
                                                    <a href="#" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                </td>
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

    <div class="modal fade" id="modalSekolah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formSekolah" action="#" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalSekolahTitle"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal mx-5 mt-2">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sekolah" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
                                <div class="col-sm-10">
                                    <select name="kab" id="kab" class="form-control" disabled>
                                        <option value="19" selected>Kota Makassar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Alamat" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kuota</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Kuota" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Bujur" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Lintang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <div id='map' style='width: 100%; height: 200px;'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        const baseURL = '<?php echo base_url(); ?>';
        $("#tableSekolah").DataTable();

        const tambah = () => {
            $("#modalSekolahTitle").text('Tambah Sekolah SMA');
            $("#formSekolah").attr('action', baseURL+'sekolah/tambah');
            $("#modalSekolah").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        }
    </script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibTRuem0zMzMiLCJhIjoiY2toMGs4NHhmMDI0bzJ3bm13bDV1MmYzdyJ9.cXD5oqoLL10tPHJ3470l3g';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [119.480830, -5.131307],
            zoom: 10
        });
        map.on('click', addMarker);
        var marker;

        function addMarker(e) {
            if (typeof marker !== "undefined") {
                marker.remove()
            }
            marker = new mapboxgl.Marker()
                .setLngLat([e.lngLat.lng, e.lngLat.lat])
                .addTo(map);
            $("#longitude").val(e.lngLat.lng);
            $("#latitude").val(e.lngLat.lat);
        }
    </script>
</body>

</html>