<?php
class AIM_BOT {
  /**
   * Server Response:
   */
  private $api;
  public function __construct() {
    $this->api = 'https://api.telegram.org/bot'.$this->TOKEN;
    return $this->response($this->api.'/sendmessage?chat_id='.$this->CHAT_ID.'&text='.$this->message.''.$this->PARSE);
  }

  /**
   * Delivery Response for Constructor:
   */
  private $init, $result, $url;
  public function response($url) {
    $this->url  = $url;
    $this->init = curl_init();
    curl_setopt($this->init, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($this->init, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($this->init, CURLOPT_URL, $this->url);
    $this->result = curl_exec($this->init);
    curl_close($this->init);
    return $this->result;
  }

  /**
   * Setup Server:
   */
  private $TOKEN, $CHAT_ID, $PARSE;
  public function setup(array ...$setup) {
    $this->TOKEN   = $setup[0]['TOKEN'];
    $this->CHAT_ID = $setup[0]['CHAT_ID'];
    $this->PARSE   = (!empty($setup[0]['PARSE']) ? '&parse_mode='.$setup[0]['PARSE'] : '');
  }

  /**
   * Getting Message:
   */
  private $message;
  public function putMessage(string $message) {
    $this->message = $message;
  }

  /**
   * Send Message:
   */
  public function send() {
    return $this->__construct();
  }

  /**
   * Getting Update BOT Telegram
   */
  private $path, $file;
  public function getUpdate() {
    $this->path = 'https://api.telegram.org/bot'.$this->TOKEN.'/getUpdates';
    $this->file = 'response.json';
    if(is_file($this->file)) {
      if(file_put_contents($this->file, file_get_contents($this->path))) {
        return file_get_contents('response.json');
      }
    }
  }
}
?>