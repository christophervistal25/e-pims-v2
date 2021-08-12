<?php
namespace App\Services;

use PDO;
use Error;
use Exception;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;


class MSAccess
{
    protected $connection = null;


    public function __construct(string $database_path = 'C:\\laragon\\www\\e-pims\\sample.mdb', string $user = '', string $password = '')
    {
        $this->isDatabaseFileExists($database_path);

        $this->connection = DriverManager::getConnection([
            'user'        => $user,
            'password'    => $password,
            'pdo'         => new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq='. $database_path . ';'),
            'driverClass' => 'Royopa\Doctrine\DBAL\Driver\MSAccess\Driver\Driver',
        ], new Configuration());

    }

    private function isDatabaseFileExists(string $file)
    {
        if(!file_exists($file))  {
            throw new Error("Database not found.");
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function execute(string $query)
    {
        $this->connection->query($query);
    }

    public function deleteRecordsInTables(array $tables = [])
    {
        foreach($tables as $table) {
            $this->connection->query("DELETE * FROM {$table}");
        }
    }

}
