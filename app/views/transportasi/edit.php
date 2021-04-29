  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Edit Transportasi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/transportasi/updateTransportasi" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['transportasi']['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Jenis Transportasi</label>
                    <input type="text" class="form-control" name="jenis_transportasi" value="<?= $data['transportasi']['jenis_transportasi'];?>">
                  </div>
                  <div class="form-group">
                    <label >Nama Transportasi</label>
                    <input type="text" class="form-control"  name="nama_transportasi" value="<?= $data['transportasi']['nama_transportasi'];?>">
                  </div>
                  <div class="form-group">
                    <label >Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" name="tgl_keberangkatan" value="<?= $data['transportasi']['tgl_keberangkatan'];?>">
                  </div>
                 
                  <div class="form-group">
                    <label >Rute</label>
                    <select class="form-control" name="rute">
                        <option value="">Pilih</option>
                         <?php foreach ($data['rute'] as $row) :?>
                        <option value="<?= $row['id']; ?>" <?php if($data['rute']['id'] == $row['id']) { echo "selected"; } ?>><?= $row['nama_rute']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Jumlah Penumpang</label>
                    <input type="text" class="form-control"  name="jml_penumpang" value="<?= $data['transportasi']['jml_penumpang'];?>">
                  </div>
                  <div class="form-group">
                    <label >Titik Kumpul</label>
                    <input type="text" class="form-control" name="titik_kumpul" value="<?= $data['transportasi']['titik_kumpul'];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->