<?php
class Database
{
    private $host = "127.0.0.1";
    private $db_name = "shopflower";
    private $username = "root";
    private $password = "max2275659";
    public $conn;
    public $result;
    public $info;
    public $insertId;
    public $num_rows;
    public $sql;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new mysqli ($this->host, $this->username, $this->password, $this->db_name);
        } catch (Exception $exception) {
            echo "Error connection: " . $exception->getMessage();
        }

        return $this->conn;
    }
    public function runQuery($sql)
    {
        try {
            $this->result = $this->conn->query($sql); //в резалт записивается результат sql запроса
            $this->num_rows = $this->result->num_rows;  //свойство обьекта - количество строк (3 айди - 3 строки)
        } catch (Exception $exception) {
            echo "Error connection: " . $exception->getMessage(); //виводит причину ошибки
        }


    }
    public function getRow($sql='') //возвращает строку из результата запроса в виде ассоциативного массива
    {
        if(!$this->result or ($sql and $this->sql != $sql))
        {
            $this->sql = $sql;
            $this->runQuery($sql);
        }
        return $this->result->fetch_assoc();//Вибирает следующую строку из набора результатова(1 строку) и помещает ее в асоциативний массив
    }

    public function getArray($sql='') //возвращает неассоциативного массива ассоциативних массивов и задаем ему значение
    {
        if(!$this->result or ($sql and $this->sql != $sql)) //если нет резалта (кезультат из РанКвери), резалта изначально нет - не виполняли запроси или sql из системи не равно sql которий заданий
        {
            $this->sql = $sql;  //делаем новий запрос (перезаписиваем) sql в системе
            $this->runQuery($sql); //отсилаемся к runQuery с запросом
        }
        if($this->num_rows > 0) //если строки есть
        {
            return $this->result->fetch_all(MYSQLI_ASSOC); //метод встроенного класса fetch_all вивести все строки
        }
        else
        {
            return [];
        }
    }
}
?>