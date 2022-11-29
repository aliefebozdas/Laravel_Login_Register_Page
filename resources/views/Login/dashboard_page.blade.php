<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!--Stylesheet-->

</head>
<body>
<div>
    <h1>Welcome to Dasboard !!</h1>
    <hr>
    <table style="border:1px">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        @foreach($user as $data)
            <tr>
                <td>{{$data['id']}}</td>
                <td>{{$data['name']}}</td>
                <td>{{$data['email']}}</td>
                <td>
                    <a href={{"/home/dashboard/delete/".$data['id']}}>Delete</a>
                    <a href={{"/home/dashboard/edit/".$data['id']}}>Edit</a>
                </td>

            </tr>
        @endforeach
    </table>
    <a href="login_page.blade.php">Log Out</a>









</div>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>

@include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
</html>
