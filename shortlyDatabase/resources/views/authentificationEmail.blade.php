<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="email_message" style="background-color: white; padding:50px 30px;">
                <div class="logoPlateform_container" style="display: flex;justify-content: center; ">
                    <div class="logoPlateform"  style=" width: 100px;height: 100px;border-radius: 0.375rem;background: #a162f7;padding: 10px;display: flex;align-items: center;">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="message" style="max-width: 400px;margin-top: 30px;">
                    <h1 style="font-size: 20px; text-align: center;margin-bottom: 15px;">Confirmation de votre adresse e-mail !</h1>
                    <hr>
                    <p class="child_three" style="width: 400px; margin-top: 30px;">Cher(e) utilisateur,</p>
                    <p class="child_four" style=" font-size: 1.2rem;margin-bottom: 20px; line-height: 25px; text-align: justify" >Merci de vous être inscrit(e) sur <strong>Shortly</strong>. Pour finaliser votre
                        inscription, veuillez cliquer sur le bouton ci-dessous afin de vérifier votre adresse e-mail !</p>
                    <a style="background-color: #a162f7;color: white !important;border: none;font-size: 1rem;padding: 12px 30px;font-weight: bold;"
                        href="{{ $url }}">Vérifier</a>
                    <p class="last_child" style=" font-size: 1.2rem;margin-bottom: 20px; margin-top: 15px;"> Cordialement, l'équipe de <strong>Shortly.</strong></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
