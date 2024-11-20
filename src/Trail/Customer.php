<?php
namespace Squille\Trail;

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
  public function jsonSerialize(): array
  {
    return array(
        'Name' => $this->getName()
        );
  }
}
