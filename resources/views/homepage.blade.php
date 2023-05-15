<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<style>
    body{
        background-image:url('img/fauzi.jpeg') ;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0%;
        padding : 0% ;
        font-family:Arial, Helvetica, sans-serif, sans-serif ;
    }
   .container {
    max-width: 1000px;
    margin: auto ;
    display: flex ;
    flex-direction: column ;
    align-items: center ;
    justify-content: center ;
    height: 100vh;
   }
   .btn-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


   .btn {

    color: black ;
    padding: 1rem 2rem ;
    font-size: 1.2rem ;
    border: none ;
    border-radius: 5px ;
    cursor: pointer;
    transition: all 0.2s ease-in-out ;
   }
</style>
<body>
    <div class="btn-container">
        <a href="http://127.0.0.1:8000/login" class="btn btn-primary">Login</a>
        <a href="http://127.0.0.1:8000/signup" class="btn btn-success">Register</a>

    </div>


</body>
</html>
