 <?php
       include "koneksi.php";
       session_start();
       $user = $_POST['username'];
       $pass = md5($_POST['password']);

       $query = $conn->query("SELECT * FROM user WHERE username='$user' AND password='$pass'");
       $rows = mysqli_num_rows($query);
       $rows2 = mysqli_fetch_row($query);

       if ($rows == 1) {
              $_SESSION['id'] = $rows2[0];
              $_SESSION['level'] = $rows2[3];
              $_SESSION['username'] = $user;
              $_SESSION['password'] = $pass;
       ?>
        <script language="javascript">
               document.location = 'index.php';
        </script>
 <?php
       } else {
       ?>
        <script language="javascript">
               alert('Akun Tidak Ditemukan');
               document.location = 'index.php';
        </script>
 <?php
       }
       ?>