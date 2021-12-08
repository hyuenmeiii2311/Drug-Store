<?php
class User
{
    private $error;

    public function signUp($POST)
    {
        //Password hashing
        $POST['password'] = hash('sha1', $POST['password']);

        $data = array();

        $data['name'] = trim($POST['fullname']);
        $data['gender'] = trim($POST['gender']);
        $data['datebirth'] = trim($POST['datebirth']);
        $data['phone'] = trim($POST['phone']);
        $data['address'] = trim($POST['address']);
        $data['password'] = trim($POST['password']);
        $data['email'] = trim($POST['email']);
        $data['role'] = "customer";

        $db = new Database();

        //check if email already exists 
        $select = "select * from user where email = :email limit 1";
        $arr['email'] = $data['email'];
        $check = $db->read($select, $arr);
        if (is_array($check)) {
            $this->error .= "Email đã được sử dụng, hãy dùng email khác";
        }

        //save database
        if ($this->error == "") {

            $query = "insert INTO user (name,phone,email,password,gender,address,datebirth,role) VALUES (:name,:phone,:email,:password,:gender,:address,:datebirth,:role); ";
            $result = $db->write($query, $data);

            if ($result) {
                header("Location:" . ROOT . "login");
                die;
            }
        }

        $_SESSION['error'] = $this->error;
    }

    public function login($POST)
    {
        //Password hashing
        $POST['password'] = hash('sha1', $POST['password']);

        $data = array();

        $data['password'] = trim($POST['password']);
        $data['email'] = trim($POST['email']);

        $db = new Database();

        //save database
        if ($this->error == "") {
            //show($POST);

            $query = "select * from user where email = :email and password = :password limit 1";
            $result = $db->read($query, $data);

            if (is_array($result)) {
                $_SESSION['user'] = $result[0];

                //redirect home page
                header("Location:" . ROOT . "index");
                die;
            }

            $this->error .= "Wrong email or password.";
        }
        $_SESSION['error'] = $this->error;
    }

    public function logout()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != "") {

            unset($_SESSION['user']);
            //redirect home page
            header("Location:" . ROOT . "index");
            die;
        }
    }

    public function add_user($POST)
    {
        // show($POST);
        $data = array();

        $data['name'] = trim($POST['c_fname']) . " " . trim($POST['c_lname']);
        $data['email'] = trim($POST['c_email']);
        $data['created_date'] = date("Y-m-d h:i:s");
        $data['subject'] = trim($POST['c_subject']);
        $data['message'] = trim($POST['c_message']);
        $data['status'] = 0;
        // show($data);

        $db = new Database();

        if (isset($_SESSION['user'])) {
            $data['user_id'] = $_SESSION['user']->id;
            $query = "INSERT INTO `user`(`user_id`, `name`, `email`, `created_date`, `subject`, `message`, `status`) 
            VALUES ('" . $data['user_id'] . "','" . $data['name'] . "','" . $data['email'] . "','" . $data['created_date'] . "','" . $data['subject'] . "','" . $data['message'] . "','" . $data['status'] . "')";
        } else {
            $query = "INSERT INTO `user`( `name`, `email`, `created_date`, `subject`, `message`, `status`) 
            VALUES ('" . $data['name'] . "','" . $data['email'] . "','" . $data['created_date'] . "','" . $data['subject'] . "','" . $data['message'] . "','" . $data['status'] . "')";
        }

        $result = $db->write($query);
        if ($result) {
            header("Location:" . ROOT . "user?success=true");
            die;
        }
    }

    function get_All()
    {
        $db = new Database();
        return $db->read("SELECT `id`, `name`, `phone`, `email`, `gender`, `address`, `datebirth`, `role` FROM `user` ");
    }
    function get_Data($limit = 0, $offset = 0)
    {
        $db = new Database();

        $limit = (int)$limit;
        $offset = (int)$offset;

        return $db->read("SELECT `id`, `name`, `phone`, `email`, `gender`, `address`, `datebirth`, `role` FROM `user` WHERE role = 'customer' LIMIT " . $limit . " OFFSET " . $offset);
    }

    public function login_Admin($POST)
    {
        //Password hashing
        $POST['password'] = hash('sha1', $POST['password']);

        $data = array();

        $data['password'] = trim($POST['password']);
        $data['phone'] = trim($POST['phone']);

        $db = new Database();

        //save database
        if ($this->error == "") {

            $query = "select * from user where phone = :phone and password = :password AND role = 'admin' limit 1";
            $result = $db->read($query, $data);

            if (is_array($result)) {
                $_SESSION['admin'] = $result[0];

                //redirect admin page
                header("Location:" . ROOT . "admin/home");
                die;
            }
            $this->error .= "Wrong phone or password.";
        }
        $_SESSION['error'] = $this->error;
    }
    public function logout_Admin()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {

            unset($_SESSION['admin']);
            //redirect home page
            header("Location:" . ROOT . "admin");
            die;
        }
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM user WHERE role = 'customer';");
        return $result[0]->total;
    }
    function get_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT * FROM user WHERE id = $id AND role = 'customer'");
        return $result[0];
    }
    function update($POST){
        $data = array();

        $data['user_id'] = trim($POST['user_id']);
        $data['name'] = trim($POST['name']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $data['old_password'] = trim($POST['old_password']);
        $data['gender'] = trim($POST['gender']);
        $data['datebirth'] = trim($POST['datebirth']);
        $data['phone'] = trim($POST['phone']);
        $data['address'] = trim($POST['address']);
        if($data['old_password'] != $data['password']){
            $data['new_password'] = hash('sha1', $POST['password']);
            $query = "UPDATE `user` SET `name`='".$data['name']."',`phone`='".$data['phone']."',`email`='".$data['email']."',`password`='".$data['new_password']."',`gender`='".$data['gender']."',`address`='".$data['address']."',`datebirth`='".$data['datebirth']."' WHERE `id`='".$data['user_id']."'";
        }
        else{
            $query = "UPDATE `user` SET `name`='".$data['name']."',`phone`='".$data['phone']."',`email`='".$data['email']."',`password`='".$data['password']."',`gender`='".$data['gender']."',`address`='".$data['address']."',`datebirth`='".$data['datebirth']."' WHERE `id`='".$data['user_id']."'";
        }

        $db = new Database();
        return  $db->write($query);
    }
    function delete($id){
        $id = (int) $id;
        $db = new Database();
        
        $order_id = $db->read("SELECT `id` FROM `order` WHERE `customer_id` = $id;");
        $result = $order_id[0]->id;
        $orderdetail_id = $db->read("SELECT `id` FROM `order_detail` WHERE `order_id` = $result;");
        
        $detail_ids = array();
        $detail_ids = array_column($orderdetail_id,'id');
        $ids_str = "'" .implode("','",$detail_ids) . "'";

        $db->write("DELETE FROM `order_detail` WHERE `id` IN ($ids_str)");
        $db->write("DELETE FROM `order` WHERE `id` IN ($result)");
        $db->write("DELETE FROM `contact` WHERE user_id = $id");

        return  $db->write("DELETE FROM `user` WHERE `id`= $id;");
    }
}
