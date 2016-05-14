<?php
try
{
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