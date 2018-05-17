<?php
//Register( Name,id number), Borrow Loan ( Enter amount to borrow), Repay Loan, Check Loan Balance( )
//Cannot borrow a loan if balance >0
$phone=$_POST["phoneNumber"];
$text=$_POST["text"];
$response="";
$results= explode('*', $text);
if ($text=="")//*544#
{
    $response="CON 1.Register\n2.Request loan\n3.Repay loan\n4.Check loan Balance\n5.Check Loan history";
}elseif ($text=='1')//text=1
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT * FROM users WHERE phone='$phone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $response="END Your are already registered";
    }else{
        $response="CON Your Last name";
    }

}elseif ($results[0]=='1' and count($results)==2)//text=1*Adrian
{
    $response="CON Your first name";
}elseif ($results[0]=='1' and count($results)==3)//text=1*Adrian*kamau
{
    $response="CON Orther names";
}
elseif ($results[0]=='1' and count($results)==4)//text=1*Adrian*kamau*kubai
{
    $response="CON Enter Your ID number";
}elseif ($results[0]=='1' and count($results)==5)//text=1*Adrian*kamau*kubai*234343
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="INSERT INTO `users`( `phone`, `lastname`, `firstname`, `orthernames`, `idnumber`)
                       VALUES ('$phone','$results[1]','$results[2]','$results[3]','$results[4]')";
    $result=mysqli_query($conn,$sql);
    if ($result){
        $response="END Thank You $results[1] you have been Registered successfully and can now request your first loan";
    }else{
        $response="END An error occurred during registration please try again later";
    }
}
elseif ($text=='2')//text=2
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT * FROM users WHERE phone='$phone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $conn=mysqli_connect("localhost","root","","refugees");
        $sql="SELECT requestedloan FROM loans WHERE phone='$phone'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result);
            extract($row);
        if ($requestedloan>0){
         $response="END Please repay your first loan to continue enjoying this service";
        }else{
            $response="CON Enter amount to borrow";
        }
        }else{
            $response="CON Enter amount to borrow";

        }

    }else{
        $response="END Please register to enjoy this service";
    }
}
elseif ($results[0]=='2' and count($results)==2)//text=2*500
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT * FROM loans WHERE phone='$phone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $conn=mysqli_connect("localhost","root","","refugees");
        $requestedloan=$results[1]*1.1;
        $sql="UPDATE loans SET requestedloan='$requestedloan'  WHERE phone='$phone'";
        $loangranted=mysqli_query($conn,$sql);
        if ($loangranted){
            $response="END Your Loan Has been Granted";
        }else{
            $response="END  Loan not Granted";

        }

    }else{
        $conn=mysqli_connect("localhost","root","","refugees");
        $requestedloan=$results[1]*1.1;
        $sql="INSERT INTO loans values ('','$phone','$requestedloan')";
        $loangranted=mysqli_query($conn,$sql);
        if ($loangranted){
            $response="END Your Loan Has been Granted";
        }else{
            $response="END  Loan not Granted";
        }
    }
}elseif ($text=='3')//text=3
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT * FROM loans WHERE phone='$phone' and 	requestedloan>0";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $response="CON Enter amount to repay";
    }else{
        $response="END Your do not have an outstanding loan debt";
    }

}elseif ($results[0]=='3' and count($results)==2)//text=3*500
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT requestedloan FROM loans WHERE phone='$phone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        extract($row);
        if ($results['1'] <= $requestedloan){
            $conn=mysqli_connect("localhost","root","","refugees");
            $query="UPDATE loans SET requestedloan=requestedloan-$results[1] WHERE phone='$phone'";
            $result=mysqli_query($conn,$query);
            if ($result){
                $response="END Your loan was updated successfully";

            }else{
                $response="END Loan not updated Please try again";

            }
        }elseif ($results['1'] > $requestedloan){
            $conn=mysqli_connect("localhost","root","","refugees");
            $query="UPDATE loans SET requestedloan=0 WHERE phone='$phone'";
            $result=mysqli_query($conn,$sql);
            if ($result){
                $response="END Your loan was balance is now fully paid";
            }else{
                $response="END Loan not paid";

            }
        }else{
            $response="END Please try again";
        }
    }
}
elseif ($text=='4')//text=4
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT requestedloan FROM `loans` WHERE phone='$phone'";
    $balance=mysqli_query($conn,$sql);
    if (mysqli_num_rows($balance)>0){
        $row=mysqli_fetch_assoc($balance);
        extract($row);
        $response="END Your loan balance is $requestedloan";
    }else{
        $response="Error could not find any results";
    }

}
elseif ($text=='5')//text=5
{
    $conn=mysqli_connect("localhost","root","","refugees");
    $sql="SELECT * FROM `history` WHERE phone='$phone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        extract($row);
        $response="";

    }

}











header("Content-type:text/plain");
echo $response;