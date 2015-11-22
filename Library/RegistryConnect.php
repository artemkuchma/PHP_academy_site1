<?php


class RegistryConnect
{
    protected static $connect = array();

    private static function pdo()
    {
        $PDO = new PDO(DSN, USER, PASS);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;

    }

    private static function has($key)
    {
        return isset(self::$connect[$key]);
    }

    private static function setConnect()
    {
        if (self::has('connect')) {
            return null;
        }

        return self::$connect['connect'] = self::pdo();
    }

    public static function getConnect()
    {
        if (self::has('connect')) {
            return self::$connect['connect'];
        }
        self::setConnect();
        return self::$connect['connect'];


    }

    public static function getDate($sql, array $placeholders)
    {
        if (self::has('connect')) {
            $sth = self::$connect['connect']->prepare($sql);
            $sth->execute($placeholders);
            $date = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $date;
        }
        return null;
    }

    public static function getPDO()
    {
        return self::pdo();
    }

}