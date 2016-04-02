<!DOCTYPE html>
<html lang="en">


<head>
  <title>Tato's Guestbook</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="index.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>


<heading>
    <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">[<0;59;35M
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

  <body id="b2">
    <div class="panel-body">
      <h2>Obrigado!</h2>
      <div class="container center-div col-offset-6 centered">
        <div class="row">
          <?php
	
          $name =$_POST['seunome'];
          $email =$_POST['email'];
          $comment =$_POST['artxt'];
          
          include "addguestbook.txt";
           
         $file = fopen("addguestbook.txt", "a+") or die("Unable to open file!");
         fwrite($file, "\n\n<div style='text-align:left'><b>". $name ."\n</b>:</div><br/><div style='text-align:center' size='50'>\n". $comment ."<br/></div>\n");
         fclose($file);

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