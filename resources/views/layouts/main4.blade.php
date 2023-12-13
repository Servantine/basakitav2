
<style>
     /* ===============================Dashboard Pemilik================================================== */
     @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
     *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          list-style: none;
          text-decoration: none;
          font-family: 'Josefin Sans', sans-serif;
     }
     body{

          background: #f3f9f5;


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
     .wrapper{
          display: flex;
          position: relative;

     }

     .wrapper .sidebar{
          position: fixed;
          width: 200px;
          height: 100%;
          background: rgb(0, 16, 68);
          padding: 30px 0;

     }
     .wrapper .sidebar h2{
          color: #ffffff;
          text-transform: uppercase;
          text-align: center;
          margin-bottom: 30px;
     }
     .wrapper .sidebar ul li{
          padding: 15px;

     }

     .wrapper .sidebar ul li a{
          color: rgb(255, 255, 255);
     }

     .wrapper .sidebar ul li a .fas{
          width: 25px;
     }

     .wrapper .sidebar ul li:hover{
          background-color: #4b5dff;
     }
     
     .wrapper .sidebar ul li:hover a{
          color: #fff;
     }
     
     .wrapper .sidebar .social_media{
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
          display: flex;
     }

     .wrapper .sidebar .social_media a{
          display: block;
          width: 40px;
          background: #594f8d;
          height: 40px;
          line-height: 45px;
          text-align: center;
          margin: 0 5px;
          color: #bdb8d7;
          border-top-left-radius: 5px;
          border-top-right-radius: 5px;
     }

     .wrapper .main_content{
          width: 100%;
          margin-left: 200px;
     }

     .wrapper .main_content .header{
          padding: 20px;
          background: #fff;
          color: #717171;
          border-bottom: 1px solid #e0e4e8;
     }

     .wrapper .main_content .info{
          margin: 20px;
          color: #717171;
          line-height: 25px;
     }

     .wrapper .main_content .info div{
          margin-bottom: 20px;
     }
     .wrapper .main_content .info .content{
          background-color: #fafafa;
          height: 100%;
     }
     
</style>

     <body>
     <div class="wrapper">
          <div class="sidebar">
              <h2>BASAKITA</h2>
              <ul>
               <a href="http://127.0.0.1:8000/pemilik"> <li> Home </li> </a>
               <a href="http://127.0.0.1:8000/kelolabanksampah"> <li> Kelola Bank Sampah </li></a>
               <a href="http://127.0.0.1:8000/permintaansampah"> <li> Permintaan Sampah </li></a>
               <a href="http://127.0.0.1:8000/riwayatmasuk"> <li> Riwayat Pengantaran </li></a>
               <a href="#"><li> Luaran </li></a>
               <a href="http://127.0.0.1:8000/logout"><li> Keluar </li></a>
          </div>
     </body>
