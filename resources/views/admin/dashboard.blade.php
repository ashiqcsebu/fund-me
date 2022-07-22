@include('include.admin_header');
<section class="dashboard-counts section-padding">
    <div class="container-fluid">
        <div class="row">
            <!-- Count item widget-->
            <?php
             $count=DB::table('users')->count();
            $count_campaign=DB::table('campaigns')->count();
            ?>
            <div class="col-xl-2 col-md-4 col-6">
                <div class="wrapper count-title d-flex">
                    <div class="icon"><i class="icon-user"></i></div>
                    <div class="name"><strong class="text-uppercase">Total user</strong>
                        <div class="count-number">{{$count}}</div>
                    </div>
                </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
                <div class="wrapper count-title d-flex">
                    <div class="icon"><i class="icon-padnote"></i></div>
                    <div class="name"><strong class="text-uppercase">Total campaign</strong>
                        <div class="count-number">{{$count_campaign}}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="dashboard-counts section-padding">
    <div class="container-fluid">
        <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-12">
                <div id="donutchart" style="width: 900px; height: 500px;"></div>
            </div>

        </div>
    </div>
</section>
@include('include.admin_footer');
