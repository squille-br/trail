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
    $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    $this->ip = $ip;
    $this->port = $port;
    $this->public_key = file_get_contents($public_key_path, false, stream_context_create(array('ssl'=>array('verify_peer'=>false, 'verify_peer_name'=>false))));
  }

  public static function getInstance($ip, $port, $public_key_path)
  {
    if (is_null(self::$instance))
    {
      self::$instance = new TrailSender($ip, $port, $public_key_path);
    }

    return self::$instance;
  }

  public function send(Message $message)
  {
    $encrypted = $this->encrypt($message);

    if (!is_null($encrypted))
    {
      @socket_sendto($this->socket, $encrypted, strlen($encrypted), MSG_DONTROUTE, $this->ip, $this->port);
    }
  }

  private function encrypt(Message $message)
  {
    $data = json_encode($message);

    if (openssl_seal($data, $encrypted, $ekeys, array($this->public_key)))
    {
      return $encrypted;
    }

    return null;
  }
}
