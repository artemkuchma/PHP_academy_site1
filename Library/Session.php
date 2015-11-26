<?php


class Session {

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }
     public static function set($key, $val)
     {
         return $_SESSION[$key] = $val;
     }
    public static function get($key)
    {
        if(self::has($key)){
            return $_SESSION[$key];
        }
        return null;
    }
    public static function remove($key)
    {
        if(self::has($key)){
            unset($_SESSION[$key]);
        }
    }
    public static function start()
    {
        session_start();
    }
    public static function destroy()
    {
        session_destroy();
    }

}