<?php include'db.php'; ?>


<?php 

if($_POST)
{
    $sil=$_POST["silinecek"];
   $parcala=implode(',',$sil);


    $silamk=$db->prepare("DELETE FROM veriler WHERE id IN($parcala)");
    $silamk->execute();
    if($silamk)
    {
        echo "ok";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<form action="" method="post">
<?php 
$cekveri=$db->prepare("SELECT *FROM veriler");
$cekveri->execute();
$verisay=$cekveri->rowCount();
$cekk=$cekveri->fetchAll(PDO::FETCH_ASSOC);
if($verisay>0)
{
    foreach($cekk as $items)
    {?>
    <input type="checkbox" value="<?=$items["id"];?>" name="silinecek[]"><?php echo $items["isim"];?><br>

<?php }} ?>

<button> Sil</button>
</form>
</body>
</html>
