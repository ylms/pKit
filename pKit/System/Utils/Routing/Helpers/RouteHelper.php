<?php

namespace pKit\System\Utils\Routing\Helpers
{
    final class RouteHelper
    {
        public static function validateUrl($url)
        {
            $_url = '';
            foreach(explode('/', $url) as $urlPart)
            {
                if(!empty($urlPart))
                {
                    $_url .= '/'.$urlPart;
                }
            }

            return $_url;
        }

        public static function compareURLtoPattern($url, $pattern)
        {
            $splitURL = explode('/', $url);
            $splitPattern = explode('/', $pattern);

            $compareData = ['int' => 0, 'string' => 0, 'equal' => 0];

            $return = ['parameters' => [], 'matches' => false];

            if(count($splitURL) == count($splitPattern))
            {
                for($i = 0; $i < count($splitURL); ++$i)
                {
                    if($splitURL[$i] == $splitPattern[$i])
                    {
                        $compareData['equal']++;
                    }
                    else
                    {
                        if(substr($splitPattern[$i], 0, 1) == '{' && substr($splitPattern[$i], -1) == '}')
                        {
                            $commandInfo = explode(':', substr($splitPattern[$i], 1, strlen($splitPattern[$i])-2));
                            if(count($commandInfo) == 2)
                            {
                                if($commandInfo[0] == 'string')
                                {
                                    $compareData['string']++;
                                    $return['parameters'][] = ['name' => $commandInfo[1], 'value' => $splitURL[$i]];
                                }
                                else if($commandInfo[0] == 'int')
                                {
                                    if(ctype_digit($splitURL[$i]))
                                    {
                                        $compareData['int']++;
                                        $return['parameters'][] = ['name' => $commandInfo[1], 'value' => $splitURL[$i]];
                                    }
                                }
                            }
                        }
                    }

                    if(($compareData['int']+$compareData['string']+$compareData['equal']) == count($splitURL))
                    {
                        $return['matches'] = true;

                        return $return;
                    }
                }
            }

            return $return;
        }

        public static function getUrl($key)
        {
            if(isset($_GET[$key]))
            {
                return self::validateUrl($_GET[$key]);
            }
            else
            {
                return '/';
            }
        }
    }
}