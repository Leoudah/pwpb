<?php
class Superadmin extends Controller{
    public function index ()
    {
        $data ['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('super/index');
        $this->view('templates/admin-footer');
    }
}

?>
