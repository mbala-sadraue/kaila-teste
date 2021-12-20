<?php
abstract class Connected
{


  protected $host = "localhost";
  protected $user = "root";
  protected $pass = "";
  protected $bd = "kaila_systems_solution";
  protected $con;

  public function __construct()

  {

    $dns = "mysql:host=" . $this->host . ";dbname=" . $this->bd;

    $this->con = new PDO($dns, $this->user, $this->pass);
  }
}





?>