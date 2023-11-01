<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'superadmin') {
    // Jika sesi user_id tidak ada atau level bukan admin, arahkan kembali ke halaman login
    header('Location: ' . BASEURL . '/login');
    exit;
}

?>

<H1>Halaman Baru</H1>
<a href="<?= BASEURL ?>/login/prosesLogout">
    LOG OUT
</a>