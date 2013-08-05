<?php

class Model extends Connection {

    function __construct() {
        parent::__construct();
    }

    public function execute($sql, $data = null) {
       
        if ($this->type == 'pdo') {
            $stmt = $this->dsn->prepare($sql);
            is_null($data) ? $stmt->execute() : $stmt->execute($data);
            return $stmt;
        } else {
            return $result = mysqli_query($this->dsn, $sql);
        }
    }

    public function formatSelect($fieldNames, $table, $options) {
        $option = "";
        if (is_array($fieldNames)) {
            $fieldName = implode(", ", $fieldNames);
        } else {
            $fieldName = $fieldNames;
        }

        if (isset($options) && is_array($options)) {
            $option .= (isset($options['where']) && $options['where'] != null) ? " WHERE {$options['where']} " : "";
            $option .= (isset($options['group']) && $options['group'] != null) ? " GROUP BY {$options['group']} " : "";
            $option .= (isset($options['having']) && $options['having'] != null) ? " HAVING {$options['having']} " : "";
            $option .= (isset($options['order']) && $options['order'] != null) ? " ORDER BY {$options['order']} " : "";
            $option .= (isset($options['limit']) && $options['limit'] != null) ? " LIMIT {$options['limit']} " : "";
        }
        return "SELECT {$fieldName} FROM {$table} {$option}";
    }

    public function fetchData($sql, $data = null, $mode = 'BOTH', $singleRow = false) {
        $data = array();
        if ($this->type == 'pdo') {
            $stmt = $this->execute($sql, $data);
            switch ($mode) {
                case 'BOTH':
                    $stmt->setFetchMode(PDO::FETCH_BOTH);
                    break;
                case 'NUM':
                    $stmt->setFetchMode(PDO::FETCH_NUM);
                    break;
                case 'ASSOC':
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    break;
            }

            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
        } else {
            $result = $this->execute($sql);
            while ($row = mysqli_fetch_array($result, $mode)) {
                $data[] = $row;
            }
        }

        if ($singleRow && $data != null) {
            return $data[0];
        }
        return $data;
    }

    public function selectSql($sql, $data = null, $mode = 'BOTH', $singleRow = false) {
        return $this->fetchData($sql, $data, $mode, $singleRow);
    }

    public function selectAll($fieldLists, $table, $options, $data = null, $mode = 'BOTH', $singleRow = false) {
        $sql = $this->formatSelect($fieldLists, $table, $options);
        return $this->selectSql($sql, $data, $mode, $singleRow);
    }

    public function selectOneRow($fieldLists, $table, $options, $data = null, $mode = 'BOTH') {
        return $this->selectAll($fieldLists, $table, $options, $data, $mode, true);
    }

    public function selectAllTable($fieldLists, $table, $mode = 'BOTH') {
        return $this->selectAll($fieldLists, $table, null, null, $mode);
    }

    public function selectOneRowTable($fieldLists, $table, $mode = 'BOTH') {
        return $this->selectOneRow($fieldLists, $table, null, null, $mode);
    }

    public function selectCount($fieldCount, $asName, $table, $options, $data = null, $mode = 'NUM') {
        $field = "count({$fieldCount})";
        $field .=!is_null($asName) ? " AS {$asName} " : "";
        $data = $this->selectOneRow($field, $table, $options, $data, $mode);
        return $data[0];
    }

    public function selectArray($data) {
        return $data;
    }

    public function selectStatus() {
        $data = array('1' => 'Đã duyệt', '2' => 'Chưa duyệt');
        return $data;
    }

    public function checkExists($fieldLists, $table, $options, $data = null) {
        $tmp = false;
        $sql = $this->formatSelect($fieldLists, $table, $options);
        if ($this->type == 'pdo') {
            $stmt = $this->execute($sql, $data);
            if ($stmt->rowCount() > 0) {
                $tmp = true;
            }
        } else {
            $result = mysqli_query($this->dsn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $tmp = true;
            }
        }

        return $tmp;
    }

    public function formatInsert($data, $tableName) {
        $filedArr = array_keys($data);
        $fieldNames = '(' . implode(', ', $filedArr) . ')';
        if ($this->type == 'pdo') {
            $fieldValues = '(:' . implode(', :', $filedArr) . ')';
        } else {
            $fieldValues = "('" . implode("', '", $data) . "')";
        }

        return "INSERT INTO {$tableName} {$fieldNames} VALUES {$fieldValues}";
    }

    public function insert($data, $table) {
        $tmp = false;
        $sql = $this->formatInsert($data, $table);
        if ($this->type == 'pdo') {
            $stmt = $this->execute($sql, $data);
            if ($stmt->rowCount() > 0) {
                $tmp = true;
            }
        } else {
            mysqli_query($this->dsn, $sql);
            if (mysqli_affected_rows($this->dsn) > 0) {
                $tmp = true;
            }
        }
        return $tmp;
    }

    public function getLastInsertID() {
        if ($this->type == 'pdo') {
            return $this->dsn->lastInsertId();
        } else {
            return mysqli_insert_id($this->dsn);
        }
    }

    public function formatUpdate($data, $tableName, $criteria) {
        $fields = "";
        $index = 0;
        $fieldName = array_keys($data);
        if ($this->type == 'pdo') {
            foreach ($fieldName as $field) {
                ($index != 0) ? $fields .= ', ' : '';
                $fields .= "{$field} = :{$field}";
                $index++;
            }
        } else {
            foreach ($data as $k => $v) {
                ($index != 0) ? $fields .= ', ' : '';
                $fields .= "{$k} = '{$v}'";
                $index++;
            }
        }

        $where = !is_null($criteria) ? " WHERE {$criteria} " : "";
        return "UPDATE {$tableName} SET {$fields} {$where}";
    }

    public function update($data, $tableName, $criteria) {
        $tmp = false;
        $sql = $this->formatUpdate($data, $tableName, $criteria);
        if ($this->type == 'pdo') {
            $stmt = $this->execute($sql, $data);
            if ($stmt->rowCount() > 0) {
                $tmp = true;
            }
        } else {
            mysqli_query($this->dsn, $sql);
            if (mysqli_affected_rows($this->dsn) > 0) {
                $tmp = true;
            }
        }

        return $tmp;
    }

    public function delete($tableName, $criteria) {
        $tmp = false;
        $where = (!is_null($criteria)) ? " WHERE {$criteria}" : "";
        $sql = "DELETE FROM {$tableName} {$where}";
        if ($this->type == 'pdo') {
            $stmt = $this->execute($sql);
            if ($stmt->rowCount() > 0) {
                $tmp = true;
            }
        } else {
            mysqli_query($this->dsn, $sql);
            if (mysqli_affected_rows($this->dsn) > 0) {
                $tmp = true;
            }
        }
        return $tmp;
    }

}

?>
