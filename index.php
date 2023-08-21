<?php 
    $firstname = $name = $email = $message = "";
    $firstnameError = $nameError = $emailError = $messageError = "";
    $isSuccess = false;
    $emailTo = "voyer.lycee@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput($_POST["name"]);
        $email = verifyInput($_POST["email"]);
        $message = verifyInput($_POST["message"]);
        $isSuccess = true;
        $emailText = "";

        if (empty($firstname))
        {
            $firstnameError = "Il faut saisir votre prénom ! ";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "firstName: $firstname\n";
        }

        if (empty($name))
        {
            $nameError = "Il faut saisir votre nom ! ";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "name: $name\n";
        }

        if (empty($email))
        {
            $emailError = "Il faut saisir votre email ! ";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "Email: $email\n";
        }

        if (empty($message))
        {
            $messageError = "Il faut compléter votre message ! ";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "Message: $message\n";
        }
      
        if (!isEmail($email))
        {
            $emailError = "votre email n'est pas valide";
            $isSuccess = false;
        }     

        if ($isSuccess)
        {
            //envoi de l'email
            $headers = "From : $firstname $name <$email> \r\n Reply-To : $email";
            mail($emailTo, "demande de contact", $emailText, $headers);
            $firstname = $name = $email = $message = "";
        }
    }

    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var)
    {
        $var = trim($var);
        $var = stripcslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CV Fabrice VOYER</title>
        <meta charset="utf-8"/>
        <meta name="viewport"  content="width=device-width, inital-scale=1"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body class="bg-dark-subtle">
      <section class="container-fluid mt-5 mb-5">
        <div class="row text-center">
            <div class="col"></div>
            <div class="col-9"><img  src="img/photo_FV.jpg" class="img-fluid img-thumbnail rounded-5" alt="photo_du_patron"/>
            </div>
            <div class="col"></div>
        <div class="text-center">
             <h1 class="display-2" style="font-weight: bold" >FABRICE VOYER</h1>
            <h3>Professeur de Sciences Industrielles de l'Ingénieur</h3>
            <a class="btn btn-outline-primary btn-lg mt-3" href="fichiers/test_cv.pdf" target="_blank"> Télécharger CV</a>
        </div>
      </section>

      <section class="m-3 pt-3 pb-3 mb-3 border border-dark rounded-3" style="background-color: rgb(155, 151, 151);">
        
        <h2 class="text-uppercase text-center text-light">Compétences</h2>
        
        <div class="container-fluid mt-4">
            <div class="row mx-3">
                <div class="col-md-6">
                    <div class="progress mb-2" role="progressbar" aria-label="meca" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped" style="width: 90%"><h5 style="text-shadow: 2px 2Px 2px black;">Mécanique des milieux continus 90 %</h5></div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="hydrau" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-success" style="width: 80%"><h5 style="text-shadow: 2px 2Px 2px black;">Hydraulique industrielle 80 %</h5></div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="SW" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-info" style="width: 80%"><h5 style="text-shadow: 2px 2Px 2px black;">SolidWorks 80 %</h5></div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="anglais" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-primary" style="width: 80%"><h5 style="text-shadow: 2px 2Px 2px black;">Anglais 80 %</h5></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="progress mb-2" role="progressbar" aria-label="matlab" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-warning" style="width: 75%"><h5 style="text-shadow: 2px 2Px 2px black;">Matlab Simulink 75 %</h5></div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="html" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-danger" style="width: 70%"><h5 style="text-shadow: 2px 2Px 2px black;">Html - CSS 70 %</h5></div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="bootstrap" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-info" style="width: 75%"><h5 style="text-shadow: 2px 2Px 2px black;">BootStrap 75 %</h5></div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="pix" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 45px">
                        <div class="progress-bar progress-bar-striped bg-primary" style="width: 73%"><h5 style="text-shadow: 2px 2Px 2px black;">Pix 754 pts</h5></div>
                    </div>
                </div>
            </div>
        </div>

      </section>
      <section class="m-3 pt-3 pb-3 border border-dark text-light rounded-3" style="background-color: rgb(155, 151, 151);">
        
        <h2 class="text-uppercase text-center">Expériences Professionnelles</h2>
        <div class="container-fluid mx-2">
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><span class="bi bi-briefcase-fill"></span></div>
                    <div class="timeline-panel-container">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3 class="text-warning">Lycée Aragon Picasso - Givors</h3>
                                <hr/>
                                <h6 class="text-info"><span class="bi bi-clock"></span> 2020-2023</h6>
                                <hr/>
                            </div>
                            <div class="timeline-body">
                                <p class="bi bi-arrow-right-circle"> Terminale STI2D spécialité Systèmes d'Information et Numérique</p>
                                <p class="bi bi-arrow-right-circle"> Terminale générale spécialité Sciences de l'ingénieur</p>
                                <p class="bi bi-arrow-right-circle"> BTS Conception et Industrialisation en Microtechnique - Modélisation Solidworks</p>
                                <p class="bi bi-arrow-right-circle"> BTS Motorisation toutes énergies - Modélisation Matlab-Simulink</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><span class="bi bi-briefcase-fill"></span></div>
                    <div class="timeline-panel-container-inverted">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3 class="text-warning">Lycée Charlie Chaplin - Décines</h3>
                                <hr/>
                                <h6 class="text-info"><span class="bi bi-clock-fill"></span> 2002-2020</h6>
                                <hr/>
                            
                            <div class="timeline-body">
                                <p class="bi bi-arrow-right-circle"> Terminale générale spécialité Sciences de l'ingénieur</p>
                                <p class="bi bi-arrow-right-circle"> BTS Assistance Technique d'Ingénieur - Mécanique des milieux continus</p>
                                <p class="bi bi-arrow-right-circle"> BTS Maintenance des Matériels de Construction et de Manutention - Mécanique des millieux continus et hydraulique industrielle</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><span class="bi bi-briefcase-fill"></span></div>
                    <div class="timeline-panel-container">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3 class="text-warning">Lycée Marcel Cachin - Saint-Ouen</h3>
                                <hr/>
                                <h6 class="text-info"><span class="bi bi-clock-fill"></span> 2000-2002</h6>
                                <hr/>
                            </div>
                            <div class="timeline-body">
                                <p class="bi bi-arrow-right-circle"> Terminale STI Génie Electrotechnique - Construction Mécanique</p>
                                <p class="bi bi-arrow-right-circle"> Terminale S Sciences de l'ingénieur</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

      </section>
      <section class="m-3 pt-3 pb-3 border border-dark text-light rounded-3" style="background-color: rgb(155, 151, 151);">
        <h2 class="text-uppercase text-center">Formation</h2>
        <div class="container-fluid mx-2">
            <div class="row mb-2">
                <div class="col-sm-6 mb-2">
                    <div class="card">
                        <img src="img/180601103349-logo-en.png" class="card-img-top" alt="logo_en">
                        <div class="card-body">
                          <h5 class="card-title">Agrégation externe de mécanique</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary"><span class="bi bi-clock-fill"></span> 1999</h6>
                        
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <img src="img/Logo-UJF-2011.png" class="card-img-top" alt="logo_gre">
                        <div class="card-body">
                          <h5 class="card-title">Licence et Maîtrise de technologie mécanique</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary"><span class="bi bi-clock-fill"></span> 1996-1998</h6>
                          <a href="https://formations.univ-grenoble-alpes.fr/fr/catalogue-2021/licence-XA/licence-mecanique-IAI546M7.html" class="card-link">Université Grenoble</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <div class="card">
                        <img src="img/DIRCOM-logo_iut.png" class="card-img-top" alt="logo_iut">
                        <div class="card-body">
                          <h5 class="card-title">DUT Génie mécanique et productique</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary"><span class="bi bi-clock-fill"></span> 1994-1996</h6>
                          <a href="https://iut.univ-amu.fr/fr/sites-geographiques/aix-en-provence#section-2989" class="card-link">L'IUT d'Aix-en-Provence</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <img src="img/logo_lycee_vauvenargues_.png" class="card-img-top" alt="logo_sup">
                        <div class="card-body">
                          <h5 class="card-title">Maths Sup Technologique</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary"><span class="bi bi-clock-fill"></span> 1993-1994</h6>
                          <a href="https://www.site.ac-aix-marseille.fr/lyc-vauvenargues/spip/" class="card-link">Lycée Vauvenargues</a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>   
       
      <section class="m-3 pt-3 pb-3 border border-dark text-light rounded-3" style="background-color: #787676;">
        <h2 class="text-uppercase text-center">Me contacter</h2>
        <div class="container-fluid mx-2">
        <p class="mx-3 mb-4">Mon profil vous intéresse ? N'hésitez pas à me contacter pour plus de précisions sur mon parcours et mes compétences.</p>
        <div class="row">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form" >
            <div class="row">
            
            <div class="col-sm-6 mb-3 ">
              <label for="firstname">Prénom *</label>
              <input type="text" id="firstname" name="firstname" required class="form-control" placeholder="Votre prénom" value="<?php echo $firstname?>">
              <p> <?php echo $firstnameError?></p>
            </div>
            
            <div class="col-sm-6 mb-3 ">
                <label for="name">Nom *</label>
                <input type="text" id="name" name="name" required class="form-control" placeholder="Votre nom" value="<?php echo $name?>" >
                <p> <?php echo $nameError?></p>
            </div>
            
            <div class="col-sm-6 mb-3 ">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required class="form-control" placeholder="Votre Email" value="<?php echo $email?>" >
                <p> <?php echo $emailError?></p>
              </div>

                 
            <div class="col-sm-12 ">
                <label for="phone">Votre message *</label>
                <textarea type="text" id="message" name="message" required class="form-control" placeholder="Votre message" row="4" value="<?php echo $message?>"> </textarea>
                <p> <?php echo $messageError?></p>
            </div>
            
            <div class="col-sm-12 ">
                <p style="font-weight: bold; font-style: italic;">* Ces informations sont requises.</p>
            </div>
            
            <div class="col-sm-12 mb-3 ">
                <input type="submit" class="btn btn-success btn-outline-light" value="Envoyer">
            </div>

        <p style="display:<?php if ($isSuccess) echo 'block'; else echo 'none';?>"> Votre message a bien été envoyé ! Merci de m'avoir contacté </p>
            
        </form>
        </div>
        </div>
    </section> 
    </body>
</html>