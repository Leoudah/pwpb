<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'superadmin') {
    // Jika sesi user_id tidak ada atau level bukan admin, arahkan kembali ke halaman login
    header('Location: ' . BASEURL . '/login');
    exit;
}

?>

<H1>CRUD</H1>

<div class="home_content">
    <div class="d-flex">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#tambahkan_blog">
            Tambah Siswa
        </button>
        <a class="ml-5" href="<?= BASEURL ?>/login/prosesLogout">
            LOG OUT
        </a>
    </div>

    <!-- Insert -->
    <div class="modal fade" id="tambahkan_blog" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul">Tambahkan Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= BASEURL ?>/superadmin/addSiswa" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="judul">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="judul">Foto Siswa</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Update -->
    <div class="modal fade" id="update_siswa" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul">Update Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php foreach ($data['crud'] as $row) : ?>

                            <form method="post" action="<?= BASEURL ?>/superadmin/saveUpdateSiswa">
                                <input type="hidden" name="id" value="<?= $data['siswa']['id'] ?>">
                                <div class="form-group">
                                    <label for="nama">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['siswa']['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['siswa']['tanggal_lahir'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Siswa</label>
                                    <input type="file" class="form-control" id="image" name="image" value="<?= $data['siswa']['image'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



    <div class="table-responsive">
        <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gambar</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data['crud'] as $row) : ?>
                    <tr class="table-primary">
                        <td scope="row">
                            <h5 class="card-title"><?= $row['nama']; ?></h5>
                        </td>
                        <td>
                            <h5 class="card-text"><?= $row['tanggal_lahir']; ?></h5>
                        </td>
                        <td style="width: 150px;"><img src="http://localhost<?= $row['image']; ?>" alt="" srcset=""></td>
                        <td><a class="btn btn-danger" onclick="return confirm('Anda yakin untuk menghapus nya?');" href="<?= BASEURL ?>/superadmin/deleteSiswa/<?= $row['id'] ?>"><i class="bi bi-trash"></i></a></td>
                        <td>
                            <button type="button" class="btn btn-warning update-siswa" data-id="<?= $row['id'] ?>" data-toggle="modal" data-target="#update_siswa">
                                <i class="bi bi-pencil"></i>
                            </button>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</div>

<script>
    // Tangani klik pada tombol "Update" dan tampilkan modal
    $(document).ready(function () {
        $('.update-siswa').click(function () {
            var siswaId = $(this).data('id');
            $.ajax({
                url: '<?= BASEURL ?>/superadmin/getSiswa/' + siswaId,
                method: 'GET',
                success: function (data) {
                    $('#updateSiswaModal .modal-body').html(data);
                    $('#updateSiswaModal').modal('show');
                }
            });
        });

        // Tangani pembaruan siswa melalui modal
        $('#updateSiswaForm').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            $.ajax({
                url: '<?= BASEURL ?>/superadmin/saveUpdateSiswa',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function () {
                    $('#updateSiswaModal').modal('hide');
                    location.reload();
                }
            });
        });
    });
    
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

