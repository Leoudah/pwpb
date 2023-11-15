<br>
<div class="container-ticket">
    <div class="card-ticket">
        <a href="http://localhost/travel/public/ticket">
            <div class="back-button bi bi-button btn btn-warning" style="color: black;">
                <i class="bi bi-arrow-left"></i>
            </div>
        </a>
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="http://localhost/<?= $data['trip']['image']; ?>" /></div>
                    </div>


                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?= $data['trip']['nama_trip']; ?></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="bi bi-star checked"></span>
                            <span class="bi bi-star checked"></span>
                            <span class="bi bi-star checked"></span>
                            <span class="bi bi-star checked"></span>
                            <span class="bi bi-star"></span>
                        </div>
                    </div>
                    <p class="product-description"><?= $data['trip']['deskripsi']; ?></p>
                    <h4 class="price">Total Biaya Perjalanan <span>RP.<?= $data['trip']['harga']; ?>,-</span></h4>
                    <p class="vote"><strong><?= $data['trip']['slot_tiket']; ?></strong> Sisa Slot Ticket</p>
                    <h5 class="sizes">Tujuan :
                        <span><?= $data['trip']['tujuan']; ?></span>
                    </h5>
                    <h6 class="colors">Tanggal Kegiatan :
                        <span><?= $data['trip']['start_date']; ?> Hingga <?= $data['trip']['end_date']; ?> </span>
                    </h6>
                    <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">Beli Sekarang</button>
                        <button class="like btn btn-default" type="button"><span class="bi bi-heart"></span></button>
                    </div>
                </div>
            </div>

        </div>
    </div>