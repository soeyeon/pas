<?php

        session_start();

        $db = mysqli_connect('127.0.0.1', 'root', '', 'login');
        $id=$_GET['id'];
        $pw=$_GET['pw'];
        $email=$_GET['em'];

        //아이디가 있는지 검사
        $query = "select * from user where id='$id'";
        $result = $db->query($query);


        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($result)==1) {

                $row=mysqli_fetch_assoc($result);

                //비밀번호가 맞다면 세션 생성
                if($row['password']==$pw){
                        $_SESSION['id']=$id;
                        if(isset($_SESSION['id'])){
                        ?>      <script>
                                        alert("로그인 되었습니다.");
                                        location.replace("./data.html");
                                </script>
<?php
                        }
                        else{
                                echo "session fail";
                        }
                }

                else {
        ?>              <script>
                                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                                history.back();
                        </script>
        <?php
                }

        }

                else{
?>              <script>
                        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        history.back();
                </script>
<?php
        }

?>