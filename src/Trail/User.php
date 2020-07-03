<?php
namespace Trail;

use JsonSerializable;

class User implements JsonSerializable
{
  private $userName;
  private $password;

  public function getUserName()
  {
    return $this->userName;
  }

  public function setUserName($userName)
  {
    $this->userName = $userName;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  #Override
  public function jsonSerialize()
  {
    return array(
        'Id' => null,
        'UserName' => $this->getUserName(),
        'Password' => $this->getPassword()
        );
  }
}
