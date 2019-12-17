<?php

Class IP
{

   protected $ip;
   protected $configs;

   protected $data;

   protected $error = array(
      "status" => false
   );

   public function __construct($configs)
   {
      $this->configs = $configs;
   }

   protected function error($errorMessage)
   {
      $this->error = [
         "status"  => true,
         "message" => $errorMessage
      ];

      return $this;
   }

   protected function check()
   {
      if( isset( $_GET['ip'] ) ) {
         $this->ip = $_GET['ip'];
      } else if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
         $this->ip = $_SERVER['HTTP_CLIENT_IP'];
      } else if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
         $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         $this->ip = $_SERVER['REMOTE_ADDR'];
      }

      if( empty( $this->ip ) )
      {
         return $this->error( "API ip not found." );
      }
      if( !filter_var( $this->ip, FILTER_VALIDATE_IP ) )
      {
         return $this->error( "API ip not valid." );
      }

      return $this;
   }

   public function set()
   {
      return $this->check();
   }

   public function data()
   {
      $data = Curl::get([
         "url" => "{$this->configs['ip']['url']}{$this->ip}/geo",
         "headers" => [
            "Content-type: application/json",
            "token: {$this->configs['ip']['key']}"
         ]
      ]);

      if( empty( $data ) )
      {
         return $this->error( "API data not found." );
      }

      $this->data = [
         "ip"          => $data->ip,
         "city"        => $data->city,
         "region"      => $data->region,
         "country"     => $data->country,
         "coordinates" => $data->loc,
         "postal"      => $data->postal,
         "timezone"    => $data->timezone
      ];

      return $this;
   }

   public function get()
   {
      if( $this->error['status'] == true )
      {
         return $this->error;
      }

      return $this->data;
   }
}
