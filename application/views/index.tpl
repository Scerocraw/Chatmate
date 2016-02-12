<!DOCTYPE HTML>
<html>
    <head>
        <title>{$title}</title>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>  
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link href="/assets/css/chatmate.css" rel="stylesheet" type="text/css"/>   
    </head>
    <body>
        <div class="chatMateContainer">
            {$content|default:'No content supplied'}
        </div>
        <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        <script src="/assets/js/bootstrap.js"></script>
    </body>
</html>
