<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang Penyampah</title>
    <style>
        body{
            background-image:url('https://recyclesmartma.org/wp-content/uploads/2018/10/RecycleMass-03.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            
        }
        .login{
            background-color: rgba(215, 215, 215, 0.7);
            margin-left: 35%;
            margin-right: 30%;
            margin-top: 10%;
            margin-bottom: 5%;
            border-radius: 20px;
        }
        #login-title{
            padding-top: 70px;
            padding-left: 40px;
            font-size: 35px;
            margin-bottom: 2px;
            color: rgb(54, 69, 79);
        }
        #login-description{
            font-size: 20px;
            padding-left: 40px;
            color: rgb(54, 69, 79);
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        input[type=email] {
            width: 80%;
            border-width: 0px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-top: 10px;
            padding-left: 5px;
            margin: 3px;
            box-sizing: border-box;
            outline: none;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
        }
        input[type=password] {
            width: 80%;
            border-width: 0px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-top: 10px;
            padding-left: 5px;
            margin: 3px;
            box-sizing: border-box;
            outline: none;
            border-radius: 10px;
            font-size: 15px;
        }

        input[type="checkbox"] {
            transform: scale(1.5);
            border-width: 0px;
        }
        

        #login-textfield{
            font-size: 15px;
            padding-left: 50px;
            color: rgb(54, 69, 79);
        }

        button {
            color: white;
            background-color: #9EB384;
            cursor: pointer;
            border: 0;
            border-radius: 4px;
            font-weight: 600;
            margin: 0 10px;
            width: 80%;
            padding: 10px 0;
            margin-bottom:15%;
            box-shadow: 0 0 20px rgba(104, 85, 224, 0.2);
            transition: 0.4s;
        }
        

    </style>
</head>
</head>
<body>
    <div class="login">
            <div id="login-title">
                <b> Login </b>
            </div>
            <br>
            <div id="login-description">
                Silahkan masukkan email dan password <br>
                yang benar
            </div>
            <br>
            <form action="" method="POST">
               @csrf
                <div id="login-textfield">
                    <b> Email </b>
                    <br>
                    <br>
                    
                    <input type="email" name="email" autofocus>
                    <br>
                    <br>
                    <b> Password </b>
                    <br>
                    <br>
                    <input type="password" name="password">
                    <br>
                    <br>
                    {{-- <b> Masuk Sebagai </b>
                    <br>
                    <br>
                    <select name="roles">
                         <option value="warlok">Warga Lokal</option>
                         <option value="pengantar">Pengantar</option>
                         <option value="pemilik">Pemilik Bank Sampah</option>
                         <option value="admin">Admin</option>
                       </select>
                    <br>
                    <br> --}}
                    <input type="checkbox" name="rememberme">
                    <b> Remember Me</b>
                    <br>
                    <br>
                    <b> Belum mempunyai akun? silahkan buat di <a href="/register"> <u>DISINI</u></a></b>
                    <br>
                    <br>
                    <br>
                    <button type="submit"> Login </button>
                </div>
            </form>
    </div>
</body>

</html>
