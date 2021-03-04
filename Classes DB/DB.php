<?php
class DB {

    private string $host = 'localhost';
    private string $db = 'hiking';
    private string $user = 'root';
    private string $password = 'dev';

    private  static ?PDO $dbInstance = null;

    /**
     * db/Classes DB = data base
     * DbStatic constructor
     * create object construct (instance)
     */
    public function __construct() {

        try {

            self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            echo $exception->getMessage();
        }

    }

    /**
     *retourne une instance de l'objet PDO
     */
    public static function getInstance(): ?PDO {
        if (null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * on empêche de laisser d'autres développeurs de cloner l'objet
     * pour s'assurer qu'on a bel et bien qu'une seule instance de la connexion db
     */
    public function __clone() {}

}