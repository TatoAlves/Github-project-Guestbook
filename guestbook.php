<?php
          
        $servername = "arch-gamma.cloud.science.net";
        $username = "tato";
        $password = "feitolinux";
          
        $db = new mysqli ($servername, $username, $password, "guestbook");
          
        if($db->connect_error > 0) {
    	    die('Unable to connect to database [' . $db->connect_error . ']');
        }
//        echo "Connected successfully<br>\n";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tatos Guestbook</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilo.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>


<heading>
    <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
    <h1 title="Hello world is a joke...."> Hello world of guestbook!!!</h1>
    <p> Welcome to my first website in HTML5!</p>
      <div class="container">
        <p title="About guestbook">
	Guestbook  is a <del>paper</del> or electronic means for a <ins>visitor</ins> to acknowledge a visit to a site.</p>
          <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#readme">Read More</button>
            <div id="readme" class="collapse cnt">
              <p>On the Web, a guestbook is a logging system that allows visitors of a website to leave a public comment. It is possible in some guestbooks for visitors to express their thoughts about the website or its subject. Generally, they do not require the poster to create a user account, as it is an informal method of dropping off a quick message. The purpose of a website guestbook is to display the kind of visitors the site gets, including the part of the world they reside in, and gain feedback from them. This allows the webmaster to assess and improve their site. A guestbook is generally a script, which is usually remotely hosted and written in a language such as Perl, PHP, Python or ASP. Many free guestbook hosts and scripts exist.</p>

              <p>Names and addresses provided in guestbooks, paper-based or electronic, are frequently recorded and collated for use in providing statistics about visitors to the site, and to contact visitors to the site in the future.<p>
            </div>
      </div>
  </div>
</heading>

  <body>
    <div>
    
<?php
  
 if (isset($_POST['add_name'])) { print '<h2>Obrigado!</h2>'; }

?>
      
      <div>
        <div>

<?php


if (isset($_GET['del_name'])) {
	
	
	$foi = $_GET['id'];
	echo "query = delete from addguestbook where id = $foi<br>";
	
	if ($foi > 0){
	
	
	$del_row = "delete from addguestbook where ID = '$foi'";
	    
	    if ($db->query($del_row) === true) {
        	echo "Row deleted successfully!<br>\n";
	    }
	    else{
		echo "\nError to delete: " . $del_row . "<br>" . $db->error;
	    }
	
	    $list_sql = "select * from addguestbook";
	    
	    if ($result = $db->query($list_sql)) {
		echo "<table border='1px' align='center' cellpadding='0' cellspacing='0' class='listar-db'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Mensagem</th><th>Delete</th></tr>\n";
		
		while($row = $result->fetch_object()) {
		    echo "<tr><td>".$row->ID."</td><td>".$row->name."</td><td>".$row->email."</td><td>".$row->message."</td><td><a href='guestbook.php?del_name=1&id=".$row->ID."'>Delete</a></td></tr>\n";
		}
	
	    echo "</table>\n";
	
	    printf("Total %d rows. no momento<br>\n", $result->num_rows);
	    $result->close();
	} else {
	    echo "\nERROR: Tente de novo, pois deu ruim dessa vez." .$sql. "<br>" . $db->error;
	}
	$db->close();
	
	echo "<br><a href='index.html'>Voltar para pagina inicial</a>";
	}
	
}

if (isset($_POST['add_name'])) {
	
        $name =$_POST['seunome'];
        $email =$_POST['email'];
        $comment =$_POST['artxt'];
        
        
        $store_sql = "insert into addguestbook (name, email, message) values ('$name', '$email', '$comment')";
          
        if ($db->query($store_sql) === true) {
            echo "New record created successfully<br>\n";
	}
	else{
	    echo "\nError: " . $store_sql . "<br>" . $db->error;
	}
	
	$list_sql = "select * from addguestbook";

        echo "Usuarios ja cadastrados<br>\n";
	
	if ($result = $db->query($list_sql)) {
	    echo "<table border='1px' align='center' cellpadding='0' cellspacing='0' class='listar-db'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Mensagem</th></tr>\n";
	    
	    while($row = $result->fetch_object()) {
		echo "<tr><td>".$row->ID."</td><td>".$row->name."</td><td>".$row->email."</td><td>".$row->message."</td></tr>\n";
	    }
	
	    echo "</table>\n";
	
	    printf("Total %d rows. no momento<br>\n", $result->num_rows);
	    $result->close();
	} else {
	    echo "\nERROR: Tente de novo, pois deu ruim dessa vez." .$sql. "<br>" . $db->error;
	}
	echo "<br><a href='index.html'>Voltar para pagina inicial</a>";
	$db->close();
}

if (isset($_GET['edit_names'])) {
	
	$list_sql = "select * from addguestbook";

        echo "Usuarios ja cadastrados PARA DELETAR<br>\n";
	
	if ($result = $db->query($list_sql)) {
	    echo "<table border='1px' align='center' cellpadding='0' cellspacing='0' class='listar-db'><tr><th>ID</th><th>Nome</th><th>Email</th><th>Mensagem</th><th>Delete</th></tr>\n";
	    
	    while($row = $result->fetch_object()) {
		echo "<tr><td>".$row->ID."</td><td>".$row->name."</td><td>".$row->email."</td><td>".$row->message."</td><td><a href='guestbook.php?del_name=1&id=".$row->ID."'>Delete</a></td></tr>\n";
	    }
	
	    echo "</table>\n";
	
	    printf("Total %d rows. no momento<br>\n", $result->num_rows);
	    $result->close();
	} else {
	    echo "\nERROR: Tente de novo, pois deu ruim dessa vez." .$sql. "<br>" . $db->error;
	}
	echo "<br><a href='index.html'>Voltar para pagina inicial</a>";
	$db->close();
}

?>
        </div>
  </div>
</div>
    <!--  -->
  </form>
</body>

<footer>
  <div>

  </div>
</footer>
</html>