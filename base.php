<?php

date_default_timezone_set('Asia/Taipei');

session_start();

$Bottom=new DB('bottom');
$Mem=new DB('mem');
$Admin=new DB('admin');
$Type=new DB('type');
$Goods=new DB('goods');

class DB
{
    private $dsn = "mysql:host=localhost; dbname=db0304; charset=utf8;";
    private $pdo = "";
    private $table = "";

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    public function find($id)
    {
        $sql = "select * from $this->table where ";
        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql .= implode(' && ', $tmp);
        } else {
            $sql .= " id='$id' ";
        }
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);


        return $row;
    }
    public function save($arr)
    {
        if (isset($arr['id'])) {
            foreach ($arr as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = "update $this->table set " . implode(",", $tmp) . " where `id`='{$arr['id']}'";
        } else {
            //insert
            $sql = "insert into $this->table (`" . implode("`,`", array_keys($arr)) . "`) values('" . implode("','", $arr) . "')";
        }
        echo $sql;
        return $this->pdo->exec($sql);
    }

    public function del($arg)
    {


        $sql = "delete from $this->table ";

        if (is_array($arg)) {


            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }


            $sql = $sql . " where " . implode(" && ", $tmp);
        } else {


            $sql = $sql . " where `id`='$arg'";
        }

        return $this->pdo->exec($sql);
    }
    public function all(...$arg)
    {


        $sql = "select * from $this->table ";

        if (!empty($arg[0])) {
            if(is_array($arg[0])) {
            foreach ($arg[0] as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }$sql = $sql . " where " . implode(" && ", $tmp);
        }else{
            $sql = $sql . $arg[0];
        }
    }
        if (!empty($arg[1])) {
            $sql = $sql . $arg[1];
        }
        

        return $this->pdo->query($sql)->fetchAll();
    }

    public function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";
        if (isset(($arg)[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = sprintf("`%s`='%s'", $key, $value);
                }
                $sql .= " where " . implode(' && ', $tmp);
            } else {
                $sql .= $arg[0];
            }
            if (isset($arg[1])) {
                $sql .= $arg[1];
            }
            
            $row = $this->pdo->query($sql)->fetchColumn();
            return $row;
        }
    }
    function q($sql)
    {
        
        return $this->pdo->query($sql)->fetchAll();
    }
}

function to($url)
{
    header("location:" . $url);
}
