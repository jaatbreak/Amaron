
<style>
    dismiss_model {
    background: #000;
    position: fixed;
    top: 0;
    left: 0;
    color: #fff;
    width: 100%;
    height: 100%;
    font-size: 44px;
    padding: 203px 0;
    text-align: center;
}
</style>
<form name="razorpay_frm_payment" class="razorpay-frm-payment" id="razorpay-frm-payment" method="post">
    <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $id; ?>"> 
    <input type="hidden" name="language" value="EN"> 
    <input type="hidden" name="currency" id="currency" value="INR">
    @csrf
    <input type="hidden" name="surl" id="surl" value="<?php echo $surl; ?>"> 
    <input type="hidden" name="furl" id="furl" value="<?php echo $furl; ?>"> 
    <input type="hidden" class="form-control" id="amount" name="amount" placeholder="amount" value="<?php echo round($totalamount); ?>" readonly="readonly">
    <input type="hidden" name="billing_name" class="form-control" id="billing-name"  Placeholder="Name" value="<?php echo $name; ?>" required>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
jQuery( document ).ready(function() {
    var total = (jQuery('form#razorpay-frm-payment').find('input#amount').val() * 100);
    var merchant_order_id = jQuery('form#razorpay-frm-payment').find('input#merchant_order_id').val();
    var merchant_surl_id = jQuery('form#razorpay-frm-payment').find('input#surl').val();
    var merchant_furl_id = jQuery('form#razorpay-frm-payment').find('input#furl').val();
    var card_holder_name_id = jQuery('form#razorpay-frm-payment').find('input#billing-name').val();
    var merchant_total = total;
    var merchant_amount = jQuery('form#razorpay-frm-payment').find('input#amount').val();
    var csrf = jQuery('form#razorpay-frm-payment').find('input[name="_token"]').val();
    var currency_code_id = jQuery('form#razorpay-frm-payment').find('input#currency').val();
    var key_id = "rzp_test_jzNphNu48eaXHT";
    var store_name = "<?php $brand = explode("/", url('/')); echo $brand['2'];  ?>";
    var store_description = 'Payment';
    var store_logo = '';
    var email = jQuery('form#razorpay-frm-payment').find('input#billing-email').val();
    var phone = jQuery('form#razorpay-frm-payment').find('input#billing-phone').val();
  
  
    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id:merchant_order_id,
        },
        handler: function (transaction) {
            $('body').append('<div class="dismiss_model"> Please Wait.... </div>');
            
          jQuery.ajax({
                url:'<?= url('/') ?>/callback',
                type: 'post',
                data: {_token:csrf,razorpay_payment_id: transaction.razorpay_payment_id, merchant_order_id: merchant_order_id, merchant_surl_id: merchant_surl_id, merchant_furl_id: merchant_furl_id, card_holder_name_id: card_holder_name_id, merchant_total: merchant_total, merchant_amount: merchant_amount, currency_code_id: currency_code_id}, 
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    
                    if(res.result.status=='captured'){
                        jQuery.ajax({
                            url:'<?= url('/') ?>/update_order_payment_status',
                            type: 'post',
                            data: {id:merchant_order_id,_token:csrf}, 
                            dataType: 'json',
                            success: function (res) {
                            }
                        });  
                    }else{
                          jQuery.ajax({
                            url:'<?= url('/') ?>/rozar_pay_delete_order',
                            type: 'post',
                            data: {id:merchant_order_id,_token:csrf}, 
                            dataType: 'json',
                            success: function (res) {
                               window.location = res.url;
                            }
                        });  
                    }
                    if(res.msg){
                        alert(res.msg);
                        return false;
                    } 
                    window.location = res.redirectURL;
                }
            });
        },
        "modal": {
            "ondismiss": function () {
                $('body').append('<div class="dismiss_model"> Processing.... </div>');
               jQuery.ajax({
                url:'<?= url('/') ?>/rozar_pay_delete_order',
                type: 'post',
                data: {id:merchant_order_id,_token:csrf}, 
                dataType: 'json',
                success: function (res) {
                    $('body').empty();
                $('body').append('<div class="dismiss_model"> Transaction is Cancelled </div>');
                   window.location = res.url;
                }
            });
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);

objrzpv1.open();
});
</script>

