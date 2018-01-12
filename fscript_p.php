    <script src="js/jquery-2.2.4.js"></script>
    
    <script src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
      //add
$('.add_to_cart').click(function(){
  alert("hello2");
var pro_id=$(this).attr('id');
var pro_name=$('#name'+pro_id).val();

var pro_price=$('#price'+pro_id).val();
var pro_qty=$('#qty'+pro_id).val();
var action='ADD';
if(pro_qty>0){

$.ajax({
  url:'sp_cart.php',
  method:'POST',
  dataType:'json',
  data:{
    pro_id:pro_id,
    pro_name:pro_name,
    pro_price:pro_price,
    pro_qty:pro_qty,
    action:action
  },
  success:function(data){
    //$('#order_list').html(data.order_list);
   // $('.badge').html(data.cart_item);
    alert('เพิ่มสินค้าเสร็จแล้ว2');
    window.reload();
  }

});//$.ajax


}else{
alert('Enter Amount!');
}
});//.add_to_cart
//remove
$(document).on('click','.delete',function(){
  var pro_id=$(this).attr('id');
  var action='REMOVE';
  if(confirm('Do you want to del?')){
    $.ajax({
      url:'sp_cart.php',
      method:'POST',
      dataType:'json',
      data:{
        pro_id:pro_id,
        action:action
      },
      success:function(data){
        $('#order_list').html(data.order_list);
        $('.badge').html(data.cart_item);
        //alert('Add');
      }

    });//$.ajax
  }else{
    return false;
  }

});//remove


//update
$(document).on('keyup','.qty',function(){
  var pro_id=$(this).data('pro_id');
  var qty=$(this).val();
  var action='ITEM_UPDATE';


  if(qty !=''){
  $.ajax({
      url:'sp_cart.php',
      method:'POST',
      dataType:'json',
      data:{
        pro_id:pro_id,
        qty:qty,
        action:action
      },
      success:function(data){
        $('#order_list').html(data.order_list);
        //alert('Add');
      }

  });//$.ajax
  }//if
});

    });
  </script>