<?php
namespace Squille\Trail;

class TrailSender
{
  private static $instance;

  private $socket;
  private $ip;
  private $port;
  private $public_key;

  private function __construct($ip, $port, $public_key_path)
  {
    @$this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    $this->ip = $ip;
    $this->port = $port;
    $this->public_key = file_get_contents($public_key_path);
  }

  public static function getInstance($ip, $port, $public_key_path)
  {
    if (is_null(self::$instance))
    {
      self::$instance = new Sender($ip, $port, $public_key_path);
    }

    return $self::$instance;
  }

  public function send(Message $message)
  {
    $encrypted = $this->encrypt($message);

    if (!is_null($encrypted))
    {
      @socket_sendto($this->socket, $encrypted, strlen($encrypted), 0x100, $this->ip, $this->port);
    }
  }

  private function encrypt(Message $message)
  {
    $data = json_encode($message);

    if (openssl_public_encrypt($data, $encrypted, $this->public_key, OPENSSL_NO_PADDING))
    {
      return $encrypted;
    }

    return null;
  }
}
