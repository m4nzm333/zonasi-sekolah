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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        .bootstrap-datetimepicker-widget {
            z-index: 1500 !important;
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

                        <p class="text-right">
                            <a href="javascript:tambah()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Siswa</a>
                        </p>

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
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
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

    <div class="modal fade" id="modalSiswa">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formSiswa" action="#" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalSiswaTitle"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal mx-5 mt-2">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Peserta</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no" name="no" placeholder="Nomor Peserta" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="asal" name="asal" placeholder="Asal Sekolah" required>
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
                                <label class="col-sm-2 col-form-label">Pilihan Sekolah</label>
                                <div class="col-sm-10">
                                    <select name="pilihan" id="pilihan" class="form-control">
                                        <option value="19" selected>--- Pilih Sekolah ---</option>
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
                                <label class="col-sm-2 col-form-label">Waktu Daftar</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tanggalDaftar" name="tanggalDaftar" placeholder="Tanggal Daftar" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="waktuDaftar" name="waktuDaftar" placeholder="Waktu Daftar" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jalur</label>
                                <div class="col-sm-10">
                                    <select name="jalur" id="jalur" class="form-control" disabled>
                                        <option value="19" selected>Domisili</option>
                                    </select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script>
        const baseURL = '<?php echo base_url(); ?>';
        mapboxgl.accessToken = 'pk.eyJ1IjoibTRuem0zMzMiLCJhIjoiY2toMGs4NHhmMDI0bzJ3bm13bDV1MmYzdyJ9.cXD5oqoLL10tPHJ3470l3g';
        var map;
        var mapDetail;
        var marker;

        $('#tanggalDaftar').datepicker({
            format: 'dd-mm-yyyy',
        });
        $('#waktuDaftar').timepicker({
            showMeridian: false,
            showSeconds: true
        });

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
                    data: "no_peserta"
                },
                {
                    data: "nama"
                },
                {
                    data: "asal_sekolah"
                },
                {
                    data: "waktu_daftar"
                },
                {
                    data: "id",
                    render: (data, type, row) => {
                        return `
                            <a href="detail(${data})" class="btn btn-primary btn-xs"><i class="fa fa-map-marker"></i></a>
                            <a href="edit(${data})" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="hapus(${data})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                        `;
                    },
                }
            ],
        });

        const tambah = () => {
            formReset();
            $("#modalSiswaTitle").text('Tambah Siswa');
            $("#formSiswa").attr('action', baseURL + 'siswa/tambah');
            $("#modalSiswa").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [119.480830, -5.131307],
                zoom: 10
            });
            map.on('click', addMarker);
        }

        const addMarker = (e) => {
            if (typeof marker !== "undefined") {
                marker.remove()
            }
            marker = new mapboxgl.Marker()
                .setLngLat([e.lngLat.lng, e.lngLat.lat])
                .addTo(map);
            $("#longitude").val(e.lngLat.lng);
            $("#latitude").val(e.lngLat.lat);
        }

        const formReset = () => {
            $("#formSiswa").trigger('reset');
            if (typeof marker !== "undefined") {
                marker.remove()
            }
            if (typeof map !== "undefined") {
                map.remove()
            }
        }

        const getSekolah = () => {
            $.ajax({
                url: baseURL + 'sekolah/getSekolah',
                success: respond => {
                    $("#pilihan").html('<option value="" selected disabled>--- Pilih Sekolah ---</option>');
                    respond.sort(function(a, b) {
                        if (a.nama < b.nama) return -1;
                        if (a.nama > b.nama ) return 1;
                        return 0;
                    });
                    respond.forEach(el => {
                        $("#pilihan").append(`<option value="${el.id}">${el.nama}</option>`)
                    })
                }
            })
        }
        getSekolah();
    </script>
</body>

</html>