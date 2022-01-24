
function payment_now(){
    
    var name = $("#name_pay").val();
    var email = $("#email_pay").val();
    var mobile = $("#number_pay").val();
    var amount = $("#payment_pay").val();

    if(name && amount && mobile  && email) {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#pay_now').modal('hide');
        var options = {
            "key": "rzp_test_q1aQ0MW2idLdB1", 
            "amount": amount*100 , 
            "currency": "INR", 
            "name": "Modern SOL",
            "description": "Modern School of Languages",
            "image": "https://modernsol.in/images/logo-2.png",
            "handler": function (response){
            var payment_id = response['razorpay_payment_id'];
            $("#payment_id").val(payment_id);
            document.forms['set_payment'].submit();
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }else{
        alert("Please fill the form first");
    }

}
  