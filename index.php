<?php
  $error = array();
  if($_SERVER["REQUEST_METHOD"] === "POST"){
      if(empty($_POST["email"])){  //"" == false
          array_push($error, "注意 email 为必填项");
     }else{
        $email = checkValue($_POST["email"]);   //规范处理输入的内容
        //1007486612@qq.com
        if(!preg_match("/^\w+@\w+\.\w+$/", $email)){
            array_push($error, "邮箱输入不合法");
        }
     }

     /*
     //  创建一个正则模式
     \w  代表一个字符的范围 [0-9 a-z A-Z _]
     +   一个或者多个
     ^   字符的起始位置
     $   字符的结束位置
     .   任意字符
     \.  转义把 "." 当成普通的字符
     \d  一个字符的范围[0-9]
     {N}  这个字符允许出现多少个
     {n,} 这个字符允许出现多少N个以上
     */

      if(empty($_POST["mobile"])){  //"" == false
        array_push($error, "注意 mobile 为必填项");
     }else{
        $mobile = checkValue($_POST["mobile"]);   //规范处理输入的内容
        //13786188440
        if(!preg_match("/^1\d{10}$/", $mobile)){
            array_push($error, "手机号码输入不合法");
        }
     }


    if(empty($_POST["password"])){  //"" == false
        array_push($error, "注意 password 为必填项");
    }else{
        $password = checkValue($_POST["password"]);   //规范处理输入的内容
        //123456  
        if(!preg_match("/^\w{6,}$/", $password)){
            array_push($error, "密码输入不合法");
        }
     }
  }

  function checkValue($value){
       $data = trim($value);   //移除字符串两侧的空白字符
       $data = htmlspecialchars($data);  // 把预定义的字符转化为HTML实体。
       return $data;
  }
   
  $message = <<<EOT
   <script>alert('$error[0]'); history.go(-1);</script>
  EOT;

  if(count($error) > 0){
      echo $message;
  } else {
    echo "注册成功";
  }

?>
