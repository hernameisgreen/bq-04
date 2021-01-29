<?php
if(isset($_GET['goods'])){
    $_SESSION['cart'][$_GET['goods']]=$_GET['qt'];
}
if(empty($_SESSION['mem'])){
    to("../index.php?do=login");
    exit();
    /* echo $_SESSION['mem']."的購物車";
    print_r($_SESSION['cart']); */
}
?>

<h2 class="ct">
<?=$_SESSION['mem']?>的購物車
</h2>
<?php
if(empty($_SESSION['cart'])){
    echo "購物車是空的，請前往商品選購商品";
    exit();
}

?>
<table class="cart">        
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id =>$qt){
        $g=$Goods->find($id);
    
    ?>
    <tr class="tt ct">
        <td><?=$g['num']?></td>
        <td><?=$g['name']?></td>
        <td><?=$qt?></td>
        <td><?=$g['quota']?></td>
        <td><?=$g['price']?></td>
        <td><?=$qt=$g['price']?></td>
        <td><img src="icon/0415.jpg" alt=""></td>
    </tr>
   <?php
   }
   ?>
   <div class="ct">
       <a href="index.php"><img src="icon/0411.jpg"></a><a href="?do=checkout"><img src="img/0412.jpg" alt=""></a>
   </div>
</table>