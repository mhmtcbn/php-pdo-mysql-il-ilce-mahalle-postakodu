<?php

class dbConn
{
    protected static $db;


    //veritabanına bağlanan fonksiyon
    public function __construct()
    {
        try{
            self::$db = new PDO("mysql:host=localhost;dbname=firmalistele;charset=utf8", "ajilpuqf", "drtipy98");
        }
        catch (PDOException $exception)
        {
            print $exception->getMessage();
        }
    }

    //İlleri getiren fonksiyon
    public function getIlList()
    {
        $data=array();
        $query = self::$db->query("SELECT DISTINCT konum_il from konum", PDO::FETCH_ASSOC);
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["konum_il"];
            }
        }
        echo json_encode($data);
    }


    //İlçeleri getiren fonksiyon
    public function getIlceList($konum_il){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT konum_ilce FROM konum WHERE konum_il=:konum_il");
        $query->execute(array(":konum_il"=>$konum_il));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["konum_ilce"];
            }
        }
        echo json_encode($data);
    }


    //Mahalleleri getiren fonksiyon
    public function getMahalleList($konum_ilce){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT konum_mahalle FROM konum WHERE konum_ilce=:konum_ilce");
        $query->execute(array(":konum_ilce"=>$konum_ilce));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["konum_mahalle"];
            }
        }
        echo json_encode($data);
    }


    //Posta kodlarını getiren fonksiyon
    public function getPKList($konum_mahalle){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT konum_postakodu FROM konum WHERE konum_mahalle=:konum_mahalle");
        $query->execute(array(":konum_mahalle"=>$konum_mahalle));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["konum_postakodu"];
            }
        }
        echo json_encode($data);
    }
}