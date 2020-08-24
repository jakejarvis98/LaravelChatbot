<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Information Checking System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- External style sheet-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            

            <div class="content">
<!--
                <div class="title m-b-md">
                    Laravel
                </div>
-->

                <h1>Information Checking System</h1>
                
                <div class="btn-group">
                    <div class="dropdown show" id="category">
                        <a class="btn btn-secondary dropdown-toggle" href="#" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <a class="dropdown-item" href="/category/{{ 'sports' }}">Sports</a>
                            <a class="dropdown-item" href="/category/{{ 'entertainment' }}">Entertainment</a>
                            <a class="dropdown-item" href="/category/{{ 'business' }}">Business</a>
                            <a class="dropdown-item" href="/category/{{ 'trending' }}">Trending</a>
                        </div>
                    </div>
                    
                    <div class="dropdown show" id="industry">
                        <a class="btn btn-secondary dropdown-toggle" href="#" id="industryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Industry</a>
                        <div class="dropdown-menu" aria-labelledby="industryDropdown">
                            <a class="dropdown-item" href="/industry/{{ 'film' }}">Film</a>
                            <a class="dropdown-item" href="/industry/{{ 'music' }}">Music</a>
                            <a class="dropdown-item" href="/industry/{{ 'medicine' }}">Medicine</a>
                            <a class="dropdown-item" href="/industry/{{ 'agriculture' }}">Agriculture</a>
                        </div>
                    </div>
                        
                    <div class="dropdown show" id="activity_date">
                        <a class="btn btn-secondary dropdown-toggle" href="#" id="dateDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Date</a>
                        <div class="dropdown-menu" aria-labelledby="dateDropdown">
                            <a class="dropdown-item" href="/date/{{ 'today' }}">Today</a>
                            <a class="dropdown-item" href="/date/{{ 'this_week' }}">This week</a>
                            <a class="dropdown-item" href="/date/{{ 'this_month' }}">This month</a>
                            <a class="dropdown-item" href="/date/{{ 'this_year' }}">This year</a>
                        </div>
                    </div>
<!--
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
-->
                </div>
                
                <div>
                    <a href="/submit">Have information to submit?</a>
                </div>
                
                <div>
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Event Name</th>
                            <th>Category</th>
                            <th>Industry</th>
                            <th>Keyword(s)</th>
                            <th>Activity Date</th>
                            <th>Expiry Date</th>
                            <th>Related Agency</th>
                            <th>Numerical Value</th>
<!--                            <th>Other Details</th>-->
                            <th>Enabled?</th>
<!--                            <th>Date Created</th>-->
                            <th>Last Modified</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($infos as $info)
                        <tr>
                            <td>{{ $info->id }}</td>
                            <td>{{ $info->info_name }}</td>
                            <td>{{ $info->event_name }}</td>
                            <td>{{ $info->category }}</td>
                            <td>{{ $info->industry }}</td>
                            <td>{{ $info->keywords }}</td>
                            <td>{{ $info->activity_date }}</td>
                            <td>{{ $info->expiry_date }}</td>
                            <td>{{ $info->related_agency }}</td>
                            <td>{{ $info->numerical_value }}</td>
<!--                            <td>{{ $info->other_details }}</td>-->
                            <td>{{ $info->enabled }}</td>
<!--                            <td>{{ $info->created_at }}</td>-->
                            <td>{{ $info->updated_at }}</td>
                            <td><a href="/view/{{ $info->id }}">View</a>    <a href="/delete/{{ $info->id }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
