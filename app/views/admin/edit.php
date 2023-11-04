<div class="home_content">
    <div class="container mt-3 d-flex justify-content-between align-items-center">
        <h3>Edit Ticket</h3>
        <div class="d-flex align-items-center">
            <div class="input-group">
                <a class="btn btn-primary " href="<?= BASEURL ?>/admin/index">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <hr>

    <div id="konten_blog" class="row mt-3 ml-1">
        <form action="<?= BASEURL ?>/admin/editTicket/<?= $data['trip']['trip_id']; ?>" method="post" enctype="multipart/form-data" class="edit-form">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-fill bd-highlight">
                    <div class="edit-input">
                        <h5>Nama Trip</h5>
                        <input type="text" class="form-control" id="nama_trip" name="nama_trip" required value="<?= $data['trip']['nama_trip']; ?>">
                    </div>
                    <div class="edit-input mt-4">
                        <h5>Tujuan</h5>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" required value="<?= $data['trip']['tujuan']; ?>">
                    </div>
                    <div class="edit-input mt-4">
                        <h5>Tanggal Dimulai Kegiatan</h5>
                        <input type="date" class="form-control" id="start_date" name="start_date" required value="<?= $data['trip']['start_date']; ?>">
                    </div>
                    <div class="edit-input mt-4">
                        <h5>Tanggal Akhir Kegiatan</h5>
                        <input type="date" class="form-control" id="end_date" name="end_date" required value="<?= $data['trip']['end_date']; ?>">
                    </div>
                    <div class="edit-input mt-4">
                        <h5 for="harga">Harga</h5>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" aria-label="Harga" aria-describedby="addon-wrapping" required value="<?= $data['trip']['harga']; ?>">
                    </div>
                    <div class="edit-input mt-4">
                        <h5 for="slot_ticket">Slot Tiket</h5>
                        <input type="number" class="form-control" id="slot_ticket" name="slot_ticket" placeholder="Slot Tiket" aria-label="Slot Tiket" aria-describedby="addon-wrapping" required value="<?= $data['trip']['slot_tiket']; ?>">
                    </div>
                </div>
                <div class="p-2 flex-fill bd-highlight">
                    <div class="edit-input">
                        <h5 for="image">Gambar</h5>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="edit-input">
                        <!-- Input tersembunyi untuk gambar lama -->
                        <input type="hidden" name="old_image" value="<?= $data['trip']['image'] ?>">
                        <img src="<?= $data['trip']['image'] ?>" alt="" width="250px">
                    </div>
                    <div class="edit-input mt-4">
                        <h5 for="deskripsi">Deskripsi</h5>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $data['trip']['deskripsi']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>