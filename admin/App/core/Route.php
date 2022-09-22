<?php 

class Route
{
    function handleRoute($url){
        global $routes;
        unset($routes['default_controller']);
        $url = trim($url, '/');

        $handleUrl =$url;
        if(!empty($routes)){
            foreach($routes as $key => $route){
                if(preg_match('~'.$key.'~is', $url)){
                    $handleUrl =preg_replace('~'.$key.'~is', $route , $url);
                }
            }
        }
        return $handleUrl;
    }
}
?>