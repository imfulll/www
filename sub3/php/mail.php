<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

  <title>효성 | 제보하기</title>
</head>
</html>

<?php
 
 $name_01=$_POST['uname'];
 $mail_02=$_POST['email'];
 $phone_03=$_POST['phone'];
 $subject_04=$_POST['subject'];
 $msg_05=$_POST['message'];

//  if($subject_04 == 1){
//     $subject_04 = '윤리강령 및 법규 위반';
//  } else if($subject_04 == 2){
//     $subject_04 = '금품∙향응 요구 및 수수';
//  } else if($subject_04 == 3){
//     $subject_04 = '공정거래 위반';
//  } else if($subject_04 == 4){
//     $subject_04 = '인권 침해';
//  } else if($subject_04 == 5){
//     $subject_04 = '투명성 결여';
//  } else if($subject_04 == 6){
//     $subject_04 = '협력사 고충사항';
//  } else if($subject_04 == 7){
//     $subject_04 = '기타';
//  } else if($subject_04 == null){
//     $subject_04 = '선택안함';
//  }
 
 $to='jgdeuk5967@naver.com';
 $subject='효성그룹 사이트에서 관리자에게 보낸 메일';
 $msg=
    "보낸사람:$name_01\n". 
    "보낸사람메일주소:$mail_02\n".
    "보낸사람전화번호:$phone_03\n".
    "제보분야:$subject_04\n".
    "내용:$msg_05\n";
 
 mail($to,$subject,$msg,'보낸사람메일주소:'.$mail_02);   

echo "<script>
        alert('성공적으로 메일이 전송되었습니다.');
        //history.go(-1);
        location.href='../sub3_5.html' ;
        
</script>
"
 

 /*
 echo '이름:'.$name_01.'<br />';
 echo '메일:'.$mail_02.'<br />';
 echo '메일:'.$phone_03.'<br />';
 echo '내용:'.$msg_04.'<br />';
 echo '메일이 성공적으로 전송되었습니다<br />';
 */
?>



