<?php
class Superadmin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['crud'] = $this->model('super_model')->getAllsiswa();
        $this->view('templates/header', $data);
        $this->view('super/index', $data);
        $this->view('templates/admin-footer');
    }

    public function addSiswa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $lahir = $_POST['tanggal_lahir'];

            $image_name = $_FILES["image"]["name"];
            $tmp_image = $_FILES["image"]["tmp_name"];
            $target_directory = $_SERVER['DOCUMENT_ROOT'] . '/pwpb/public/img/foto/';
            $target_file = $target_directory . $image_name;

            // Pastikan direktori tujuan ada
            if (!file_exists($target_directory)) {
                mkdir($target_directory, 0777, true);
            }

            // Periksa tipe file (hanya menerima gambar)
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
            $image_type = $_FILES['image']['type'];
            if (!in_array($image_type, $allowed_types)) {
                echo 'Tipe file yang diunggah tidak valid.';
                return;
            }

            // Periksa ukuran file (batasi ukuran gambar)
            $max_size = 2 * 1024 * 1024; // 2 MB
            $image_size = $_FILES['image']['size'];
            if ($image_size > $max_size) {
                echo 'Ukuran file terlalu besar. Maksimal 2MB diizinkan.';
                return;
            }

            if (move_uploaded_file($tmp_image, $target_file)) {
                // Lokasi tempat menyimpan file gambar yang diunggah
                $lokasi_simpan = '/pwpb/public/img/foto/' . $image_name;

                $data = [
                    'nama' => $nama,
                    'tanggal_lahir' => $lahir,
                    'image' => $lokasi_simpan // Simpan lokasi file gambar yang diunggah

                ];

                if ($this->model('Super_model')->tambahSiswa($data) > 0) {
                    header('Location: ' . BASEURL . '/superadmin');
                    exit;
                }
            } else {
                echo 'Gagal mengunggah file.';
            }
        }
    }

    public function deleteSiswa($id)
    {
        if ($this->model('Super_model')->hapusSiswa($id) > 0) {
            header('Location: ' . BASEURL . '/superadmin');
            exit;
        }
    }


    public function updateSiswa($id)
    {
        $data['siswa'] = $this->model('super_model')->getSiswaById($id);
    
        if (!$data['siswa']) {
            // Handle jika siswa tidak ditemukan, misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain.
            return;
        }
    
        $this->view('super/update_modal_partial', $data);
    }
    
    public function saveUpdateSiswa()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $lahir = $_POST['tanggal_lahir'];

            // Periksa apakah ada gambar baru yang diunggah
            if (!empty($_FILES['image']['name'])) {
                $image_name = $_FILES["image"]["name"];
                $tmp_image = $_FILES["image"]["tmp_name"];
                $target_directory = $_SERVER['DOCUMENT_ROOT'] . '/pwpb/public/img/foto/';
                $target_file = $target_directory . $image_name;

                // Pastikan direktori tujuan ada
                if (!file_exists($target_directory)) {
                    mkdir($target_directory, 0777, true);
                }

                // Periksa tipe file (hanya menerima gambar)
                $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
                $image_type = $_FILES['image']['type'];
                if (!in_array($image_type, $allowed_types)) {
                    echo 'Tipe file yang diunggah tidak valid.';
                    return;
                }

                // Periksa ukuran file (batasi ukuran gambar)
                $max_size = 2 * 1024 * 1024; // 2 MB
                $image_size = $_FILES['image']['size'];
                if ($image_size > $max_size) {
                    echo 'Ukuran file terlalu besar. Maksimal 2MB diizinkan.';
                    return;
                }

                if (move_uploaded_file($tmp_image, $target_file)) {
                    // Lokasi tempat menyimpan file gambar yang diunggah
                    $image = '/pwpb/public/img/foto/' . $image_name;
                } else {
                    echo 'Gagal mengunggah file.';
                    return;
                }
            } else {
                // Jika tidak ada gambar yang diunggah, gunakan gambar yang sudah ada di database
                $siswa = $this->model('super_model')->getSiswaById($id);
                $image = $siswa['image'];
            }

            $data = [
                'id' => $id,
                'nama' => $nama,
                'tanggal_lahir' => $lahir,
                'image' => $image
            ];

            if ($this->model('Super_model')->updateSiswa($data) > 0) {
                header('Location: ' . BASEURL . '/superadmin');
                exit;
            }
        }
    }

    public function getSiswa($id)
    {
        $siswa = $this->model('super_model')->getSiswaById($id);

        if (!$siswa) {
            // Handle jika siswa tidak ditemukan, misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain.
            return;
        }

        $data['siswa'] = $siswa;
        $this->view('super/update_modal_partial', $data);
    }
}
