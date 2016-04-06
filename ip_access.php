<?php
function accessIP($client_ip)
{
  //
  $access_outside_ip = array('114.34.111.12','114.36.12.13');
  if(isSubnet($client_ip)){
    //內網 ip
    return true;
  }
  else if (in_array($client_ip, $access_ip)){
    //驗證外部ip
    return TRUE;
  }
  else {
    return FALSE;
  }
}

//子網路驗證
private function isSubnet($ip = NULL)
{
  $remoteAddr = (!isset($_SERVER['HTTP_X_FORWARDED_FOR']) && isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : NULL);
  $ip = strToLower(is_null($ip) ? $remoteAddr : $ip);

  $part = explode('.', $ip);
  // 10.0.0.0/8   Private network
  // 127.0.0.0/8  Loopback
  // 169.254.0.0/16 & ::1  Link-Local
  // 172.16.0.0/12  Private network
  // 192.168.0.0/16  Private network
  if (count($part) === 4 && ($part[0] === '10' || $part[0] === '127' || ($part[0] === '172' && $part[1] < 16 && $part[1] > 31)
  || ($part[0] === '169' && $part[1] === '254') || ($part[0] === '192' && $part[1] === '168'))
  ) {

    return TRUE;

  }

  return FALSE;
}

?>
