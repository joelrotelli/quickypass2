<?php
try
{
  $payload = json_decode($_REQUEST['payload']);
}
catch(Exception $e)
{
  exit(0);
}

//log the request
//file_put_contents('logs/github.txt', print_r($payload, TRUE), FILE_APPEND);



if ($payload->ref === 'refs/heads/develop')
{
  //exec('./deploy.sh');
  exec('cd cd /home/drupalskr/public_html/quickypass && git pull origin develop');
}
