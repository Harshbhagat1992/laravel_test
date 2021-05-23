<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- Styles -->
        <!-- <style>
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
        </style> -->
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>User Table</h3>
            </div>
            <div class="col-md-4">
               <h3><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">Add User</button></h3>
            </div>
            <div class="col-md-12">
            @foreach ($errors->all() as $error)
               <span class="text-danger"> {{ $error }} </span><br/>
            @endforeach
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <form action="/storeData" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Full Name:</label>
                        <input type="text" name="name" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date of Joining</label>
                        <input type="date" name="joining_date" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date of Leaving</label>
                        <input type="date" name="leaving_date" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label><input value= "1" type="checkbox"> Still working</label>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Upload Image</label>
                        <input type="file" name="user_image" class="form-control" id="pwd">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
        </div>
    </body>
</html>
