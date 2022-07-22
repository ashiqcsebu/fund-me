@include('include.admin_header');
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">


                    </div>
                    <div class="card-body">
                        <?php
                        $get_total = DB::table('pays')->where('payer_email',Auth::user()->email)->get()->sum('amount');
                        if($get_total!=null){
                          $total=$get_total;
                        }else{
                          $total=0;
                        }

                        ?>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://imgix.bustle.com/uploads/image/2019/5/2/ffa82ad4-937e-412c-9bfd-33cb9252e88e-instagram-donate.jpg?w=1020&h=576&fit=crop&crop=faces&auto=format&q=70" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Your Total Donations</h5>
                              <p class="card-text"></p>
                              <a href="#" class="btn btn-primary">BDT {{$total}}</a>
                            </div>
                      </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('include.admin_footer');
