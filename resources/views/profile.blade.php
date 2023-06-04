@extends('layouts.admin')
{{--Change  menu itrm  and contant--}}
@section('title')
    {{ trans('hrm::cruds.employee.title') }}
@endsection



@push('styles')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
    @if(App::isLocale('ar'))
    <style>
        .profile-about-list li i {

            margin-right: -22px;

        }

    </style>
   @endif
@endpush


@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="profile-cover"></div>
                        <div class="profile-header">
                            <div class="profile-img">
                              @if(is_null(auth()->user()->userpic) || auth()->user()->userpic=='' )

                                <img src="{{asset('assets/images/avatars/boto.png')}}">
                                  @else
                                    <?php echo '<img src="data:image/png;base64,'.base64_encode(auth()->user()->userpic).'"/>'; ?>
                                @endif
                            </div>
                            <div class="profile-name">
                                @auth

                                <h3>{{auth()->user()->english_name}}</h3>
                                @endauth
                            </div>
                            <div class="profile-header-menu">
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li><a href="#" class="active">Feed</a></li>--}}
{{--                                    <li><a href="#">About</a></li>--}}
{{--                                    <li><a href="#">Friends</a></li>--}}
{{--                                    <li><a href="#">Photos</a></li>--}}
{{--                                    <li><a href="#">Videos</a></li>--}}
{{--                                    <li><a href="#">Music</a></li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card" @if(App::isLocale('ar')) style="text-align: right" @endif>
                            <div class="card-body">
                                <h5 class="card-title">About</h5>
                                <p>Quisque vel tellus sit amet quam efficitur sagittis. Fusce aliquam pulvinar suscipit.</p>
                                <ul class="list-unstyled profile-about-list" @if(App::isLocale('ar')) style="text-align: right" @endif>
                                    <li><i class="material-icons">school</i><span>بالعربي <a href="#">ببببببب</a></span></li>
                                    <li><i class="material-icons">work</i><span>Former manager at <a href="#">Stacks</a></span></li>
                                    <li><i class="material-icons">my_location</i><span>From <a href="#">Boston, Massachusetts</a></span></li>
                                    <li> <a href="{{WEBLINK}}/userinfo.php" class="btn btn-info" target="_parent">Edit Profile</a></li>
{{--                                    <li>--}}
{{--                                        <button class="btn btn-block btn-primary m-t-lg">Follow</button>--}}
{{--                                        <button class="btn btn-block btn-secondary m-t-lg">Message</button>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body " @if(App::isLocale('ar')) style="text-align: right" @endif>
                                <h5 class="card-title">Contact Info</h5>
                                <ul class="list-unstyled profile-about-list">
                                    @auth


                                    <li><i class="material-icons">mail_outline</i><span>{{auth()->user()->email}}</span></li>
                                    <li><i class="material-icons">airplay</i><span>{{auth()->user()->member_type}}</span></li>
                                    <li><i class="material-icons">local_phone</i><span>{{auth()->user()->mobile}}</span></li>


                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="post">
                                    <div class="post-header">
                                        <img src="{{asset('assets/images/avatars/boto.png')}}">
                                        <div class="post-info">
                                            <span class="post-author">RoBoto Reports</span><br>
                                            <span class="post-date">4hrs</span>
                                        </div>
                                        <div class="post-header-actions">
                                            <a href="#"><i class="material-icons">more_horiz</i></a>
                                        </div>
                                    </div>
                                    <div class="post-body">
                                        <p>The below charts will show your latest activates on system per page</p>
                                        <div id="chartdiv"></div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stories</h5>
                                <div class="story-list">
                                    <div class="story">
                                        <a href="#"><img src="{{asset('assets/images/avatars/avatar1.png')}}" alt=""></a>
                                        <div class="story-info">
                                            <a href="#"><span class="story-author">Buddy Mckinney</span></a>
                                            <span class="story-time">17min</span>
                                        </div>
                                    </div>
                                    <div class="story">
                                        <a href="#"><img src="{{asset('assets/images/avatars/avatar2.png')}}" alt=""></a>
                                        <div class="story-info">
                                            <a href="#"><span class="story-author">Marshall Braun</span></a>
                                            <span class="story-time">54min</span>
                                        </div>
                                    </div>
                                    <div class="story">
                                        <a href="#"><img src="{{asset('assets/images/avatars/avatar4.png')}}" alt=""></a>
                                        <div class="story-info">
                                            <a href="#"><span class="story-author">Dominick Gray</span></a>
                                            <span class="story-time">2hrs</span>
                                        </div>
                                    </div>
                                    <div class="story">
                                        <a href="#"><img src="{{asset('assets/images/avatars/avatar5.png')}}" alt=""></a>
                                        <div class="story-info">
                                            <a href="#"><span class="story-author">Francisco Mccaffrey</span></a>
                                            <span class="story-time">7hrs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Mutual Friends</h5>
                                <div class="mutual-friends-list">
                                    <img src="{{asset('assets/images/avatars/avatar1.png')}}" alt="" data-toggle="tooltip" data-placement="bottom" title="Francisco Mccaffrey">
                                    <img src="{{asset('assets/images/avatars/avatar2.png')}}" alt="" data-toggle="tooltip" data-placement="bottom" title="Marshall Braun">
                                    <img src="{{asset('assets/images/avatars/avatar3.png')}}" alt="" data-toggle="tooltip" data-placement="bottom" title="Elvis Mahoney">
                                    <img src="{{asset('assets/images/avatars/avatar4.png')}}" alt="" data-toggle="tooltip" data-placement="bottom" title="Kenny Highland">
                                    <span>+45 others</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection





@push('scripts')

    <script src="{{asset('assets/plugins/amcharts5/lib/index.js')}}"></script>
    <script src="{{asset('assets/plugins/amcharts5/lib/percent.js')}}"></script>
    <script src="{{asset('assets/plugins/amcharts5/lib/xy.js')}}"></script>
    <script src="{{asset('assets/plugins/amcharts5/lib/radarsold.js')}}"></script>
    <script src="{{asset('assets/plugins/amcharts5/lib/Animated.js')}}"></script>





    <!-- Resources -->


    <!-- Chart code -->
    <script>

        am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    endAngle: 270
                })
            );

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
            var series = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "value",
                    categoryField: "category",
                    endAngle: 270
                })
            );

            series.states.create("hidden", {
                endAngle: -90
            });

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series.data.setAll([{
                category: "Endorsements",
                value: 501.9
            }, {
                category: "Requests",
                value: 301.9
            }, {
                category: "Clients Statements",
                value: 201.1
            }, {
                category: "Policies",
                value: 165.8
            }, {
                category: "Sales",
                value: 139.9
            }, {
                category: "Commissions",
                value: 128.3
            }, {
                category: "VAT",
                value: 99
            }]);

            series.appear(1000, 100);

        }); // end am5.ready()
    </script>


@endpush
