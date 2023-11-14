<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

  function pr($value) { 
      echo "<pre>",print_r($value, true),"</pre>";
  }