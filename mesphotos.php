<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mes Photos</title>
        <link rel="stylesheet" href="css/entete_style.css">
        <link rel="stylesheet" href="css/mesphotos.css">
	</head>
	<body>

		<header>
			<?php include("entete.php"); ?>
        </header>
        <h1 style="text-align: center">PAGE en TRAVRAUX</h1>
        <div class="container">
            <div id="entete"><h2> Galleries des photos</h2> </div>
            <section id="content">
                <div class="gallery">

                    <ul>
                        <li><img src="http://placehold.it/100x100"/></li>
                        <li><img src="http://placehold.it/100x100"/></li>
                        <li><img src="http://placehold.it/100x100"/></li>
                        <li><img  src="http://placehold.it/100x100"/></li>
                    </ul>
                    <ul>
                        <li><img  src="http://placehold.it/100x100"/></li>
                        <li><img  src="http://placehold.it/100x100"/></li>
                        <li><img  src="http://placehold.it/100x100"/></li>
                        <li><img  src="http://placehold.it/100x100"/></li>
                    </ul>
                    <?php include("form_mesphotos.php"); ?>
                    <form class="sphoto" action="form_mesphotos.php" method="POST" enctype="multipart/form-data">
                        Titre: <input id="titlephoto" type="text" name="name">
                        Ajouter photo:<input src="" type="file" name="file">
                        <input type="submit" name="submit">
                    </form>
                </div>

            </section>
            <footer>

            </footer>
         </div>

    </body>
</html>
