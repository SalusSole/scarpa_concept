<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
            $username=$_POST['username'];
	        $pass=$_POST['password'];
            
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				
                if($pass==$r['password']){
                    $_SESSION['id']=$r['id'];
                    $_SESSION['username']=$r['username'];
                    $_SESSION['rol']=$r['rol'];
                    
                    $user_id=$r["id"];
                   // echo '<script>alert("BIENVENIDO USUARIO")</script> ';
                  	print "<script>window.location='../index.php';</script>";	

                }
				break;
			}
            
            $sql12= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query2 = $con->query($sql12);
			while ($r2=$query2->fetch_array()) {
				
                if($pass==$r2['passadmin']){
                    $_SESSION['id']=$r2['id'];
                    $_SESSION['username']=$r2['username'];
                    $_SESSION['rol']=$r2['rol'];
                    
                    $user_id=$r2["id"];
                    echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
                  	print "<script>window.location='../index.php';</script>";	

                }
				break;
			}
            
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../index.php';</script>";				
			}
		}
	}
} 


//include("connect_db.php");

//$miconexion = new connect_db;


?>