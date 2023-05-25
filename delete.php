<?php session_start(); 
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Database.php"); //берем путь от корня папки
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Item.php"); //берем путь от корня папки
if ($_GET['id'] && $_SESSION['user']['admin']==1)
{
    $product = new Product(addslashes($_GET['id'])); //создание объекта продукта с помощью id, убирая лишние символи
    $product->deleteData(); // Вызов метода deleteData() для удаления данных о товаре
}
?>
<script>
    window.location.reload();
    window.close();

</script>
