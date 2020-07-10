<?php
namespace Trail;

use JsonSerializable;

class Customer implements JsonSerializable
{
  private $name;

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize()
  {
    return array(
        'Id' => null,
        'Name' => $this->getName()
        );
  }
}
