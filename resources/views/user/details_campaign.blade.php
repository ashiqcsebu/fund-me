@include('include.header')
<!-- div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>News</h1> -->
            <!-- </div> .col -->
        <!-- </div> .row -->
<!--     </div>.container -->
<!-- </div>.page-header -->

<div class="news-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <?php
                $id=$_GET['id'];
                $get_campaign = DB::table('campaigns')->where('id',$id)->first();
                ?>
                <div class="news-content">
                    <header class="entry-header d-flex flex-wrap justify-content-between align-items-center">
                        <div class="header-elements">
                            <h2 class="entry-title">{{$get_campaign->title}}</h2>
                            <div class="post-metas d-flex flex-wrap align-items-center">
                                <span class="cat-links">
                                    <a href="#">
                                        Organised University: 
												@if($get_campaign->university_id=='1')
                                            University of Barishal
                                        @endif
                                        @if($get_campaign->university_id=='2')
                                            University of Global Village
                                        @endif
                                        @if($get_campaign->university_id=='3')
                                            Patuakhali Science and Technology University
                                        @endif
                                        @if($get_campaign->university_id=='4')
                                            BM College
                                        @endif
                                    </a>
                                </span>
                            </div>
                        </div>

                        <div class="donate-icon">
                            <a href="" class="btn gradient-bg">Donate Now</a>
                            <!-- /pay_now?id={{$get_campaign->id}}-->
                        </div>
                    </header>

                    <div class="entry-content">
                        <p>
                            <?php
                            echo $get_campaign->description;
                            ?>
                        </p>
                    </div>

                    {{--<footer class="entry-footer">--}}
                        {{--<a href="#" class="btn gradient-bg">Read More</a>--}}
                    {{--</footer>--}}
                </div>

            </div>


            <div class="col-12 col-lg-4">
                <div class="sidebar">

                    <div class="upcoming-events">
                        <h2>Upcoming Campaign</h2>

                        <ul class="p-0">
                            <?php
                            $get_campaign = DB::table('campaigns')
                                ->where('campaign_status',1)
                                ->orderBy('id','DESC')
                                ->skip(0)
                                ->take(5)
                                ->get();
                            ?>
                            @foreach($get_campaign as $campaign)
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure>
                                        <a href="#">
                                            <img src="cover_image/{{$campaign->cover_image}}" alt="" style="width:100px;height:100px;">
                                        </a>
                                    </figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="/campaign-details?id={{$campaign->id}}">{{$campaign->title}}</a></h3>

                                        <div class="post-metas d-flex flex-wrap align-items-center">
                                            <span class="posted-date"><a href="#">{{$campaign->created_at}}</a></span>
                                            <span class="event-location"><a href="#">
                                                    Organised University: 
                                                @if($campaign->university_id=='1')
                                                    University of Barishal
                                                @endif
                                                @if($campaign->university_id=='2')
                                                    University of Global Village
                                                @endif
                                                @if($campaign->university_id=='3')
                                                    Patuakhali Science and Technology University
                                                @endif
                                                @if($campaign->university_id=='4')
                                                    BM College
                                                @endif
                                                </a></span>
                                        </div>

                                        <p>This campaign is verified by the University Representative from the University. All the Campaign is accepted after verification.</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- .cat-links -->
                </div><!-- .sidebar -->
            </div><!-- .col -->
        </div>
    </div>
</div>
@include('include.footer')
