<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Enter your registration number to get a full MOT history of your car">

        <meta name="google-site-verification" content="Zg2SBQmwnVVy6QAzYkCpE4FC_667mZsSgON2lXL5rc4" />

        <meta property="og:url" content="https://checkmymot.uk">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Check My MOT - Your MOT History Without the Fuss">
        <meta property="og:image" content="https://checkmymot.uk/og-image.png">
        <meta property="og:description" content="Enter your registration number to get a full MOT history of your car">


        <link rel="icon" type="image/png" href="favicon.png">

        <title>Check My MOT - Your MOT History Without the Fuss</title>
     
        <link rel="canonical" href="https://checkmymot.uk">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(function() {
                $('#registration').on('keypress', function(e) {
                    if (e.which == 32)
                        return false;
                });
            });
        </script>
        <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135557208-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-135557208-1');
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </head>
    <body>
        <main role="main" class="flex-shrink-0 py-4">
            {{ $slot }}
        </main>
    </body>
</html>