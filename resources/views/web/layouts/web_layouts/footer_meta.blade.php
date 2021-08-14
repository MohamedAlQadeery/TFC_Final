

<!-- JS Plugins -->
<script src="{{asset('web/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/jquery.appear/jquery.appear.js')}}"></script>
<script src="{{asset('web/assets/plugins/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/jquery.localscroll/jquery.localScroll.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/twitter-fetcher/js/twitterFetcher_min.js')}}"></script>
<script src="{{asset('web/assets/plugins/skrollr/dist/skrollr.min.js')}}"></script>
<script src="{{asset('web/assets/plugins/animsition/dist/js/animsition.min.js')}}"></script>

<!-- JS Core -->
<script src="{{asset('web/assets/js/core.js')}}"></script>

<script>
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        foodId = $(this).attr('data-foodId');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+foodId+']').val());

        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+foodId+']').val(currentVal + 1);

            var cartBtnArray =$('#addToCart'+foodId).data('food').split(";");

            foodPrice=parseFloat((currentVal+1)*cartBtnArray[3])||1;
            $('.foodQty'+foodId).text('₺'+foodPrice);
            cartBtnArray[5]=currentVal + 1;
            cartBtnArray[4]=foodPrice;

            $('#addToCart'+foodId).attr('data-food',cartBtnArray.join(';'));


        } else {
            // Otherwise put a 1 there
            $('input[name='+fieldName+foodId+']').val(1);
            // $(this).closest('input.qty').val(1);
            var cartBtnArray =$('#addToCart'+foodId).data('food').split(";");
            foodPrice=parseFloat((1)*cartBtnArray[3])||1;
            $('.foodQty'+foodId).text('₺'+foodPrice);
            cartBtnArray[5]=1;
            cartBtnArray[4]=foodPrice;
            $('#addToCart'+foodId).attr('data-food',cartBtnArray.join(';'));

        }
    });

    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        foodId = $(this).attr('data-foodId');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+foodId+']').val());

        // If it isn't undefined or its greater than 1
        if (!isNaN(currentVal) && currentVal > 1) {
            
            // Decrement one
            $('input[name='+fieldName+foodId+']').val(currentVal - 1);
    
            var cartBtnArray =$('#addToCart'+foodId).data('food').split(";");



            foodPrice=parseFloat((currentVal-1)*cartBtnArray[3])||1;
            $('.foodQty'+foodId).text('₺'+foodPrice);
            cartBtnArray[5]=currentVal - 1;
            cartBtnArray[4]=foodPrice;

            $('#addToCart'+foodId).attr('data-food',cartBtnArray.join(';'));

        } else {
            // Otherwise put a 1 there
            $('input[name='+fieldName+foodId+']').val(1);
            var cartBtnArray =$('#addToCart'+foodId).data('food').split(";");
            foodPrice=parseFloat((1)*cartBtnArray[3])||1;
            $('.foodQty'+foodId).text('₺'+foodPrice);
            cartBtnArray[5]=1;
            cartBtnArray[4]=foodPrice;
            $('#addToCart'+foodId).attr('data-food',cartBtnArray.join(';'));

        }
    });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $(".qty").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
   });
});

//on key up the quantity input
$('.qty').keyup(function(e){
    
    if($(this).val() <= 0 ){
        $(this).val(1);
        var qty = $(this).val();
        
    }else{
        var qty =$(this).val();
    }
    foodQtyId = $(this).attr('data-foodQtyId');
    var cartBtnArray =$('#addToCart'+foodQtyId).data('food').split(";");
    foodPrice=parseFloat((qty)*cartBtnArray[3])||1;
    $('.foodQty'+foodQtyId).text('₺'+foodPrice);
    cartBtnArray[5]=qty;
    cartBtnArray[4]=foodPrice;
    $('#addToCart'+foodQtyId).attr('data-food',cartBtnArray.join(';'));

});


//  add To cart function 
var cart =[] ;
jQuery(document).ready(function(){
    $('.addToCart').click(function(e){
        var food = $(this).attr('data-food').split(";");

        // check if the product already exist in the array 
        var check = cart.includes(food[0]);
        if(check == true ){
            updateCart(food);
            return;
        }

        // check if food has attribute 
        var checkFoodAttr = $('#panelDetailsAdditions'+food[0]).length;
        var foodAdditinos=[];
        var totalPrice =food[4];
        var foodAdditinosText = "";
        var foodAdditinosId = [];

        if(checkFoodAttr >= 1){
            $('#panelDetailsAdditions'+food[0])
            $("#panelDetailsAdditions"+food[0]+" input[name=additinos]:checked").each(function()
                {
                    foodAdditinos.push($(this).attr('data-food-attribute').split(";"));
                });

                 // caluclate the totalPrice with the addtions if exist 
                foodAdditinos.forEach(element => {
                    foodAdditinosId.push(element[0]);
                    foodAdditinosText+=element[1]+"+";
                    totalPrice = parseFloat (parseFloat(totalPrice) + parseFloat(element[2]));
                });
        }
        
        var markup =
                "<tr class='foodCart"+food[0]+"'>"+
                    "<td>"+ 
                        "<input type='text' class='foodAddtionsId"+food[0]+"' hidden value='"+foodAdditinosId+"' name='foodAddtionsId[]' >"+
                        "<input type='text'  hidden value='"+food[0]+"' name='foodId[]' >"+
                        "<input type='text' class='inputQty"+food[0]+"' hidden value='"+food[5]+"' name='foodQty[]' >"+
                        "<input type='text' class='inputPrice"+food[0]+"' hidden value='"+totalPrice+"' name='foodPrice[]' >"+
                    "</td>"+
                    "<td class='title'>"+
                        "<span class='name'><a href='#productModal"+food[0]+"' data-toggle='modal'>"+food[1]+"</a></span>"+
                        // "<span class='caption text-muted'>"+food[2]+"</span>"+
                        "<span class='cartAddition"+food[0]+" caption text-muted'>"+foodAdditinosText+"</span>"+
                    "</td>"+
                    "<td class='qtyCart"+food[0]+"'>"+food[5]+"</td>"+
                    "<td >₺<span class='price priceCart"+food[0]+"'>"+totalPrice+"</td>"+
                    "<td class='actions'>"+
                        "<a href='#productModal"+food[0]+"' data-toggle='modal' class='action-icon'><i class='ti ti-pencil'></i></a>"+
                        "<a href='#' class='action-icon'><i class='delete-row ti ti-close'></i></a>"+
                    "</td>"+
                "</tr>";
            $(".table-cart").append(markup);
            cart.push(food[0]);
            countCart();
            calSubTotal();
    });
});

// count the items in the cart
function countCart(){
     $(".notification").html(cart.length);
     if(cart.length == 0){
        $("#submit-order").prop('disabled', true);
     }else{
        $("#submit-order").prop('disabled', false);

     }
}

// delete product from table row 
$(".table-cart").on('click', '.delete-row', function () {
    var food_id = $(this).closest('.food_id').val();
    cart.pop(food_id);
        $(this).closest('tr').remove();
        countCart();
        calSubTotal();
    });


// update cart when the food item is already exist in the cart
function updateCart(food_data){
   
   // check if food has attribute 
   var checkFoodAttr = $('#panelDetailsAdditions'+food_data[0]).length;
        var foodAdditinos=[];
        var totalPrice =food_data[4];
        var foodAdditinosText = "";
        var foodAdditinosId = [];

        if(checkFoodAttr >= 1){
            $('#panelDetailsAdditions'+food_data[0])
            $("#panelDetailsAdditions"+food_data[0]+" input[name=additinos]:checked").each(function()
                {
                    foodAdditinos.push($(this).attr('data-food-attribute').split(";"));
                });

                 // caluclate the totalPrice with the addtions if exist 
                foodAdditinos.forEach(element => {
                    foodAdditinosId.push(element[0]);
                    foodAdditinosText+=element[1]+"+";
                    totalPrice = parseFloat (parseFloat(totalPrice) + parseFloat(element[2]));
                });
        }

    $(".cartAddition"+food_data[0]).html(foodAdditinosText);
    $(".qtyCart"+food_data[0]).html(food_data[5]);
    $(".priceCart"+food_data[0]).html(parseFloat(totalPrice));
 
    // console.log($(".foodAddtionsId"+food_data[0]).val() );
    $(".foodAddtionsId"+food_data[0]).val(foodAdditinosId);

    // console.log($(".inputQty"+food_data[0]).val() );
    $(".inputQty"+food_data[0]).val(food_data[5]);

    // console.log($(".inputPrice"+food_data[0]).val() );
    $(".inputPrice"+food_data[0]).val(parseFloat(totalPrice));
    countCart();
    calSubTotal();

}

// calulating the subtotal
function calSubTotal(){

    var total = 0;
    $(".table-cart tr").each(function() {
        var subtotal = parseFloat($(this).find(".price").html()) || 0;
        total = total + subtotal;
    });

    $(".subTotal").html(total);
    calTotal();
}

// calulating the total
function calTotal(){
    var total = 0;
    var subtotal = parseFloat($(".subTotal").html()) || 0;
    var devliery = parseFloat($(".devliery").html()) || 0;

    total = total + subtotal + devliery;

    $(".total").html(total);
    $(".cart-value").html(total);
}
    
    // When the user clicks on the button, scroll to the top of the document
    jQuery(document).ready(function(){
    $("#back-to-top").on('click',function(){
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
});

// when order is submited 
$("#send-order").submit(function(){
    cart= [];

    // $(".table-cart").empty();
    // $(".menu-category").find("input[type=text], textarea").val("");
    // $(".menu-category").reset();
    // $('#form_id').find('input:text').val(''); 
    // $('input:checkbox').removeAttr('checked');
    countCart();
    calSubTotal();

});

const progress_bars = document.querySelectorAll('.progress');

progress_bars.forEach(bar => {
    const { size } = bar.dataset;
    bar.style.width = `${size}%`;
});
</script>