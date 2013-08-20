<?php

class CheckOut extends Controller {

    private $util;
    private static $rules = array(
        'shipping_model' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 1,
            'max' => 2000,
            'exists' => 'accounts',
            'trim' => true
        ),
        'shipping_method' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 1,
            'max' => 200,
            'trim' => true
        ),
        'note' => array(
            'type' => 'string',
            'required' => false,
            'min' => 6,
            'max' => 500,
            'trim' => true
        )
    );
    private $label = array(
        'shipping_model' => 'Phương thức vận chuyển ',
        'shipping_method' => 'Phương thức thanh toán ',
        'note' => 'Ghi chú '
    );

    public function __construct() {
        parent::__construct();
        $this->util = new Util();
        $this->val = new Validation();
    }

    function step1() {
        if (Session::get('auth') == 1) {
            $breadcrum = array(
                array('name' => 'Thông tin đơn hàng')
            );
            $cart = new ShoppingCart('cart');
            if ($cart->hasItems()) {
                $customer = $this->model->getInfoCustomer(Session::get('user_id'));
                $this->view->cart = $cart->getItems();
                $this->view->total = $cart->getTotalPrice();
                $this->view->customer = $customer;
                $this->view->title = 'Thanh toán đơn hàng';
                $this->view->step = "Bước 1/3:  Xem lại thông tin đơn hàng";
                $this->view->layout = 'home';
                $this->view->breadcrums = Breadcrumb::view($breadcrum);
                $this->view->render('checkout/step1');
            } else {
                Util::redirectTo('');
            }
        } else {
            $url = 'account/login/' . base64_encode('url=checkout/step1/thanh-toan-buoc-1.html') . '/' . Util::toSlug('dang nhap tai khoan');
            Util::redirectTo($url);
        }
    }

    function step2() {
        $cart = new ShoppingCart('cart');
        if (Session::get('auth') == 1 && $cart->hasItems()) {
            $breadcrum = array(
                array('name' => 'Thông tin thanh toán')
            );
            if (Request::isPost()) {
                $this->val->addRules(self::$rules);
                $this->val->addSource($_POST);
                $this->val->run();
                $this->val->changeLabel($this->label);
                if ($this->val->isValid()) {
                    $items = $cart->getItems();
                    $errors = array();
                    foreach ($items as $id => $item) {
                        $qtyProduct = $this->model->checkQuantity($id);
                        if ($item['quantity'] > $qtyProduct) {
                            $notice = ($qtyProduct == 0) ? "Sản phẩm này đã hết hàng" : "Số lượng sản phẩm này chỉ còn {$qtyProduct} sản phẩm.";
                            $errors[$id] = $this->util->alertMessage($notice, 'Có lỗi');
                        }
                    }

                    if (empty($errors)) {
                        $order = array(
                            'order_date' => time(),
                            'customer_id' => Session::get('user_id'),
                            'payment_id' => Request::post('shipping_method'),
                            'shipping_type' => Request::post('shipping_model'),
                            'note' => Request::post('note'),
                            'total_amout' => $cart->getTotalPrice(),
                            'total_quantity' => $cart->getTotalQuantity(),
                            'status' => 1
                        );
                        $order_id = $this->model->addOrder($order);
                        if (is_numeric($order_id)) {
                            $order_detail = array();
                            foreach ($items as $id => $item) {
                                $data = array(
                                    'quantity' => ($this->model->checkQuantity($id) - $item['quantity'])
                                );
                                $this->model->updateQuantiyProduct($data, $id);
                                $order_detail[] = array($order_id, $id, $item['price'], $item['quantity'], $item['name'], $item['thumb']);
                            }
                            $order_detail['columns'] = array('order_id', 'product_id', 'price', 'quantity', 'name', 'image');
                            if ($this->model->addOrderDetail($order_detail)) {
                                Session::set('token_order_step3', true);
                                $cart->deleteCart();
                                Util::redirectTo('checkout/step3/thanh-toan-buoc-3.html');
                            } else {
                                $this->view->message = $this->util->alertMessage('Có lỗi xảy ra. Bạn vui lòng thử lại', 'Có lỗi', 'error');
                            }
                        } else {
                            $this->view->message = $this->util->alertMessage('Có lỗi xảy ra. Bạn vui lòng thử lại', 'Có lỗi', 'error');
                        }
                    } else {
                        Session::set('error_cart', $errors);
                        Util::redirectTo('checkout/viewcart/gio-hang-cua-ban.html');
                    }
                } else {
                    if (isset($this->val->error['diff_key'])) {
                        $message = 'Dữ liệu đầu vào không hợp lệ';
                    } else {
                        $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu.';
                    }
                    $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                    $this->util->errors = $this->val->errors;
                    $this->view->checkout = $_POST;
                }
            }
            $payments = $this->model->getPayment();
            $cart = new ShoppingCart('cart');
            $this->view->payments = $payments;
            $this->view->title = 'Thanh toán đơn hàng';
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->step = "Bước 2 / 3: Thanh toán đơn hàng";
            $this->view->layout = 'home';
            $this->view->render('checkout/step2');
        } else {
            Util::redirectTo('');
        }
    }

    function step3() {
        if (Session::get('token_order_step3')) {
            $breadcrum = array(
                array('name' => 'Hoàn tất gửi đơn')
            );
            $this->view->title = 'Thanh toán đơn hàng';
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->step = "Bước 2 / 3: Thanh toán đơn hàng";
            $this->view->layout = 'home';
            $this->view->render('checkout/step3');
            Session::set('token_order_step3', '');
        } else {
            Util::redirectTo('');
        }
    }

    function viewCart() {
        $errors = array();
        $cart = new ShoppingCart('cart');
        $breadcrum = array(
                array('name' => 'Giỏ hàng')
            );
        if (Request::isPost()) {
            $data = Request::post('quantity');
            if (!empty($data)) {
                foreach ($data as $id => $qty) {
                    if (is_numeric($id) && is_numeric($qty)) {
                        $qtyProduct = $this->model->checkQuantity($id);
                        if ($qty <= $qtyProduct) {
                            $cart->setQuantityItem($id, $qty);
                        } else {
                            $error = 'Hiện tại chỉ còn ' . $qtyProduct . ' sản phẩm trong kho';
                            $errors[$id] = $this->util->alertMessage($error, 'Có lỗi');
                        }
                    }
                }
                $cart->saveCart();
            }
        }
        if (!empty($errors)) {
            $this->util->errors = $errors;
        } elseif (!is_null(Session::get('error_cart'))) {
            $this->util->errors = Session::get('error_cart');
        }

        $this->view->layout = 'home';
        $this->view->title = 'Giỏ hàng của bạn';
        $this->view->breadcrums = Breadcrumb::view($breadcrum);
        $this->view->cart = $cart->getItems();
        $this->view->total = $cart->getTotalPrice();
        $this->view->util = $this->util;
        $this->view->render('checkout/viewcart');
    }

    function xhrAdd() {
        $cart = new ShoppingCart('cart');
        $id = Request::post('id');
        $qty = ($cart->hasItem($id)) ? $cart->getQuantity($id) + Request::post('qty') : Request::post('qty');

        $qtyProduct = $this->model->checkQuantity($id);
        if ($qtyProduct >= $qty) {
            $info = $this->model->getInfoProduct($id);
            $info['quantity'] = Request::post('qty');

            $cart->setItem($id, $info);
            $cart->saveCart();
            if ($cart->hasItem($id)) {
                $total = Util::priceFormat($cart->getTotalPrice());
                $result = array(
                    'success' => 'Bạn đã thêm mới thành công sản phẩm vào giỏ hàng',
                    'total' => "{$cart->getTotalQuantity()} sản phẩm - {$total} vnđ"
                );
            }
        } else {
            $result = array(
                'error' => "Hiện sản phẩm này chỉ còn {$qtyProduct} sản phẩm. Quý khách có thể lựa chọn số lượng sản phẩm cho phù hợp"
            );
        }

        echo json_encode($result);
    }

    function xhrCart() {
        $cart = new ShoppingCart('cart');
        $this->view->layout = 'blank';
        $this->view->totalPrice = $cart->getTotalPrice();
        $this->view->totalQuantity = $cart->getTotalQuantity();
        $this->view->cart = $cart->getItems();
        $this->view->render('checkout/xhrCart');
    }

    function xhrTotal() {
        $cart = new ShoppingCart('cart');
        $total = Util::priceFormat($cart->getTotalPrice());
        $result = array('quantity' => $cart->getTotalQuantity(), 'total' => $total);
        echo json_encode($result);
    }

}
