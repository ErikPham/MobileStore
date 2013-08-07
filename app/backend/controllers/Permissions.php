<?php

/**
 * @author Lại Đạo
 * @creatdate : 07-08-2013
 */
class Permissions extends Controller {

    private $util;
    public static $rules = array(
        'module' => array(
            'type' => 'string',
            'required' => true,
            'min' => 3,
            'max' => 100,
            'trim' => true
        ),
        'action' => array(
            'type' => 'string',
            'required' => true,
            'min' => 0,
            'max' => 100,
            'trim' => true
        )
    );
    private $change_lable = array(
        'module'=> 'Module',
        'action' => 'Quyền'
    );

    public function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    /*
     * @ ACL will store information the module
     */

    public function index() {
        echo "<h2>Quan ly quyen</h2>";
    }

    public function view_acl() {
        
    }

    public function add_acl() {
        $this->view->title = 'Thêm mới module';
        $this->view->render('permissions/add_acl');
    }

    public function saveAcl() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST, true);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            if ($this->valid->isValid()) {
                $data = $_POST;
                if ($this->model->saveAcl($data)) {
                    $this->view->title = 'Thêm mới module thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã thêm mới module thành công', 'Thành công', 'success');
                } else {
                    $this->view->message = $this->util->alertMessage('Đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
                }
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Kiểm tra dữ liệu đầu vào';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu';
                }
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->util->errors = $this->valid->errors;
            }
            $this->view->acl = $_POST;
            $this->view->util = $this->util;
            $this->view->render('permissions/add_acl');
        } else {
            Util::redirectTo('backend/permissions');
        }
    }

}

?>
