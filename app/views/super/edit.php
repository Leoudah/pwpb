
            <form method="post" action="<?= BASEURL ?>/superadmin/saveUpdateSiswa">
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
