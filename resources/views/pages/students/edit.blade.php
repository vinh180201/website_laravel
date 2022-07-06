<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="{{url('css/student.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<body>

<!-- Edit Modal HTML -->
<div>
    <div class="modal-dialog">
        <div >
            <form type="submit" action="/student/{{$student->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Student</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{$student->name}}">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input name="age" type="text" class="form-control" value="{{$student->age}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" type="text" class="form-control" value="{{$student->address}}">
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input name="birthday" type="date" class="form-control" value="{{$student->birthday}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" onclick="history.back()">Go Back</button>
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<script src="{{url('js/student.js')}}"></script>
