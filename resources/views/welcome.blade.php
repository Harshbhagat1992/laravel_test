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
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/additional-methods.min.js') }}"></script>
        <!-- Styles -->
        <style>
            .error{
                color:red;
            }
        </style>
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
            @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}"> 
                {!! session('message.content') !!}
                </div>
            @endif
            </div>            
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avtar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Join Date</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <th scope="row"><img width="100" src="{{ asset('uploads').'/'.$user->image}}" class="img img-responsive"></th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->joining_date }}</td>
                        <td>
                        <?php
                            $date1 = new DateTime(".$user->leaving_date.");
                            $date2 = new DateTime(".$user->joining_date.");
                            $diff = $date1->diff($date2);                       
                            echo $diff->y . " years, " . $diff->m." months";
                        ?>
                        <td>
                        <td><a href="{{ route('delete', ['id' => $user->id]) }}" onclick="return confirm('Are you sure?')"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>        
            <div class="col-md-12 text-center">
            {{ $users->links() }}
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
                <form id="commentForm" action="/storeData" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control required email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Full Name:</label>
                        <input type="text" name="name" class="form-control required" id="name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date of Joining</label>
                        <input type="date" name="joining_date" class="form-control required" id="joining_date">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date of Leaving</label>
                        <input type="date" name="leaving_date" class="form-control leave" id="leaving_date">
                    </div>
                    <div class="checkbox">
                        <label><input name="working" class="leave" id="working" value= "1" type="checkbox"> Still working</label>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Upload Image</label>
                        <input type="file" name="photo" class="form-control required" id="photo">
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
    <script>
        $(document).ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate({
            rules: {
                leaving_date: {
                require_from_group: [1, ".leave"]
                },
                working: {
                require_from_group: [1, ".leave"]
                },
                photo: {
                    required: true,
                    extension: "jpg|jpeg|png"
                }
            }
        });
        });
    </script>
</html>
