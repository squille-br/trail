<?php
namespace Squille\Trail;

use JsonSerializable;

class Message implements JsonSerializable
{
  private $user;
  private $log;

  public function getUser()
  {
    return $this->user;
  }

  public function setUser(User $user)
  {
    $this->user = $user;
  }

  public function getLog()
  {
    return $this->log;
  }

  public function setLog(Log $log)
  {
    $this->log = $log;
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize()
  {
    return array(
        'User' => $this->getUser(),
        'Log' => $this->getLog()
        );
  }
}
