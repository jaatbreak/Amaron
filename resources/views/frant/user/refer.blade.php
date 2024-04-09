@extends('frant.include.include')
@section('content')

<style>
    .refer_code_no {
        text-align: center;
    }
    .refer_code {
        width: 320px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-content: center;
        align-items: center;
        background-color: #0685d7;
        border-radius: 5px;
        padding: 20px 20px;
        border: dashed 2px #fff;
    }
</style>


    <div class="page-content pt-5 pb-5" style="background: #264b63 !important;" >
        <div style="text-align: center;" class="container pt-5 pb-5">
            <h3 style="color:#fff" class="mt-5 text-center" >Refer your Friends <br>and Earn </h3>
            <img style="width: 200px;" src="{{ asset('') }}frantend/assets/images/gift.png" />
            
            <div class="refer_ru" style="color:#fff; font-size: 20px; font-weight: bold; margin-top: -20px;"  >
                <span>
                    ₹
                </span>
                <span class="refer_rr" >
                    {{ Auth::user()->wallet }}
                </span>
            </div>
            <p style="color:#fff;width: 300px;margin: auto;font-size: 12px;line-height: 22px;margin-bottom: 20px;" >Translations: Can you help translate this site into a foreign language ?  you can help.</p>
            
            <div class="refer_code" >
                <div class="refer_code_no" >
                    <span style="color:#9ed9ff" >Your Referral Code</span>
                    <h3  style="margin: 0px; color:#fff; font-size: 24px;"  >{{ Auth::user()->id }}</h3>
                    <input type="text" hidden value="{{ Auth::user()->phone }}" id="copy_text">

                </div>
                <div class"copy_code" >
                    <p onclick="myFunction()" style="margin: 0px;color:#fff;line-height: 20px;cursor: pointer;border-left: solid 1px #9ed9ff;padding-left: 25px;">
                        Copy <br> Code
                    </p>
                </div>
            </div>
            <h4 style="color: #fff; font-size: 15px; font-weight: 500; margin-top: 15px;" > Share your Referral Code via </h4>
            
            <button class="sharenow btn" style="color: #fff; background-color: #ff5000; width: 300px; padding: 16px 0px; border: dashed 2px #fff;" href="https://amaronshop.com/register?referral={{ Auth::user()->id }}" sharetitle="Refer your Friends and Earn" name="" src="https://amaronshop.com/uploads/1045903968.png">Share Now</button>
            
        </div>
    </div>
    
    
    <script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("copy_text");
  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
}
</script>




@endsection