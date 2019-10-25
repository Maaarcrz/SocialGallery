<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
			body{
			    background:#1f9eff;
			    margin:0
			}

			form{
			    width:380px;
			    height:200px;
			    background:#e6e6e6;
			    border-radius:9px;
			    box-shadow:0 0 40px -10px #000;
			    margin:calc(50vh - 220px) auto;
			    padding:20px 30px;
			    max-width:calc(100vw - 40px);
			    box-sizing:border-box;
			    font-family:'Montserrat',sans-serif;
			    position:relative;
			}

			h1{
				margin: 0 auto;
				text-align: center;
				padding-top: 50px;
			    padding-bottom:15px;
			    width:100px;
			    color: white;
			    font-family: calibri;
			    border-bottom:1px solid white;
			}

			input{
			    width:100%;
			    padding:10px;
			    box-sizing:border-box;
			    background:none;outline:none;
			    resize:none;border:0;
			    font-family:'Montserrat',sans-serif;
			    transition:all .3s;
			    border-bottom:2px solid #bebed2;
			}

			input:focus{
			    border-bottom:2px solid #78788c;
			}

			p:before{
			    content:attr(type);
			    display:block;
			    margin:28px 0 0;
			    font-size:14px;
			    color:#5a5a5a;
			}

			.button{
			    float: left;
			    padding:8px 12px;
			    margin:2px 0 0;
			    font-family:'Montserrat',sans-serif;
			    border:2px solid #78788c;
			    background:0;color:#5a5a6e;
			    cursor:pointer;
			    transition:all .3s;
			}

			.button:hover{
			    background:#1f9eff;
			    color:#fff;
			}
	</style>
<script type="text/javascript" src="./services/javascript.js"></script>
</head>
<body>
	<h1>Login</h1>
	<form method="POST" action="./services/login.proc.php" onsubmit="return validacionFormulario()">
		<input type="text" name="user" placeholder="Inserta el usuario..." id="user"><br/>
		<input type="password" name="password" placeholder="Inserta el password" id="password"><br/><br>
		<input class="button" type="submit" name="Enviar">
	</form>

</body>
</html>