 <?php
include ("dbConn.php");

$action=$_POST["action"];

switch ($action)
{
    case "konum_il":
        $db=new dbConn();
        return $db->getIlList();
        break;

    case "konum_ilce":
        $db=new dbConn();
        $konum_il=$_POST["name"];
        return $db->getIlceList($konum_il);
        break;

    case "konum_mahalle":
        $db=new dbConn();
        $konum_il=$_POST["name"];
        $konum_ilce=$_POST["name"];
        return $db->getMahalleList($konum_ilce, $konum_il);
        break;

    case "konum_postakodu":
        $db=new dbConn();
        $konum_mahalle=$_POST["name"];
        return $db->getPKList($konum_mahalle);
        break;
}