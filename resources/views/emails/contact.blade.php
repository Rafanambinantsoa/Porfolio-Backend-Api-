<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h3 {
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;

    }

    p {
        color: #666;
        font-size: 16px;
        line-height: 1.5;
    }
</style>

<body>
    {{--  Un email disant que une certains personne avec son nom et son message  vous a envoye un message depuis votre porfolio  --}}
    <h2>Vous avez reçu un message de la part de {{ $name }}</h2>
    <p>Voici le message : {{ $user_message }}</p>
    <p>Vous pouvez le contacter à l'adresse suivante : {{ $email }}</p>


    <p>Envoyé depuis ton porfolio</p>

    <p>À bientôt , Gideon </p>


</body>

</html>
