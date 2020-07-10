<?php
namespace Trail;

use JsonSerializable;

class Log implements JsonSerializable
{
  private $dateTime;
  private $application;
  private $customer;
  private $severity;
  private $message;

  public function getDateTime()
  {
    return $this->dateTime;
  }

  public function setDateTime($dateTime)
  {
    $this->dateTime = $dateTime;
  }

  public function getApplication()
  {
    return $this->application;
  }

  public function setApplication(Application $application)
  {
    $this->application = $application;
  }

  public function getCustomer()
  {
    return $this->customer;
  }

  public function setCustomer(Customer $customer)
  {
    $this->customer = $customer;
  }

  public function getSeverity()
  {
    return $this->severity;
  }

  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function setMessage($message)
  {
    $this->message = $message;
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize()
  {
    return array(
        'Id' => null,
        'DateTime' => $this->getDateTime(),
        'Application' => $this->getApplication(),
        'Customer' => $this->getCustomer(),
        'Severity' => $this->getSeverity(),
        'Message' => $this->getMessage()
        );
  }
}
