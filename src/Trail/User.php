<?php
namespace Squille\Trail;

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

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize()
  {
    return array(
        'UserName' => $this->getUserName(),
        'Password' => $this->getPassword()
        );
  }
}
