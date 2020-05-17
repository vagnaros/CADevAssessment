<?php
namespace CADev\Apps\Report\Views;

class display implements \CADev\Base\CAView{
/**
 * @param array Expecting 'commentIds' => type int[]
 */ 
public function GetView($args){
    /*var_dump($_POST);
    exit();*/ //Debug Post Dump
    
    $offender = $_POST['offender'];
    $text = $_POST['text'];

$html = <<<HTML
<html>
<head>
    <title>Canterlot Avenue</title>
    <link rel="stylesheet" type="text/css" href="jStyle.css">
</head>
<body>
    <h1>Report Confirmation</h1>
    <div id="comment" class="comment">
        <div class="comment_user">$offender</div>
        <div class="comment_text">$text</div>
    </div>
HTML;
$html .= <<<HTML
    <hr/>
    <div>Copyright &copy; Poniverse</div>
</body>
</html>
HTML;
return $html;
}
}

?>