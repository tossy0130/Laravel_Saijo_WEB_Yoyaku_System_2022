<html lang="ja">
    <head>
        <title>pdf output test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: migmix;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            @font-face{
                font-family: migmix;
                font-style: bold;
                font-weight: bold;
                src: url("{{ storage_path('fonts/migmix-2p-bold.ttf')}}") format('truetype');
            }
            body {
                font-family: migmix;
                line-height: 80%;
            }
            .main_image {width: 100%;text-align: center;margin: 10px 0;}
            .main_image img{width: 90%;}
            .sushiTable {border: 1px solid #000;border-collapse: collapse;width: 50%;}
            .sushiTable tr th{background: #87cefa;padding: 5px;border: 1px solid #000;}
            .sushiTable tr td{padding: 5px;border: 1px solid #000;}

            .a_left {text-align: left;}
            .a_center {text-align: center;}
            .a_right {text-align: right;}

            .sub_span {display: block;}

            .div_center {position: relative;left: 45%;}

        </style>
    </head>

    <body>
        
        <section class="print_pages">



        </section> <!-- END section -->


    </body>
</html>
