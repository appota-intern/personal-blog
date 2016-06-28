<html>
    <head>
        <title></title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form method="POST">
            input text: <input type="text" name="inputtext" value=""/> <br/>
            <input type="submit" name="form_click" value="Gui"/><br/>
            <?php
                if (isset($_POST['form_click'])){
                    echo 'Xin Chao: ' . $_POST['inputtext'];
                }
           ?>
        </form>
    </body>