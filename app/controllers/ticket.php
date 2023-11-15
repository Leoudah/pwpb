<?php 
class ticket extends Controller{
    public function index()
    { 
            $data['judul'] = 'Ticket - TravelKuy';
            $data['trip'] = $this->model('Trip_model')->getAlltripdata();
            $this->view('Templates/header', $data);
            $this->view('Templates/navbar', $data);
            $this->view('ticket/index', $data);
            $this->view('Templates/footer');

    }

    public function buy($trip_id)
    { 
        $data['trip'] = $this->model('Trip_model')->getTripById($trip_id);
        if (!$data['trip']) {
            die('Tiket tidak ditemukan.');
        }

            $data['judul'] = 'Buy Ticket';
            $this->view('Templates/header', $data);
            $this->view('Templates/navbar', $data);
            $this->view('ticket/buy', $data);
            $this->view('Templates/footer');

    }
}