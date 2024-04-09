

                                        @extends('admin.vendor.include.include')
@section('content')

   
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Refer & Earn </h4>
                                    <small class="text-muted">Refer & Earn</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>

                        
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex  justify-content-between">
                                <h5>Your Refer Url </h5>
                               <!-- <button class="btn-send-message btn btn-primary"  title="Refer your Friends and Earn" src="<?= asset('') ?>" name="Amaronshop" >Share Now</button>
                                -->
                            <button class="sharenow btn btn-primary" sharetext="Play Ludo and earn ₹10000 daily.
                        Register Now, My refer code is {{Auth::id()}}." href="{{url('/register?referral=')}}{{Auth::id()}}" name="Amaronshop" src="{{asset('assets/images/sharelogo.png')}}" >Share Now</button>
                  
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table datatableexport table  mdl-data-table dataTable  table" >
                              <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Username</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                    <?php $a= 1; ?>
                                        @foreach ($data as $key => $val)
                                            <tr>
                                                <td>{{ $a }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->created_at }}</td>
                                            </tr>
                                            <?php $a++; ?>
                                        @endforeach
                                    
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('') }}frantend/assets/vendor/jquery/jquery.min.js"></script>
<script>
         
     /*     $(document).on('click', '.btn-send-message', function(event){
	event.preventDefault();
	var mobileNumber = '+917480955140';
	var messageString = "Amaronshop, %0a%0a Refer your Friends and Earn %0a%0a{{ url('supplier-register?referral='.Auth::id()) }}";
	let openUrl = "https://wa.me/?text="+messageString;
	window.open(openUrl, '_blank');
});*/


 if ('canShare' in navigator) {
  const share = async function(shareimg, shareurl, sharetitle, sharetext) {
    try {
      const response = await fetch(shareimg);
      const blob = await response.blob();
      const file = new File([blob], 'logo.png', {type: blob.type});

      await navigator.share({
        url: shareurl,
        title: sharetitle,
        text: sharetext,
        files: [file]
      });
    } catch (err) {
      console.log(err.name, err.message);
    }
  };

 
    $('.sharenow').click(function(){
        var url = $(this).attr('href');
        var title = $(this).attr('name');
        var sharetext = $(this).attr('sharetext');
        var image = $(this).attr('src');
        share(
          image,
          url,
          title,
          sharetext
        );
    })  
}


    </script>
@endsection
