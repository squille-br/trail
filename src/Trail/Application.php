<?php
namespace Squille\Trail;

use JsonSerializable;

class Application implements JsonSerializable
{
  private $name;
  private $version;

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getVersion()
  {
    return $this->version;
  }

  public function setVersion($version)
  {
    $this->version = $version;
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize()
  {
    return array(
        'Name' => $this->getName(),
        'Version' => $this->getVersion()
        );
  }
}
