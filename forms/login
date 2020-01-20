<?php
session_start();

class login{
    protected $conn;
    public function __construct()
    {

        if($_SERVER['REQUEST_METHOD']!='POST'){
            $this->redirect('../login.php','error','Invalid request method');
        }
        $this->conn = new mysqli('127.0.0.1', 'root', '','homestead');
        if ($this->conn->connect_error) {
            $this->redirect('../login.php','error','Connection failed: ' . $this->conn->connect_error);
        }

        $username =strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? && password=?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $record = $stmt->get_result()->num_rows;

        //if credentials not found, redirect to login page
        if(!$record){
            $this->redirect('../login.php','error','Wrong credentials');
        }

        //Redirect to members page
        $_SESSION['user'] = [
            'id' => $_POST['id'],
            'username' => $_POST['username']
        ];
        $this->redirect('../members/index.php','message','Successfully logged on');
    }

    protected function redirect($url='../login.php', $type='message', $msg){
        header("Location: $url?$type=$msg");
        log(__METHOD__.':'.__LINE__.' message: '.$msg);
        die();
    }

}

$login = new login();
