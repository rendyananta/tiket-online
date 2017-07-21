<?php
include_once 'helper.php';

class Application {
  public $pdo;
  public function __construct ($config) {
    try {
      $this->pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      // return false;
      echo $e->getMessage();
    }
  }

  protected function setMiddleware($middleware, $callback) {
    include_once './root/middleware/' . $middleware . '.php';
    filter($callback); exit();
  }

  public function route ($options, $callback) {
    $route = rtrim(str_replace('/index.php', '', $_SERVER['PHP_SELF']), '/');
    if ($route === '') $route .= '/';
    if ($route === $options['url']) {
      if ($_SERVER['REQUEST_METHOD'] == strtoupper($options['method'])) {
        isset($options['middleware']) ? $this->setMiddleware($options['middleware'], $callback) : $callback();
      } else {
        echo "<h1>Method Not Allowed</h1>";
      }
      exit();
    }
  }

  public function query ($query, $params = []) {
    try {
      $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
      $query = $this->pdo->prepare($query);
      return ($query->execute($params)) ?  $query : false;
    } catch (PDOException $e) {
      //return false;
      die ("Error on Query : " . $e->getMessage());
    }
  }

  public function lastInsertedId () {
    return $this->pdo->lastInsertId();
  }

  public function registerUser ($datas) {
    return $this->query("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, ?)", [$datas['name'], $datas['username'], password_hash($datas['password'], PASSWORD_BCRYPT), $datas['role']]);
  }

  public function setSessionForUser ($userdata) {
    $_SESSION['user']['username'] = $userdata['username'];
    $_SESSION['user']['role'] = $userdata['role'];
  }

  public function authenticate ($credentials, $role = 'user') {
    $password = $this->query("SELECT password FROM users WHERE username = ?", [$credentials['username']])->fetch(PDO::FETCH_ASSOC)['password'];
    if (password_verify($credentials['password'], $password)){
      $user = $this->query('SELECT username, role FROM users WHERE username = ?', [$credentials['username']])->fetch(PDO::FETCH_ASSOC);
      if ($role == $user['role']) {
        $this->setSessionForUser($user);
        return true;
      } else {
        return false;
      }
    }
  }

  public function logout () {
    unset($_SESSION['user']);
  }

}
