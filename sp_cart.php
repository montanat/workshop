<?php
  require_once 'condb.php';
?>
<?php
if(isset($_POST['pro_id'])){
	$action=$_POST['action'];

	$order_list='';
	//$msg='';
	switch($action){
		case 'ADD':
		if(isset($_SESSION['SP_CART'])){
			$is_avb=0;
			foreach ($_SESSION['SP_CART'] as $key => $value) {
				if($_SESSION['SP_CART'][$key]['pro_id']==$_POST['pro_id']){
				$is_avb++;
				$_SESSION['SP_CART'][$key]['pro_qty']=($_SESSION['SP_CART'][$key]['pro_qty']+$_POST['pro_qty']);
				}
			}//foreach
			if($is_avb<1){
				$pro_item=array(
					'pro_id'   => $_POST['pro_id'],
					'pro_name'   => $_POST['pro_name'],
					'pro_price'   => $_POST['pro_price'],
					'pro_qty'   => $_POST['pro_qty']	
				);
				$_SESSION['SP_CART'][]=$pro_item;
			}//$is_avb

		}else{
				$pro_item=array(
					'pro_id'   => $_POST['pro_id'],
					'pro_name'   => $_POST['pro_name'],
					'pro_price'   => $_POST['pro_price'],
					'pro_qty'   => $_POST['pro_qty']	
				);
				$_SESSION['SP_CART'][]=$pro_item;

		}//isset($_SESSION['SP_CART']
		break;
		case 'REMOVE':
			foreach ($_SESSION['SP_CART'] as $key => $value) {
				if($value['pro_id']==$_POST['pro_id']){
					unset($_SESSION['SP_CART'][$key]);
					$msg='';
				}
			}//foreach
		break;
		case 'ITEM_UPDATE':
			foreach ($_SESSION['SP_CART'] as $key => $value) {
				if($_SESSION['SP_CART'][$key]['pro_id']==$_POST['pro_id']){
					$_SESSION['SP_CART'][$key]['pro_qty']=$_POST['qty'];
				}
			}//foreach
		break;		

	}//switch

//display cart
$order_list.='<table class="table">
	<tr>
		<th>#</th>
		<th>Pro name</th>
		<th>Qty</th>
		<th>Price</th>
		<th>Sub Total</th>
		<th>Action</th>
	</tr>';
$total=0;
$sub_total=0;
$no=1;
foreach ($_SESSION['SP_CART'] as $key => $value) {
$sub_total=($value['pro_qty']*$value['pro_price']);
$order_list.='
	<tr>
		<td>'.($no++).'</td>
		<td>'.$value['pro_name'].'</td>
		<td>    
		<input type="number" name="qty[]" min="1" max="1000" id="qty'.$value['pro_id'].'" 
		value="'.$value['pro_qty'].'" data-pro_id="'.$value['pro_id'].'" class="qty"></td>
		<td>'.$value['pro_price'].'</td>
		<td>'.(number_format($sub_total,2)).'</td>
		<td><button type="button" name="delete" class="delete" id="'.$value['pro_id'].'">Remove</button></td>
	</tr>';
$total+=$sub_total;
	
}//foreach

$order_list.='
	<tr>
		<td colspan="4">Total</td>
		<td>'.(number_format($total,2)).'</td>
		<td></td>
	</tr>';
$order_list.='</table>';

$output_data=array(
	'order_list'    =>    $order_list,
	'cart_item'    => count($_SESSION['SP_CART'])
);

echo json_encode($output_data);
//
}//isset($_POST['pro_id']


?>