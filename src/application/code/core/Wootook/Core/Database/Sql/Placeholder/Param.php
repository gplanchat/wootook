<?php

class Wootook_Core_Database_Sql_Placeholder_Param
    extends Wootook_Core_Database_Sql_Placeholder_Placeholder
{
    protected $_paramName = null;
    protected $_value = null;

    public function __construct($paramName, $value)
    {
        $this->_paramName = $paramName;
        $this->_value = $value;
    }

    public function __toString()
    {
        return ':' . $this->_paramName;
    }

    public function beforeExcute(Wootook_Core_Database_Statement_Statement $statement)
    {
        parent::beforeExcute($statement);

        $statement->bindValue($this->_paramName, $this->_value);

        return $this;
    }
}
