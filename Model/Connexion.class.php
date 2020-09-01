<?php


class Connexion
{
    protected $_conn;

    public function __construct($db)
    {
        $this->setConn($db);
    }


    public function setConn(PDO $db)
    {
        $this->_conn = $db;
    }
}
