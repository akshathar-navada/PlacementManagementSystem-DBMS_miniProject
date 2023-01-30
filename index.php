<!DOCTYPE html>
<html>
    <head>
            <link rel="shortcut icon" type="image/png" href="images\favicon.ico"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <style type="text/css">
            
            * {
                margin: 0;
                padding: 0;
            }
            body {
                font-family: 'Open Sans', Arial, sans-serif;
                font-weight: 700;
            }
            .welcome-section {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background-color: #000;
                overflow: hidden;
            }
            .welcome-section .content-wrap {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 1050px;
                transform: translate3d(-50%, -50%, 0);
            }
            .welcome-section .content-wrap .fly-in-text {
                list-style: none;
            }
            .welcome-section .content-wrap .fly-in-text li {
                display: inline-block;
                margin-right: 30px;
                font-size: 5em;
                color: #fff;
                opacity: 1;
                transition: all 2s ease;
            }
            .welcome-section .content-wrap .fly-in-text li:last-child {
                margin-right: 0;
            }
            .welcome-section .content-wrap .enter-button {
                display: block;
                text-align: center;
                font-size: 1em;
                text-decoration: none;
                text-transform: uppercase;
                color: #adff2f;
                opacity: 1;
                transition: all 1s ease 2s;
            }
            
            .welcome-section.content-hidden .content-wrap .fly-in-text li { opacity: 0; }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(1) { transform: translate3d(-100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(2) { transform: translate3d(100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(3) { transform: translate3d(-100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(4) { transform: translate3d(100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(5) { transform: translate3d(-100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(6) { transform: translate3d(100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .fly-in-text li:nth-child(7) { transform: translate3d(-100px, 0, 0); }
            .welcome-section.content-hidden .content-wrap .enter-button { opacity: 0; transform: translate3d(0, -30px, 0); }
            
            @media (min-width: 800px) {
                .welcome-section .content-wrap .fly-in-text li { font-size: 10em; }
                .welcome-section .content-wrap .enter-button { font-size: 1.5em; }
            }
            
            
            
        </style>
    </head>
    <body>
        
        
        <div class="welcome-section content-hidden">
            <div class="content-wrap">
                <ul class="fly-in-text">
                    <li>W</li>
                    <li>E</li>
                    <li>L</li>
                    <li>C</li>
                    <li>O</li>
                    <li>M</li>
                    <li>E</li>
                </ul>
                
                <a href="homepage.php" class="enter-button">Enter to Job Portal Website</a>
            </div>
        </div>
        
        
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript">
            
            $(function() {
                
                var welcomeSection = $('.welcome-section'),
                    enterButton = welcomeSection.find('.enter-button');
                
                setTimeout(function() {
                    welcomeSection.removeClass('content-hidden');
                }, 500);
                
                enterButton.on('click', function(e) {
                    e.preventDefault();
                    welcomeSection.addClass('content-hidden').fadeOut();
                }, 500);
                
                
            })();
            
            
            
        </script>

    </body>
</html>










