
                    @if(\Session::has('message'))
                        <div class="alert alert-info">
                            {{\Session::get('message')}}
                        </div>
                    @endif
{{-- menambahkan notif alert login --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./public//build/tailwind.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <title>LOGIN</title>
</head>
<body class="bg-yellow-100 overflow-x-hidden lg:overflow-x-auto lg:overflow-hidden flex items-center justify-center lg:h-screen">
  <!-- remove flex classes from body tag to remove the horizontal and vertical position -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <div class="login-container container w-full lg:w-4/5 lg:bg-white h-screen lg:h-screen-75 lg:border border-gray-300 rounded-lg flex flex-wrap lg:flex-nowrap flex-col lg:flex-row justify-between group">

    <!-- product Side -->
    <div class="w-full lg:w-1/2 h-28 lg:h-full mt-32 lg:mt-0 lg:bg-theme-yellow-dark flex relative order-2 lg:order-1">

      <div class="text-center hidden lg:flex items-center justify-start h-full w-full select-none">

        <span class="transform block whitespace-nowrap h-full -rotate-90 text-[55px] 2xl:text-[70px] font-black uppercase text-yellow-300 opacity-0 transition-all group-hover:opacity-100 ml-10 2xl:ml-12 group-hover:-ml-20 2xl:group-hover:ml-26 lg:group-hover:ml-20 duration-1000 lg:duration-700 ease-in-out">KOPERASI PINJAMAN</span>

      </div>
      <!-- product text -->

      <div class="product absolute right-0 bottom-0 flex items-center lg:justify-center w-full opacity-50 lg:opacity-100">

        <img src="./images/1.png" alt="product" class="-mb-5 lg:mb-0 -ml-12 lg:ml-0 product h-[500px] xl:h-[700px] 2xl:h-[900px] w-auto object-cover transform group-hover:translate-x-26 2xl:group-hover:translate-x-48 transition-all duration-1000 lg:duration-700 ease-in-out">
        <!-- product image -->

        <div class="shadow w-full h-5 bg-black bg-opacity-25 filter blur absolute bottom-0 lg:bottom-14 left-0 lg:left-24 rounded-full transform skew-x-10"></div>
        <!-- product shadow -->
      </div>

      <div class="hidden lg:block w-1/3 bg-white ml-auto"></div>

    </div>
    <!-- Product Side End-->

    <!-- Login Form -->
    <div class="w-full lg:w-1/2 order-1 lg:order-2">
      <div class="form-wrapper flex items-center lg:h-full px-10 relative z-10 pt-16 lg:pt-0">
        <div class="w-full space-y-5">

          <div class="form-caption flex items-end justify-center text-center space-x-3 mb-20">
            <span class="text-3xl font-semibold text-gray-700">Form</span>
            <span class="text-3xl font-semibold text-gray-700">Login</span>
          </div>
          <!-- form caption -->
          <form method="POST" action="{{ route('postlogin') }}">
            @csrf
          <div class="form-element">
            <label class="space-y-2 w-full lg:w-4/5 block mx-auto">
              <span class="block text-lg text-gray-800 tracking-wide">Email</span>
              <span class="block">
                <input type="text" placeholder="Enter your Email" id="email" class="bg-yellow-100 lg:bg-white border lg:border-2 border-gray-400 lg:border-gray-200 w-full p-3 focus:outline-none active:outline-none focus:border-gray-400 active:border-gray-400" name="email"
                                     autofocus>
                                     @if ($errors->has('email'))
                                     <script>
                                         swal({
                                             title: 'Error',
                                             text: '{{ $errors->first('email') }}',
                                             icon: 'error'
                                         });
                                     </script>
                                 @endif
              </span>
            </label>
          </div>
          <!-- form element -->


          <div class="form-element">
            <label class="space-y-2 w-full lg:w-4/5 block mx-auto">
              <span class="block text-lg text-gray-800 tracking-wide">Password</span>
              <span class="block">
                <input type="password" placeholder="Enter your Password" id="password" class="bg-yellow-100 lg:bg-white border lg:border-2 border-gray-400 lg:border-gray-200 w-full p-3 focus:outline-none active:outline-none focus:border-gray-400 active:border-gray-400" name="password">
                @if ($errors->has('password'))
                <script>
                    swal({
                        title: 'Error',
                        text: '{{ $errors->first('password') }}',
                        icon: 'error'
                    });
                </script>
            @endif

                <div class="text-center">
                    <p>Belum punya akun?
                        <a class="small" href="http://127.0.0.1:8000/signup">register</a>
                    </p></div>
                    <div class="text-center">
                        <p>lupa akun?
                            <a class="small" href="http://127.0.0.1:8000/reset">reset</a>
                        </p></div>
            </span>
            </label>
          </div>
          <!-- form element -->

          <div class="form-element"><br>
            <div class="w-full lg:w-4/5 block mx-auto flex items-center justify-between">
              <label class="block text-gray-800 tracking-wide flex items-center space-x-2 select-none">

              </label>

            </div>
          </div>

          <!-- form element -->

          <div class="form-element">
            <span class="w-full lg:w-4/5 block mx-auto ">
              <input type="submit" class="cursor-pointer border-2 border-yellow-200 w-full p-3 bg-yellow-200 focus:outline-none active:outline-none focus:bg-theme-yellow active:bg-theme-yellow hover:bg-theme-yellow transition-all">
            </span>
          </div>
          <!-- form element -->
        </form>
        </div>
      </div>
      <!-- form wrapper -->
    </div>
    <!-- Login Form End-->


  </div>

  <script src="./js/script.js"></script>
</body>
</html>
