<?php 
namespace App\Controllers;

use App\Core\Flasher;
use App\Core\Controller;
use App\Helpers\Redirect;


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
            Redirect::to(BASEURL);
        } 
        if ($this->model('BulletinModel')->addBulletinMessage($_POST) > 0){
            Flasher::setFlash('Your message has been added', 'success');
        } else {
            Flasher::setFlash('Your message failed to be added', 'error');
        }
        Redirect::to(BASEURL);
    }
}

?>