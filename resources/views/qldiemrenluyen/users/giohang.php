<ul class="breadcrumb">
        <div class="container">
            <li><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
            <li>Giỏ hàng</li>
        </div>  
    </ul>
    <?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:#C84608; font-weight:bold;display:flex;justify-content:center;margin-top:50px">'.$value.'</span>';
        }
    }
?>
<!--cart-->

<div class="container cart-page">
    <table>
    <?php 
        if(isset($_SESSION['shopping_cart'])){
            $total = 0;
            foreach($_SESSION['shopping_cart'] as $key => $value){
                $sub_total = $value['product_quantity'] * $value['product_price'];
                $total += $sub_total;
    ?>
<form action="<?php echo BASE_URL ?>giohang/updategiohang" method="POST">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng </th>
            <th>Giá</th>
            <th>Tạm tính</th>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['product_image'] ?>" alt="<?php echo $value['product_title'] ?>">
                <div class="cart-info-box">
                    <p><?php echo $value['product_title'] ?></p>
                    <br>
                    <input type="hidden" value="<?php echo $value['product_id']  ?>" name="delete_id">
                    <input type="submit" value="Xóa" name="delete_cart" style="width:50px; border:none;cursor:pointer;background-color:#C84608;color:#fff;border-radius:2px">
                    <input type="submit" value="Cập nhật" name="update_cart" style="width:80px; border:none;cursor:pointer;background-color:green;color:#fff;border-radius:2px">
                </div>
            </div>
        </td>
            <td><input type="number" min="1" name="qty[<?php echo $value['product_id']  ?>]" value="<?php echo $value['product_quantity'] ?>" style="width:50px"></td>
            <td><?php echo number_format($value['product_price'],0,',','.').' '.'đ' ?></td>
            <td><?php echo number_format($sub_total,0,',','.').' '.'đ' ?></td>
        </tr> 
        </form>
<?php 
}
?>
    </table>
<!--sub-total-->
<div class="total-box">
    <table>
        <tr>
            <td>Tạm tính</td>
            <td><?php echo number_format($total,0,',','.').' '.'đ' ?></td>
        </tr>
        <tr>
            <td>Thành tiền</td>
            <td><?php echo number_format($total,0,',','.').' '.'đ' ?></td>
        </tr>
    </table>
</div>
<div class="total-box-button">
<?php if(!Session::get('customer')){ ?>
    <a href="<?php echo BASE_URL ?>thanhtoan" style="width:350px"><button id="cart-proceed " type="button">THANH TOÁN</button></a>
<?php }else{?>
<a href="<?php echo BASE_URL ?>thanhtoan/thanhvien?id=<?php echo Session::get('customers_id') ?> " style="width:350px"><button id="cart-proceed " type="button">THANH TOÁN</button></a>
<?php }?>
</div>
<?php }else{?>
    <table>
    <div  style="text-align:center">
    <h1 style="margin-bottom:30px">Không có sản phẩm nào trong giỏ hàng!</h1>
    <style>
        .link:hover{
            color:#C84608;
        }
    </style>
    <a href="<?php echo BASE_URL ?>" class="link"><i class="fas fa-long-arrow-alt-left"></i>Tiếp tục mua hàng</a>
    </div>
    </table>
<?php }?>

</div>