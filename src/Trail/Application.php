<?php
namespace Trail;

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

  #Override
  public function jsonSerialize()
  {
    return array(
        'Id' => null,
        'Name' => $this->getName(),
        'Version' => $this->getVersion()
        );
  }
}
