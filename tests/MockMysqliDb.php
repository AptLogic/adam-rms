<?php

class MockMysqliDb
{
    public $calls = [];
    public $returnValues = [];
    public $lastError = '';

    public function __call($name, $arguments)
    {
        $this->calls[] = ['method' => $name, 'args' => $arguments];

        if (isset($this->returnValues[$name])) {
            $return = $this->returnValues[$name];
            if (is_callable($return)) {
                return call_user_func_array($return, $arguments);
            }
            return $return;
        }

        return $this; // Return self for chaining by default
    }


    public function getone($tableName, $columns = '*')
    {
        $this->calls[] = ['method' => 'getone', 'args' => func_get_args()];
        if (isset($this->returnValues['getone'])) {
            return $this->returnValues['getone'];
        }
        return null;
    }

    public function get($tableName, $numRows = null, $columns = '*')
    {
        $this->calls[] = ['method' => 'get', 'args' => func_get_args()];
        if (isset($this->returnValues['get'])) {
            return $this->returnValues['get'];
        }
        return [];
    }

    public function getValue($tableName, $column, $limit = 1)
    {
        $this->calls[] = ['method' => 'getValue', 'args' => func_get_args()];
        if (isset($this->returnValues['getValue'])) {
            return $this->returnValues['getValue'];
        }
        return null;
    }

    public function insert($tableName, $insertData)
    {
        $this->calls[] = ['method' => 'insert', 'args' => func_get_args()];
        if (isset($this->returnValues['insert'])) {
            return $this->returnValues['insert'];
        }
        return true;
    }

    public function update($tableName, $tableData, $numRows = null)
    {
        $this->calls[] = ['method' => 'update', 'args' => func_get_args()];
        if (isset($this->returnValues['update'])) {
            return $this->returnValues['update'];
        }
        return true;
    }

    public function inc($value)
    {
        // Mimic the real mysqli-database-class behavior:
        // inc() returns a special array that the query builder interprets
        // as an "increment by $value" operation when used in update/insert data.
        $this->calls[] = ['method' => 'inc', 'args' => func_get_args()];
        return ['[I]' => $value];
    }

    /**
     * Simplified escape helper used only in tests.
     *
     * NOTE: This implementation is NOT safe for production use. The real MysqliDb
     * implementation must use prepared statements or mysqli_real_escape_string()
     * for proper SQL escaping and to avoid multibyte character vulnerabilities.
     */
    public function escape($string)
    {
        // Intentionally uses addslashes() as a lightweight stand‑in for tests only.
        return addslashes($string);
    }

    public function getLastError() {
        return $this->lastError;
    }

    // Helper to set return values for tests
    public function setReturnValue($method, $value)
    {
        $this->returnValues[$method] = $value;
    }

    public function reset() {
        $this->calls = [];
        $this->returnValues = [];
        $this->lastError = '';
    }
}
