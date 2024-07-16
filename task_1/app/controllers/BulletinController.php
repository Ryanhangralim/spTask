<?php 

class BulletinController extends Controller{
    public function index()
    {
        $data['message'] = $this->model('BulletinModel')->getAllBulletinMessage();
        $this->view('bulletin/index', $data);
    }

    public function add()
    {
        $contentLength = strlen($_POST['content']);
        if ($contentLength > 200 || $contentLength < 10){
            Flasher::setFlash('Your message must be 10 to 200 characters long', 'error');
            header('Location: ' . BASEURL);
            exit;
        } 
        if ($this->model('BulletinModel')->addBulletinMessage($_POST) > 0){
            Flasher::setFlash('Your message has been added', 'success');
            header('Location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('Your message failed to be added', 'error');
            header('Location: ' . BASEURL);
            exit;
        }
    }
}

?>