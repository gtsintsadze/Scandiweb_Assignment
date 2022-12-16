<?php



class Database
{
    private PDO $PDO;

    public function __construct()
    {
        $databaseCredentials = dbCredentials();
        $database = $databaseCredentials["database"];
        $servername = $databaseCredentials["servername"];
        $username = $databaseCredentials["username"];
        $password = $databaseCredentials["password"];

        $dsn = "mysql:dbname=$database;host=$servername:3306";

        $this->PDO = new PDO($dsn, $username, $password);
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        return $this->PDO;
    }

    /**
     * @param $sql
     * @return PDOStatement
     */
    public function prepare($sql): PDOStatement
    {
        $pdo = $this->getPDO();
        return $pdo->prepare($sql);
    }

    /**
     * @param $tableName
     * @return array
     */
    public function getTableColumns($tableName): array
    {
        $query = $this->prepare("DESCRIBE $tableName");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * @param AbstractProduct $product
     * @param $tableName
     * @return array
     */
    public function getProperties(AbstractProduct $product, $tableName): array
    {
        $properties = [];
        $tableColumns = $this->getTableColumns($tableName);
        foreach ($product->getData() as $key => $value) {
            if (in_array($key, $tableColumns)) {
                $properties[':' . $key] = $value;
            }
        }
        return $properties;
    }
}