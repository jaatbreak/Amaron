<?php
use App\Models\Posttype;
use App\Models\Product;
use App\Models\Postcontent;
use App\Models\Category;


function getpostcontent($id){
    return Postcontent::where('posttype_id', $id)->get();
}

function getpostcontent_only_field($id){
    $data = Postcontent::where('posttype_id', $id)
    ->where('status', 'Y')
    ->get();
    $out = [];
    foreach($data as $item){
        $out[] = json_decode($item['field']);
    }
    return $out;
}
function getposttype($id){
    return Posttype::where('id',$id)->first();
}

function getcategory(){
     return Category::orderBy("id", "asc")->get();
}



function single_item($id){
    $row = Product::where('id', $id)->firstOrFail();
    
    // calculate price
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
    $row->weight = (Int)$row->weight;

    // $row->product_sale_price = 100;
    // $row->weight = .5;

    $weight_price = (isset($delivery_weight_price[$row->weight])?$delivery_weight_price[$row->weight]:0);
    // sale price
    $commission = ($row->product_sale_price+5+$weight_price)*6/100;
    $commission_gst = $commission*18/100;

    $row->product_calculate_price = ceil($row->product_sale_price + 5 + $weight_price + $commission + $commission_gst);

    // regular price
    $commission = ($row->product_regular_price+5+$weight_price)*6/100;
    $commission_gst = $commission*18/100;

    $row->product_regular_calculate_price = ceil($row->product_regular_price + 5 + $weight_price + $commission + $commission_gst);

    $html = '<div class="product product-image-gap product-simple">
    <figure class="product-media">
        <a href="'.url("/").'/product/'.$row->slug.'">
            <img src="'.asset("uploads").'/'.$row->product_image.'" alt="Product" width="100%" height="100%" />';
                $i=1;
                foreach(explode(',',$row->product_gallery) as $val){
                    if(1 >= $i++){
                        $html .='<img src="'.asset('uploads').'/'.$val.'" alt="Product" width="100%" height="100%" />';
                    }
                }
       $html .='</a></figure><div class="product-details">

                    <h4 class="product-name">
                        <a href="'.url("/").'/product/'.$row->slug.'">'.$row->product_name.'</a>
                    </h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="'.url("/").'/product/'.$row->slug.'" class="rating-reviews">(1 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">';
                        $html .='<ins class="new-price">₹'.$row->product_calculate_price.'</ins>';
                        $html .='<del class="old-price">₹'.$row->product_regular_calculate_price.'</del>';
                                    
                        // if (300 >= $row->product_sale_price) {
                        //     $html .='<ins class="new-price">₹'.ceil(((8.5 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((8.5 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // } elseif (500 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((6 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((6 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }elseif (1000 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((5 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((5 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }elseif (2000 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((4.75 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((4.75 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }elseif (3000 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((4.5 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((4.5 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }elseif (4000 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((4.25 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((4.25 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }elseif (5000 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((4 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((4 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }elseif (10000 >= $row->product_sale_price ) {
                        //     $html .='<ins class="new-price">₹'.ceil(((3.5 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((3.5 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }else {
                        //     $html .='<ins class="new-price">₹'.ceil(((3 / 100)*($row->product_sale_price+5))+($row->product_sale_price+5)).'</ins>';
                        //     $html .='<del class="old-price">₹'.ceil(((3 / 100)*($row->product_regular_price+5))+($row->product_regular_price+5)).'</del>';
                        // }
                        // $html .='<span class="price_off"> ( '. ceil(( $row->product_regular_price - $row->product_sale_price )/$row->product_regular_price * 100 ).' % 0ff ) </span>
                        $html .='<span class="price_off"> ( '. ceil(( $row->product_regular_calculate_price - $row->product_calculate_price )/$row->product_regular_calculate_price * 100 ).' % 0ff ) </span>';
                $html .= '
                    </div>
                </div>
    </div>
</div>';
return $html;
}

?>