<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attributes_Product;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\User;
use Mail;

use Yajra\DataTables\DataTables;
use App\Traits\Common_trait;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class CommonController extends Controller
{
    use Common_trait;
    
    
    public function changepass(Request $request,$slug){
        if($request->Method()=='POST'){
         
      
            $isrow = User::where('remember_token',$slug)->first();
            if($isrow){
                $toeken = rand().rand();
                User::where('password',$request->password)->update(['remember_token'=>$toeken]);
                return redirect('/')->with('success', 'Password Change Successfully ! ');
            }else{
             return redirect()->back()->with('danger', 'Link Expire Please Ganarate New Link');   
            }
            
        }
        return view('changepass');
    }
    
    public function forgotpass(Request $request){
        if($request->Method()=='POST'){
         
      
            $isrow = User::where('email',$request->email)->first();
            if($isrow){
                $toeken = rand().rand();
                User::where('email',$request->email)->update(['remember_token'=>$toeken]);
                
                
                $email = $isrow->email;
                
                    $link = url('changepass/').'/'.$toeken;
                   $data = array('link'=>$link,'name'=>"Amaronshop",'data'=>$isrow);
      Mail::send('mail', $data, function($message) use ($isrow) {
         $message->to($isrow->email, 'Amaronshop')->subject
            ('Amaronshop Forgot Password Vendor ');
         $message->from('xyz@gmail.com','Amaronshop ');
      });
      
       return redirect()->back()->with('success', 'Reset Email Send in Your  Inbox ');  
       
                
            }else{
             return redirect()->back()->with('danger', 'Email Not Exits!');   
            }
            
        }
        return view('forgot');
    }

    public function gst_check($gst)
    {
        if ($gst) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://sheet.gstincheck.co.in/check/4399ea7639118c8386797a427b1e84f7/" . $gst . "");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $dataa = json_decode($response, true);
            $data['data'] = $dataa['data'];

        } else {
            return redirect()->back();
        }
        print_r($data);
        die;
        return view('admin.pages.gst_check', $data);

    }

    public function showcart()
    {
        $collection = Cart::getContent();
        $sorted = $collection->sort();

        $data['cartitems'] = $sorted;
        $product['product'] = Product::get();
        // echo "<pre>";
// print_r($sorted);exit;
        // $product['product'] = $this->price_calculate($product['product']);

        return view('frant.home.showcart', $data, $product);
    }

    public function refer()
    {
        return view('frant.user.refer');
    }

    public function vendor_order()
    {
        if (auth()->user()->verified == 'N') {
            return redirect()->back();
        }
        $vendor_id = Auth::user()->id;
        $vendor_order['order'] = Checkout::where('vendor_id', $vendor_id)->get();
        return view('admin/vendor/pages/order', $vendor_order);
    }
    
    public function view_order($id){
        $user = Checkout::find($id);
        $data = json_decode($user->data);
         return view('admin/pages/order_view', compact('user','data'));
    }
    
    public function view_vendor_order($id){
         $user = Checkout::find($id);
        $data = json_decode($user->data);
         return view('admin/vendor/pages/viewvendor', compact('user','data'));
    }

    public function order(Request $request)
    
    {
      if ($request->ajax()) {
            $users = Checkout::get();
            return DataTables::of($users)
            ->toJson();
         }
    
    if($request->method() == "POST"){
        if($request->vendor_id){
        $users = Checkout::where("vendor_id", $request->vendor_id)->get();
        }elseif($request->date){
             $users = Checkout::where('created_at', 'like', $request->date.'%')->get();
        }elseif($request->status){
             $users = Checkout::where("payment_status", $request->status)->get();
        }
    }else{
         $users = Checkout::get();
        
    }     return view('admin/pages/order', compact('users'));
       

       
    }

    public function category($slug)
    {
        $cat_id = Category::where('slug', $slug)->first();
        $data['selected_products'] = Product::where('product_category', 'like', '%' . $cat_id->id . '%')->where('verified', 'Y')->paginate(9);
        $data['data'] = Category::where('slug', $slug)->first();
        $category['category'] = Category::get();

        return view('frant.home.category', $data, $category);

    }

    public function get_curl_handle($payment_id, $data)
    {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = 'rzp_test_jzNphNu48eaXHT';
        $key_secret = 'cZltX8PWYqiBOJRqfBiiWnVP';
        $params = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        return $ch;
    }

    public function callback()
    {
        //$this->cart->destroy();
        if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['merchant_order_id'])) {
            $json = array();
            $razorpay_payment_id = $_POST['razorpay_payment_id'];
            $merchant_order_id = $_POST['merchant_order_id'];
            $currency_code = $_POST['currency_code_id'];
            // store temprary data
            $dataFlesh = array(
                'card_holder_name' => $_POST['card_holder_name_id'],
                'merchant_amount' => $_POST['merchant_amount'],
                'merchant_total' => $_POST['merchant_total'],
                'surl' => $_POST['merchant_surl_id'],
                'furl' => $_POST['merchant_furl_id'],
                'currency_code' => $currency_code,
                'order_id' => $_POST['merchant_order_id'],
                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            );
            $paymentInfo = $dataFlesh;
            $order_info = array('order_status_id' => $_POST['merchant_order_id']);
            $amount = $_POST['merchant_total'];
            $currency_code = $_POST['currency_code_id'];
            // bind amount and currecy code
            $data = array(
                'amount' => $amount,
                'currency' => $currency_code,
            );
            $success = false;
            $error = '';
            try {
                $ch = $this->get_curl_handle($razorpay_payment_id, $data);
                $result = curl_exec($ch);
                $data = json_decode($result);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $paydetails = serialize($response_array);
                        $json['result'] = $response_array;
                        $data = ['transaction_detail' => $paydetails];

                        Checkout::where('rand', $response_array['notes']['soolegal_order_id'])->update($data);

                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'Invalid Response <br/>' . $result;
                        }
                    }
                }
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }
            if ($success === true) {
                if (!$order_info['order_status_id']) {
                    $json['redirectURL'] = $_POST['merchant_surl_id'];
                } else {
                    $json['redirectURL'] = $_POST['merchant_surl_id'];
                }
            } else {
                $json['redirectURL'] = $_POST['merchant_furl_id'];
            }
            $json['msg'] = '';
        } else {
            $json['msg'] = 'An error occured. Contact site administrator, please!';
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function update_order_payment_status()
    {
        $data = array('payment_status' => 'Y', 'order_status' => 'complete');
        Checkout::where('rand', $_POST['id'])->update($data);
    }

    public function rozar_pay_delete_order()
    {
        Checkout::where('rand', $_POST['id'])->delete();
        $json['url'] = '/orderfailed';
        //$this->cart->destroy();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function paynow($rand_id)
    {
        $invoices = Checkout::where('rand', $rand_id)->get();
        $data['id'] = $rand_id;
        $data['surl'] = '/success';
        $data['furl'] = '/failed';
        $data['name'] = $invoices[0]->username;
        $data['totalamount'] = $invoices[0]->grand_total;
        $data['product'] = Checkout::where('rand', $rand_id)->get()->firstOrFail();
        // echo "<pre>";//print_r($invoices);
        // print_r($data);exit;
        return view('frant.common.paynow', $data);
    }

    public function updateCart($id, $type)
    {
        ($type == 'minus') ? $qty = -1 : $qty = 1;
        Cart::update($id, array(
            'quantity' => $qty,
        ));
        return redirect()->back()->with('success', 'Update Successfully');
    }

    public function applycartcondition()
    {

    }

    public function removecart($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Delete Successfully');
    }

    public function checkout(Request $req)
    {
        if (Auth::check()) {

            $cart_data = Cart::getContent();
            if(count($cart_data)<1){
                return redirect('/');
                die;
            }
            foreach ($cart_data as $cart_d) {
                $productt['productt'] = Product::where('id', $cart_d->id)->first();
                $vendor_id = $productt['productt']->vendor_id;
                $product_weight = $productt['productt']->weight;
                $vendor_idd['vendor_idd'] = User::where('id', $vendor_id)->first();
            }
            
            $user_id = Auth::user()->id;
            $data['wallet'] = Wallet::where('user_id', $user_id)->get();

            $total = 0;        
            foreach ($data['wallet'] as $key => $val){
                if($val->rand == $val->rand){
                    if($val->trans_type == '+'){
                        $total += $val->credit;
                    }else{
                        $total -= $val->debit;
                    }
                }
            }
            // echo "<pre>";
            // print_r($data['wallet']);
            // echo $total;exit;
            $data['wallet_total'] = $wallet_total =  $total;
            $data['user_id'] = $user_id;
            
            $vendor_pin_code = $vendor_idd['vendor_idd']->pin_code;
            $cart_product['cart_product'] = Product::where('id', $cart_d->id)->get();
            $vendor_idi = $cart_product['cart_product']['0']->vendor_id;

            $pickup_postcode = $vendor_pin_code;
            $delivery_postcode = Auth::user()->pin_code;
            $cod = '0';
            $weight = $product_weight;

            {
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, 'https://apiv2.shiprocket.in/v1/external/auth/login');
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                // curl_setopt($ch, CURLOPT_HTTPHEADER, [
                //     'Content-Type: application/json',
                // ]);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"email\": \"amaronshop.ind@gmail.com\",\n    \"password\": \"Ns@9929532877#\"\n}");
                // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                // $response = curl_exec($ch);
                // curl_close($ch);
                // $data_token = json_decode($response, true);
                // $token = $data_token['token'];

                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, "https://apiv2.shiprocket.in/v1/external/courier/serviceability/?pickup_postcode=".$pickup_postcode."&delivery_postcode=".$delivery_postcode."&cod=0&weight=".$weight."");
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                // curl_setopt($ch, CURLOPT_HTTPHEADER, [
                //     'Content-Type: application/json',
                //     'Authorization: Bearer'.$token,
                // ]);
                // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                // $response = curl_exec($ch);
                // curl_close($ch);
                // $dataaa = json_decode($response, true);

                // $data['rate'] = $dataaa['data']['available_courier_companies']['0']['rto_charges'];
                // $data['data_edd'] = $dataaa['data']['available_courier_companies']['0']['etd'];

                // $shipping_rate = $dataaa['data']['available_courier_companies']['0']['rate'];
                // $edd = $dataaa['data']['available_courier_companies']['0']['etd'];
            }

            if ($req->method() == 'POST') {
                if(isset($req->use_wallet)){
                    if ($req->payment_method == 'cod') {
                        $total = Cart::getSubTotal()+25;

                    }else{
                        $total = Cart::getSubTotal();
                    }
                    $wallet_total_old = $wallet_total;
                    $total_payable = $total;
                    if(isset($_GET['use_wallet'])){
                        if($wallet_total < $total){
                            $total_payable = $total - $wallet_total;
                            // $wallet_total = 0;
                        }
                        else{
                            $total_payable = 0;
                            // $wallet_total_old = $total;
                            // $wallet_total = $wallet_total - $total;
                            $wallet_total = $total;
                        }
                    }
                }else{
                    $total_payable = Cart::getSubTotal();
                }
                // echo "<pre>";
                // print_r($wallet_total);
                // print_r($total_payable);
                // print_r($req->all());
                // print_r(count(Cart::getContent()));
                // exit;
                $rand = random_int(100000, 999999);
                $data = '';
                $refer_comm = 0;
                foreach (Cart::getContent() as $val) {
                    
                    $data_checkout = [
                        'c_id' => '1',
                        'rand' => $rand,
                        'username' => $req->username,
                        'company_name' => $req->company_name,
                        'country' => $req->country,
                        'order_notes' => $req->order_notes,
                        'email' => $req->email,
                        'mobile' => $req->mobile,
                        'pin_code' => $req->pin_code,
                        'city' => $req->city,
                        'address' => $req->address,
                        'data' => $val,
                        'vendor_id' => Product::where('id', $val['id'])->first()->vendor_id,
                        'user_id' => Auth::user()->id,
                        'wallet_used' => $wallet_total,
                        'order_total' => Cart::get($val['id'])->getPriceSum(),
                        'grand_total' => $total_payable,
                        // 'order_total' => $val['price'] ?? 0,
                        // 'grand_total' => Cart::get($val['id'])->getPriceSum(),
                        'payment_mode' => $req->payment_method,
                        'payment_status' => 'N',
                    ];
                    $data = Checkout::create($data_checkout);
                    // echo "<pre>";
                    // print_r($val);
                    // echo "</pre>";

                    $prduct = Product::where('id', $val->id)->first();
                    // print_r($prduct->product_sale_price);
                    $refer_comm += ($val->quantity*$prduct->product_sale_price)/100*1;
                    $url = $data->rand;
                }
                // echo "<pre>";
                // print_r(Auth::user());
                $referred_by = User::where('referral', Auth::user()->referred_by)->first('id');
                // print_r($referred_by->id);
                // print_r($refer_comm);
                // echo "</pre>";

                if(isset($referred_by->id)){
                    // echo "test";
                    $wallet_ins = [
                        'user_id'=>$referred_by->id,
                        'reference'=>"Product commision by ".Auth::user()->referral."!",
                        // 'debit'=>$wallet_total,
                        'credit'=>$refer_comm,
                        'trans_type'=>'+',//$req->trans_type,
                    ];
                    // print_r($wallet_ins);exit;
                    $data1 = Wallet::create($wallet_ins);
                }
// exit;
                if($wallet_total>0){
                    $wallet_ins = [
                        'user_id'=>Auth::user()->id,
                        'reference'=>"Amount paid for product!",
                        // 'debit'=>$wallet_total,
                        'debit'=>$wallet_total,
                        'trans_type'=>'-',//$req->trans_type,
                    ];
                    // print_r($wallet_ins);exit;
                    $data1 = Wallet::create($wallet_ins);
                }



                // exit;
                if($data){
                    //shiprocket create order process code.
                    $postarray = array();
                    $shipplacearr = $data->toArray();
                    //dd($shipplacearr);
                    //$shipitemsarr = array(); 
                    $itemdataarr = $shipplacearr['data']->toArray();
                    //foreach($itemdataarr as $key => $itemdataarr_single){
                        $shipitemsarr = array(
                            "name" => $itemdataarr['name'],
                            "sku" => random_int(100000, 999999),
                            "units" => $itemdataarr['quantity'],
                            "selling_price" => $itemdataarr['price'],
                            "discount" => "",
                            "tax" => "",
                            "hsn" => "",
                        ); 
                        // echo "<pre>";
                        // print_r($shipitemsarr);exit;    
                    //}
                    $postrequestdata = $req->all();
                    $orderpostarr = [
                        "order_id" => $shipplacearr['rand'],
                        "order_date" => $shipplacearr['created_at'],
                        "pickup_location" => "primary",
                        "channel_id" => "3853310",
                        "comment" => $shipplacearr['order_notes'],
                        "billing_customer_name" => $shipplacearr['username'],
                        "billing_last_name" => "",
                        "billing_address" => $shipplacearr['address'],
                        "billing_address_2" => "",
                        "billing_city" => $shipplacearr['city'],
                        "billing_pincode" => $postrequestdata['zip'],
                        "billing_state" => $postrequestdata['town'],
                        "billing_country" => $postrequestdata['country'],
                        "billing_email" => $shipplacearr['email'],
                        "billing_phone" => !empty($shipplacearr['mobile']) ? $shipplacearr['mobile'] : $postrequestdata['phone'],
                        "shipping_is_billing" => true,
                        "shipping_customer_name" => "",
                        "shipping_last_name" => "",
                        "shipping_address" => "",
                        "shipping_address_2" => "",
                        "shipping_city" => "",
                        "shipping_pincode" => "",
                        "shipping_country" => "",
                        "shipping_state" => "",
                        "shipping_email" => "",
                        "shipping_phone" => "",
                        "order_items" => [
                            $shipitemsarr
                        ],
                        "payment_method" => $shipplacearr['payment_mode'],
                        "shipping_charges" => 0,
                        "giftwrap_charges" => 0,
                        "transaction_charges" => 0,
                        "total_discount" => 0,
                        "sub_total" => $shipplacearr['grand_total'],
                        "length" => 10,
                        "breadth" => 15,
                        "height" => 20,
                        "weight" => 2.5,
                    ];
                    $shiprocketorderstatus = $this->sendOrderOnShiprocket($orderpostarr);
                    // echo '<pre>';
                    // print_r($orderpostarr);
                    // echo '</pre>';
                    // dd($shiprocketorderstatus);
                    if($shiprocketorderstatus->status_code == 1){
                        $shiporderid = $shiprocketorderstatus->order_id;
                        $channel_order_id = $shiprocketorderstatus->channel_order_id;
                        $shipment_id = $shiprocketorderstatus->shipment_id;
                    }
                }
                if ($req->payment_method == 'razarpay') {
                    if (isset($req->use_wallet)) {
                        return redirect('pay/' . $url.'?use_wallet=1');
                    }else{
                        return redirect('pay/' . $url);
                    }
                    return redirect('pay/' . $url);
                    die;
                }elseif ($req->payment_method == 'phonepay') {
                    return redirect($this->phonepayPayment($data_checkout));
                    // die;
                }
                return redirect('/success')->with('success', 'Orders Submit Successfully');
            }

            $data['cartitems'] = Cart::getContent();
            $product['product'] = Product::get();
            return view('frant.home.checkout', $data, $product);

        } else {
            return redirect('/login')->with('danger', 'Login After Checkout ');
        }
    }

    public function cartClear()
    {
        Cart::clear();
        return redirect()->back()->with('success', 'Cart Clear Successfully');
    }

    public function addtocart(Request $req, $slug)
    {

        $row = Product::where('slug', $slug)->firstOrFail();
        $row = $this->price_calculate($row);
        $price = $row->product_calculate_price;

        // if (300 >= $row->product_sale_price) {
        //     $price = ceil(((8.5 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (500 >= $row->product_sale_price) {
        //     $price = ceil(((6 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (1000 >= $row->product_sale_price) {
        //     $price = ceil(((5 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (2000 >= $row->product_sale_price) {
        //     $price = ceil(((4.75 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (3000 >= $row->product_sale_price) {
        //     $price = ceil(((4.5 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (4000 >= $row->product_sale_price) {
        //     $price = ceil(((4.25 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (5000 >= $row->product_sale_price) {
        //     $price = ceil(((4 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } elseif (10000 >= $row->product_sale_price) {
        //     $price = ceil(((3.5 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // } else {
        //     $price = ceil(((3 / 100) * ($row->product_sale_price + 5)) + ($row->product_sale_price + 5));
        // }



        Cart::add(array(
            array(
                'id' => $row->id,
                'name' => $row->product_name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => $req->all(),
            ),
        ));

        return redirect('cart')->with('add_cart', 'Add To Cart Successfully !');
    }

    public function single_product_show(Request $req, $slug)
    {

        if (Product::where('slug', $slug)->exists()) {

            $data['selected_products'] = Product::where('verified', 'Y')->inRandomOrder()->limit(8)->get()->toArray();

            $product = Product::where('slug', $slug)->first();
            $product = $this->price_calculate($product);
            
            $data['product'] = $product;
            $data['attributes'] = Attributes_Product::where('product_id', $data['product']['id'])->get()->pluck('attributes')->toArray();
        } else {
            return back()->with('product_not_found', 'Product Not Found');
        }
        return view('frant.home.single_product', $data);

    }

    function price_calculate($product = 0){
        $delivery_weight_price = array(
            0.5 =>	83,
            1 =>	130,
            2 =>	160,
            3 =>	260,
            4 =>	260,
            5 =>	260,
            6 =>	465,
            7 =>	465,
            8 =>	465,
            9 =>	465,
            10 =>	465,
            11 =>	880,
            12 =>	880,
            13 =>	880,
            14 =>	880,
            15 =>	880,
            16 =>	880,
            17 =>	880,
            18 =>	880,
            19 =>	880,
            20 =>	880
        );
        $product->weight = (Int)$product->weight;

        // $product->product_sale_price = 100;
        // $product->weight = .5;

        $weight_price = (isset($delivery_weight_price[$product->weight])?$delivery_weight_price[$product->weight]:0);
        // sale price
        $commission = ($product->product_sale_price+5+$weight_price)*6/100;
        $commission_gst = $commission*18/100;

        $product->product_calculate_price = ceil($product->product_sale_price + 5 + $weight_price + $commission + $commission_gst);

        // regular price
        $commission = ($product->product_regular_price+5+$weight_price)*6/100;
        $commission_gst = $commission*18/100;

        $product->product_regular_calculate_price = ceil($product->product_regular_price + 5 + $weight_price + $commission + $commission_gst);

        return $product;
        // print_r($product->product_calculate_price);
        // print_r($product->product_regular_calculate_price);exit;
        // $product->product_calculate_price = ceil(
        //     ((8.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)
        // );

        // echo $product->weight;exit;

        // $product->product_regular_calculate_price = ceil(((8.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        
        // if(300 >= $product->product_sale_price){
        //     $product->product_calculate_price = ceil(
        //         ((8.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)
        //     );

        //     echo $product->weight;exit;

        //     $product->product_regular_calculate_price = ceil(((8.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (500 >= $product->product_sale_price){
        //     $product->product_calculate_price = ceil(
        //         ((6 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)
        //         );
        //     $product->product_regular_calculate_price = ceil(((6 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (1000 >= $product->product_sale_price) {
        //     $product->product_calculate_price = ceil(((5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (2000 >= $product->product_sale_price) {
        //     $product->product_calculate_price = ceil(((4.75 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((4.75 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (3000 >= $product->product_sale_price){
        //     $product->product_calculate_price = ceil(((4.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((4.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (4000 >= $product->product_sale_price) {
        //     $product->product_calculate_price = ceil(((4.25 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((4.25 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (5000 >= $product->product_sale_price){
        //     $product->product_calculate_price = ceil(((4 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((4 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // elseif (10000 >= $product->product_sale_price){
        //     $product->product_calculate_price = ceil(((3.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((3.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }
        // else{
        //     $product->product_calculate_price = ceil(((3 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5));
        //     $product->product_regular_calculate_price = ceil(((3 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5));
        // }

        // echo "<pre>";
        // print_r($product);exit;
        
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->flash('logout', 'logout successful!');
        return redirect('/');
    }

    public function logout_all(Request $req)
    {
        Auth::logout();
        $req->session()->flash('logout', 'logout successful!');
        return redirect('/');
    }

    public function my_account(Request $req)
    {
        if (Auth::user()) {
            return view('frant.user.my_account');
        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }
    }

    public function my_orders(Request $req)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user_order['order'] = Checkout::where('user_id', $user_id)->get();
            return view('frant.user.orders', $user_order);

        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }

    }
    public function my_wallet(Request $req)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user_order['wallet'] = Wallet::where('user_id', $user_id)->get();
            return view('frant.user.wallet', $user_order);

        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }

    }

    public function invoice(Request $req, $id)
    {

        if (Auth::user()) {

            //  $order_id = Checkout::where('user_id', $user_id)->get();

            // if(Auth::user()->id == ){

            // }

            return view('frant.user.invoice');

        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }

    }
    public function wishlist(Request $req)
    {
        if (Auth::user()) {
            return view('frant.user.wishlist');
        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }
    }

    // public function order(Request $req)
    // {
    //     return view('admin/pages/order');
    // }

    // public function vendor_order(Request $req)
    // {
    //     return view('admin/vendor/pages/order');
    // }

    // Common Pages Start

    public function profile(Request $req)
    {
        if (Auth::user()) {
            $title['title'] = "Profile ";
            if ($req->method() == 'POST') {
                if (Auth::user()->id = $req->id) {
                    $userdata = [
                        'name' => $req->name,
                        'address' => $req->address,
                    ];
                    User::where('id', $req->id)->update($userdata);
                    $req->session()->flash('success', 'Update Profile Successful!');
                    return redirect('profile');
                } else {
                    $req->session()->flash('error', 'Profile Not Updating');
                }
            }
            return view('frant.common.profile', $title);
        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }
    }

    public function change_password(Request $req)
    {
        if (Auth::user()) {
            $title['title'] = "Change Password ";
            if ($req->method() == 'POST') {
                $req->validate([
                    'old_password' => 'required',
                    'new_password' => 'required|confirmed',
                ]);
                if (!Hash::check($req->old_password, auth()->user()->password)) {
                    return back()->with("old_password", "Old Password Doesn't match!");
                }
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($req->new_password),
                ]);
                return back()->with("success", "Password changed successfully!");
            }
            return view('frant.common.change_password', $title);
        } else {
            return redirect('/login')->with('error', 'Please Login ');
        }
    }

    public function about(Request $req)
    {
        $title['title'] = "About Us";
        return view('frant.common.about', $title);
    }
    public function success(Request $req)
    {
        $title['title'] = "Success";
        return view('frant.common.success', $title);
    }
    public function failed(Request $req)
    {
        $title['title'] = "Failed";
        return view('frant.common.failed', $title);
    }
    public function contact(Request $req)
    {
        $title['title'] = "Contact Us";
        return view('frant.common.contact', $title);
    }

    public function payments(Request $req)
    {
        $title['title'] = "Payments";
        return view('frant.common.payments', $title);
    }

    public function shipping(Request $req)
    {
        $title['title'] = "Shipping";
        return view('frant.common.shipping', $title);
    }

    public function cancellation_returns(Request $req)
    {
        $title['title'] = "Cancellation and Returns";
        return view('frant.common.cancellation_returns', $title);
    }

    public function faq(Request $req)
    {
        $title['title'] = "FAQs";
        return view('frant.common.faq', $title);
    }

    public function returns_policy(Request $req)
    {
        $title['title'] = "Returns Policy";
        return view('frant.common.returns_policy', $title);
    }

    public function term_conditions(Request $req)
    {
        $title['title'] = "Term and Conditions";
dd($this->sendOrderOnShiprocket());
        return view('frant.common.term_conditions', $title);
    }

    public function privacy_policy(Request $req)
    {
        $title['title'] = "Privacy Policy";
        return view('frant.common.privacy_policy', $title);
    }

    public function sitemap(Request $req)
    {
        $title['title'] = "Sitemap";
        return view('frant.common.sitemap', $title);
    }
    public function track_order(Request $req)
    {
        $title['title'] = "Track My Order";
        return view('frant.common.track_order', $title);
    }
    public function datamanage(Request $req)
    {
        $title['product'] = Product::where('vendor_id',Auth::id())->where('status', 'P')->get();
        $title['title'] = "Data Manage";
        return view('admin/vendor/pages/datamanage', $title);
    }

    public function uploadexcel(Request $req)
    {
    
      if ($req->method() == "POST") {
         
         
        $getdata = [];
        $row = 1;
        if (($handle = fopen($req->file('csv_file'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);if ($row == 1) {
                    # code...
                }else{
                    if (isset($data[0]) && isset($data[1]) && isset($data[2]) && isset($data[3]) && isset($data[4]) && isset($data[5]) && isset($data[6]) && isset($data[7])) {
                        $getdata = new Product;
                                
                                $getdata->weight = $data[14];
                                $getdata->height = $data[15];
                                $getdata->width = $data[16];
                                $getdata->length = $data[17];
                                $getdata->replace_value = $data[13];
                                $getdata->return_value = $data[12];
                                $getdata->is_replace = $data[11];
                                $getdata->allow_return = $data[10];
                                $getdata->stock_quantity = $data[9];
                                $getdata->vendor_id = $data[8];
                                $getdata->slug = $this->create_unique_slug($data[0],'products');
                                $getdata->stock_quantity = $data[9];
                                $getdata->product_name = $data[0];
                                $getdata->product_image = $data[1];
                                $getdata->product_regular_price = $data[2];
                                $getdata->product_sale_price = $data[3];
                                $getdata->product_category = $data[4];
                                $getdata->product_gallery = $data[5];
                                $getdata->product_sort_desc = $data[6];
                                $getdata->product_desc = $data[7];
                                $getdata->status = 'P';
                                $getdata->stock_status = 1;
                                $getdata->hsn = rand();
                                $getdata->created_at = rand();

                                $getdata->save();
                            // unset($getdata[0]);
                        }

                    // DB::table('products')->insert($getdata);

                }
                $row++;
             }
        }
        fclose($handle);
        return redirect()->back()->with('success','Product Uploaded');


        }else {
            return redirect()->back()->with('danger','Product Uploaded Failed ');

        }
    }


    public function panding_product(Request $request){
        
        

        if ($request->ajax()) {
            $users = Product::where('status', 'P');
            return DataTables::of($users)
            ->editColumn('product_image', function ($contact){
                  if($contact->product_image){ return 'uploads/'.$contact->product_image; }else{ return 'admin/1.png'; };
            })
            ->toJson();
         }

        return view('admin/pages/panding_products');
    }

    public function verify_product($verify, $id){
        $find = Product::find($id);
        $find->status = $verify;
        $find->save();
        return redirect()->back()->with('success','Updated Successfully');
    }

public function shipRocketAccessToken(){
        // $email    = 'rahulgoyal0131@gmail.com';
        // $password = 'XPAsY@U!6Yp7Czq'; 
        $email    = 'amaronshop.ind@gmail.com';
        $password = 'Ns@9929532877#'; 
        $postdata = array('email'=>$email,'password'=>$password);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postdata,
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        curl_close($curl);
        return $result->token;
    }

    public function sendOrderOnShiprocket($orderpostarr){
        $accessToken = $this->shipRocketAccessToken();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($orderpostarr),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$accessToken
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    
    public function phonepayPayment($data_checkout)
    {
        $merchantId = 'M22LKJHF7D3LQ';
        $apiKey="a189b5e7-d161-444d-95b1-406ee43bbddd";
        $redirectUrl = url('/success');
        
        // Set transaction details
        $order_id = uniqid();
        $name=$data_checkout['username'];
        $email=$data_checkout['email'];
        $mobile=$data_checkout['mobile'];
        $amount = $data_checkout['grand_total']; // amount in INR
        $description = $data_checkout['order_notes'];
        $vendor_id=$data_checkout['vendor_id'];
        $user_id=$data_checkout['user_id'];
        $order_total=$data_checkout['order_total'];
        $grand_total=$data_checkout['grand_total'];
        $payment_mode=$data_checkout['payment_mode'];
        
        // Example usage
        $transactionID = $this->generateRandomTransactionID();
        
        
        $paymentData = array(
            'merchantId' => $merchantId,
            'merchantTransactionId' => $transactionID, // test transactionID
            "merchantUserId"=>"MUID123",
            'amount' => $amount*100,
            'redirectUrl'=>$redirectUrl,
            'redirectMode'=>"POST",
            'callbackUrl'=>url('/fail'),
            "merchantOrderId"=>$order_id,
           "mobileNumber"=>$mobile,
           "message"=>$description,
           "email"=>$email,
           "shortName"=>$name,
           "paymentInstrument"=> array(    
            "type"=> "PAY_PAGE",
          )
        );
        //dd($paymentData);
        
         $jsonencode = json_encode($paymentData);
         $payloadMain = base64_encode($jsonencode);
         $salt_index = 1; //key index 1
         $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
         $sha256 = hash("sha256", $payload);
         $final_x_header = $sha256 . '###' . $salt_index;
         $request = json_encode(array('request'=>$payloadMain));
                        
        $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS => $request,
          CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
             "X-VERIFY: " . $final_x_header,
             "accept: application/json"
          ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
           $res = json_decode($response);
         
            if(isset($res->success) && $res->success=='1'){
                $paymentCode=$res->code;
                $paymentMsg=$res->message;
                $payUrl=$res->data->instrumentResponse->redirectInfo->url;
                return $payUrl;     
            }
        }
    }
    
    public function generateRandomTransactionID($prefix = 'TXN') {
        // Get the current timestamp in microseconds
        $microtime = microtime();
    
        // Remove the dot and concatenate the prefix
        $uniqueID = $prefix . str_replace([' ', '.'], '', $microtime);
    
        // Append a random number for added uniqueness
        $uniqueID .= mt_rand(1000, 9999);
    
        return $uniqueID;
    }

    // Common Pages End

}