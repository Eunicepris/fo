<?php
    $firstname = $name = $email = $phone = $message = "";
    $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput($_POST["$name"]);
        $email = verifyInput($_POST["email"]);
        $phone = verifyInput($_POST["phone"]);
        $messagee = verifyInput($_POST["message"]);

        if(empty($firstname))
        {
            $firstnameError = "Je veux connaitre ton prénom !";
        }
        if(empty($name))
        {
            $nameError = "Et oui je veux tout savoir. Même ton nom !";
        }
        if(empty($message))
        {
            $messageError = "Qu'est-ce que tu veux me dire ?";
        }
        if(!isEmail($email))
        {
            $emailError = "T'essaies de me rouler? C'est pas un email ça !";
        }
        if(!isPhone($phone))
        {
            $phoneError = "Que des chiffres et des espaces, stp...";
        }
    }

    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/", $var);
    }

    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contactez-moi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type="text/css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <form action="<?php echo htmlspecialchars($_SERVEUR['PHP_SELF']); ?>" method="post" id="contact-form" role="form">
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstname">Prénom<span class="blue">*</span></label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">

                        <p class="comments"><?php echo $firstnameError; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Nom<span class="blue">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $name.'22'; ?>">

                        <p class="comments"><?php echo $nameError; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email<span class="blue">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>">

                        <p class="comments"><?php echo $emailError; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Télephone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre télephone" value="<?php echo $phone; ?>">
                            
                        <p class="comments"><?php echo $phoneError; ?></p>
                    </div>
                    <div class="col-md-12">
                        <label for="message">Message<span class="blue">*</span></label>
                        <textarea name="message" id="message" class="form-control" rows="4"><?php echo $message; ?></textarea>

                        <p class="comments"><?php echo $messageError; ?></p>    

                    </div>
                    <div class="col-md-12">
                        <p class="blue"><strong>* Ces informations sont requises</strong></p>
                    </div>

                    <div class="col-md-12">
                        <input type="submit" class="button1" value="Envoyer">
                    </div>

                </div>

                <p class="thank-you">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
            </form>
        </div>
    </div>
    
</body>
</html>