<?php 

class BulletinController extends Controller{
    public function index()
    {
        $data['message'] = $this->model('BulletinModel')->getAllBulletinMessage();
        $this->view('bulletin/index', $data);
    }
}

?>