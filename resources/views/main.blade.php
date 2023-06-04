@extends('layouts.admin')
{{--Change  menu itrm  and contant--}}
@section('title')
    {{ trans('hrm::cruds.employee.title') }}
@endsection



@push('styles')

@endpush

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb" style="background: #fff;">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>

    </ol>
</nav>
@section('content')
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="dashboard-info row">
                                <div class="info-text col-md-6" @if(App::isLocale('ar')) style="text-align: right" @endif>

                                    @auth
                                        <h5 class="card-title">Welcome back {{auth()->user()->username}}!</h5>

                                        @if(check_right('endorsements','Add'))
                                            <p><b> @if(App::isLocale('ar')) نعم لديك صلاحية اضافة ملحق@else YES you have permission to Add Endorsements!!! @endif</b></p>

                                        @else
                                            <p> <b>Oops you Don't have permission to Add Endorsements</b></p>
                                        @endif
                                    @else
                                        <h5 class="card-title">Welcome back Anna!</h5>
                                        <p>Get familiar with dashboard, here are some ways to get started.</p>
                                    @endauth

                                    <ul>
                                        @auth
                                            <li>Email : {{auth()->user()->email}}</li>
                                            <li>Mobile : {{auth()->user()->mobile}}</li>
                                            <li>Type : {{auth()->user()->member_type}}</li>
                                        @else
                                        <li>Check some stats for your website bellow</li>
                                        <li>Sync content to other devices</li>
                                        <li>You now have access to File Manager app.</li>
                                        @endauth
                                    </ul>
                                    <a href="{{WEBLINK}}/profile_dashboard.php" class="btn btn-warning m-t-xs" target="_parent">My Profile</a>
                                </div>
                                <div class="info-image col-md-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="">--}}
{{--                                <div class="">--}}
{{--                                    <h5 class="card-title">Daily Visitors</h5>--}}
{{--                                    <div class="profile-img" >--}}
{{--                                        <img src="{{asset('assets/images/avatars/avatar3.png')}}" width="50%">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="">
                                    <h5 class="card-title">Requests From Last 10 Days</h5>
                                    <canvas id="visitorsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="card-body">
                            <h5 class="card-title">New Clients</h5>
                            <h2 class="float-right">45.6K</h2>
                            <p>From last week</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="card-body">
                            <h5 class="card-title">Policies</h5>
                            <h2 class="float-right">14.3K</h2>
                            <p>Policies in waitlist</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="card-body">
                            <h5 class="card-title">Monthly Profit</h5>
                            <h2 class="float-right">45.6$</h2>
                            <p>For last 30 days</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center" style="background-color: #c2dfff;">

                        <div class="card-body">
                            <h5 class="card-title">Endorsements</h5>
                            <p class="card-text">An amendment or special clause to a document or contract.</p>
                            <a href="{{WEBLINK}}/endorsements_list.php" class="btn btn-info" target="_parent">Go There</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center" style="background-color: #c2dfff;">

                        <div class="card-body">
                            <h5 class="card-title">Client Statement</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="{{WEBLINK}}/endorsements_list.php" class="btn btn-info" target="_parent">Go There</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center" style="background-color: #c2dfff;">

                        <div class="card-body">
                            <h5 class="card-title">Commission Statement</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                            <a href="{{WEBLINK}}/endorsements_list.php" class="btn btn-info" target="_parent">Go There</a>
                        </div>

                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Last Transactions</h5>--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">ID</th>--}}
{{--                                        <th scope="col">Company</th>--}}
{{--                                        <th scope="col">Amount</th>--}}
{{--                                        <th scope="col">Status</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>0776</td>--}}
{{--                                        <td>Sale Management</td>--}}
{{--                                        <td>$18, 560</td>--}}
{{--                                        <td><span class="badge badge-success">Finished</span></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>0759</td>--}}
{{--                                        <td>Dropbox</td>--}}
{{--                                        <td>$40, 672</td>--}}
{{--                                        <td><span class="badge badge-warning">Waiting</span></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>0741</td>--}}
{{--                                        <td>Social Media</td>--}}
{{--                                        <td>$13, 378</td>--}}
{{--                                        <td><span class="badge badge-info">In Progress</span></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>0740</td>--}}
{{--                                        <td>Envato Market</td>--}}
{{--                                        <td>$17, 456</td>--}}
{{--                                        <td><span class="badge badge-info">In Progress</span></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>0735</td>--}}
{{--                                        <td>Graphic Design</td>--}}
{{--                                        <td>$29, 999</td>--}}
{{--                                        <td><span class="badge badge-secondary">Canceled</span></td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Social Media</h5>--}}
{{--                            <div class="social-media-list">--}}
{{--                                <div class="social-media-item">--}}
{{--                                    <div class="social-icon twitter">--}}
{{--                                        <i class="fab fa-twitter"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="social-text">--}}
{{--                                        <p>It’s kind of fun to do the impossible...</p>--}}
{{--                                        <span>4 November, 2019</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="social-media-item">--}}
{{--                                    <div class="social-icon google">--}}
{{--                                        <i class="fab fa-google-plus-g"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="social-text">--}}
{{--                                        <p>Sometimes by losing a battle you find a new way to win the war...</p>--}}
{{--                                        <span>26 October, 2019</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="social-media-item">--}}
{{--                                    <div class="social-icon facebook">--}}
{{--                                        <i class="fab fa-facebook-f"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="social-text">--}}
{{--                                        <p>To improve is to change; to be perfect is to change often...</p>--}}
{{--                                        <span>12 October, 2019</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="social-media-item">--}}
{{--                                    <div class="social-icon facebook">--}}
{{--                                        <i class="fab fa-facebook-f"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="social-text">--}}
{{--                                        <p>If you're going through hell, keep going...</p>--}}
{{--                                        <span>29 September, 2019</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="alert alert-warning m-b-lg" role="alert">--}}
{{--                        Data has been updated 23 min ago.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Popular Products</h5>--}}
{{--                            <div class="popular-products">--}}
{{--                                <canvas id="productsChart">Your browser does not support the canvas element.</canvas>--}}
{{--                                <div class="popular-product-list">--}}
{{--                                    <ul class="list-unstyled">--}}
{{--                                        <li id="popular-product1">--}}
{{--                                            <span>Alpha - Material Design</span>--}}
{{--                                            <span class="badge badge-pill badge-success">59%</span>--}}
{{--                                        </li>--}}
{{--                                        <li id="popular-product2">--}}
{{--                                            <span>Space - Light Theme</span>--}}
{{--                                            <span class="badge badge-pill badge-warning">15%</span>--}}
{{--                                        </li>--}}
{{--                                        <li id="popular-product3">--}}
{{--                                            <span>Modern - Admin Dashboard</span>--}}
{{--                                            <span class="badge badge-pill badge-secondary">26%</span>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="alert alert-info" role="alert">--}}
{{--                                        Based on last week's earnings.--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Earnings</h5>--}}
{{--                            <div id="apex1"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
{{--    <div class="lime-footer">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <span class="footer-text">2019 © stacks</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection





@push('scripts')
    <script src="{{asset('assets/plugins/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/lime.min.js')}}"></script>
    <script >
        $(document).ready(function() {

            "use strict";
            var ctx = document.getElementById('visitorsChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Requests', 'Requests', 'Requests', 'Requests', 'Requests', 'Requests', 'Requests', 'Requests', 'Requests', 'Requests'],
                    datasets: [{

                        label: 'Total',
                        data: [3, 6, 4, 5, 6, 5, 3, 5, 6, 5],
                        backgroundColor: '#5780F7'
                    }, {
                        label: 'Unique',
                        data: [2, 4, 2, 4, 2, 4, 2, 4, 2, 4],
                        backgroundColor: '#F4F4F5'
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: 0 // place legend on the right side of chart
                    },
                    scales: {
                        yAxes: [{
                            display: 0,
                            stacked: true,
                            ticks: {
                                display: 0
                            },
                            gridLines: {
                                color: "rgba(255,255,255,0)"
                            }
                        }],
                        xAxes: [{
                            display: 0,
                            stacked: true,
                            ticks: {
                                display: 0
                            },
                            gridLines: {
                                color: "rgba(255,255,255,0)"
                            }
                        }]
                    }
                }
            });




        });

    </script>
@endpush
