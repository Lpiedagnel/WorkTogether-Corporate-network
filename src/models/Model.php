<?php

namespace Models;

require_once('src/Database.php');

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function findOne($value, string $column)
    {

        $result = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$column}= :{$column}");
        $result->execute([$column => $value]);
        $item = $result->fetch();

        return $item;
    }

    public function findAll(?string $order = "", ?string $where = ""): array
    {
        $query = "SELECT * FROM {$this->table}";

        if ($where) {
            $query .= " WHERE " . $where;
        }

        if ($order) {
            $query .= " ORDER BY " . $order;
        }

        $items = $this->pdo->query($query)->fetchAll();
        return $items;
    }

    public function insert(array $data): void
    {
        $dataKeys = array_keys($data);
        $columns = implode(', ', $dataKeys);

        $placeholders = ':' . implode(', :', $dataKeys);

        $query = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($query);
        $statement->execute($data);
    }

    public function update(int $id, array $data): void
    {
        $columns = '';
        foreach ($data as $key => $value) {
            $columns .= $key . ' = :' . $key . ', ';
        }

        $columns = rtrim($columns, ', ');

        $query = "UPDATE {$this->table} SET $columns WHERE id = $id";
        $statement = $this->pdo->prepare($query);
        $statement->execute($data);
    }



    public function delete(int $id): void
    {
        $query = "DELETE FROM {$this->table} WHERE id = $id";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }
}