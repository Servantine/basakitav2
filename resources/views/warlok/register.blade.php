<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Register Warga Lokal</title>
     <style>
          body{
              background-image:url('https://recyclesmartma.org/wp-content/uploads/2018/10/RecycleMass-03.jpg');
              background-size: cover;
              background-repeat: no-repeat;
              background-attachment: fixed;
              font-family: Arial, Helvetica, sans-serif;
              font-size: 20px;
              
          }
          .rolestext{
               visibility: hidden;
          }
          .register{
              background-color: rgba(215, 215, 215, 0.7);
              margin-left: 35%;
              margin-right: 30%;
              margin-top: 10%;
              margin-bottom: 5%;
              border-radius: 20px;
          }
          #register-title{
              padding-top: 70px;
              padding-left: 20px;
              font-size: 35px;
              margin-bottom: 2px;
              color: rgb(54, 69, 79);
              
          }
          #register-description{
              font-size: 20px;
              padding-left: 40px;
              color: rgb(54, 69, 79);
              font-family: Arial, Helvetica, sans-serif;
              font-weight: bold;
          }
          input[type=text] {
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
          
  
          #register-textfield{
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
          input[type="radio"] {
               display: none;
          }
          input[type="radio"] + label {
               background-color: rgb(255, 255, 255);
          }
          input[type="radio"]:checked + label {
               color: #495057;
               font-weight: bold;
               background-color: #9EB384;
          }

          input[type="radio"] + label {
               padding: 5px 20px;
               border-radius: 10px;
          }
          input[type="date"]{
               padding: 5px 20px;
               border-radius: 10px;
               font-weight: bold;
               border: 0px;
          }
          
  
      </style>
</head>
<body>
     <div class="register">
          <center>
               <div id="register-title">
                    <b> Pendaftaran Warga Lokal </b>
               </div>
          </center>

          <br>
          <div id="register-description">
               Silahkan masukkan data sesuai di form yang tersedia
          </div>
          <br>
          <form action="simpanuser" method="POST">
               @csrf
               <div id="register-textfield">
                    <b> Nama Lengkap </b>
                    <br>
                    <br>
                    <input type="text" name="name">
                    <br>
                    <br>
                    <b> Jenis Kelamin </b>
                    <br>
                    <br>
                    <input type="radio" id="lakilaki" checked='checked' value="laki-laki" name="gender">
                    <label for="lakilaki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="gender" value="perempuan">
                    <label for="perempuan">Perempuan</label>
                    <br>
                    <br>
                    <b> Tanggal Lahir </b>
                    <br>
                    <br>
                    <input type="date" id="tanggallahir" name="tanggallahir">
                    <br>
                    <br>
                    <b> Alamat </b>
                    <br>
                    <br>
                    <input type="text" name="alamat">
                    <br>
                    <br>
                    <b> Email </b>
                    <br>
                    <br>
                    <input type="email" name="email">
                    <br>
                    <br>
                    <b> Password </b>
                    <br>
                    <br>
                    <input type="password" name="password">
                    <br>
                    <br>
                    <div class="rolestext">
                         <input type="text" name="roles" value="wargalokal" readonly>
                         <input type="text" name="langganan" value="null" readonly>
                    </div>
                    <b> Sudah mempunyai akun? silahkan login di <a href="/login"> <u>DISINI</u></a></b>
                    <br>
                    <br>
                    <br>
                    <button type="submit"> Daftar </button>
               </div>
          </form>
     </div>
     
</body>
</html>