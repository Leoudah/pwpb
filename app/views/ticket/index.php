<div class="user-content">
    <div class="container">
    <?php foreach ($data['trip'] as $row) : ?>
      <div class="col-md-4 col-sm-6 col-12 mb-4 text_right">
        <div class="card">
          <img src="http://localhost<?= $row['image']; ?>" class="card-img-top" alt="Image">
          <div class="card-body">
            <h5 class="card-title"><?= $row['nama_trip']; ?></h5>
            <p class="card-text"><?= $row['deskripsi']; ?></p>
            <p class="card-text"><strong>Tujuan:</strong> <?= $row['tujuan']; ?></p>
            <p class="card-text"><strong>Tanggal Mulai:</strong> <?= $row['start_date']; ?></p>
            <p class="card-text"><strong>Tanggal Selesai:</strong> <?= $row['end_date']; ?></p>
            <p class="card-text"><strong>Harga:</strong> <?= $row['harga']; ?></p>
            <p class="card-text"><strong>Slot Tiket:</strong> <?= $row['slot_tiket']; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
</div>