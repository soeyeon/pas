<?php

        $db = mysqli_connect('127.0.0.1', 'root', '', 'login');

        $id=$_GET['id'];
        $pw=$_GET['pw'];
        $email=$_GET['em'];

        $date = date('Y-m-d H:i:s');
        $query = "insert into user (id, password, email) values ('$id', '$pw', '$email')";

        $result = $db->query($query);

        if($result) {
        ?>      <script>
                alert('가입 되었습니다.');
                location.replace("./login.html");
                </script>

<?php   }
        else{
?>              <script>
                        
                        alert("fail");
                </script>
<?php   }

        mysqli_close($db);
?>