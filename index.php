<?php
try
{
    session_start();
    //$_SESSION['sessionid'] = 1;
    require_once __DIR__ . '/pKit/setup.php';

}
catch(\pKit\System\Exceptions\pKitException $e)
{
    echo $e->getMessage();
}
catch(Exception $e)
{
    echo $e->getMessage();
}