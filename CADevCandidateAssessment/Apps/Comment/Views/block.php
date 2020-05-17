<?php
namespace CADev\Apps\Comment\Views;

class block implements \CADev\Base\CAView{
/**
 * @param array Expecting 'comment' => type \CADev\Apps\Comment\Services\Comment
 */
public function GetView($args){
    $comment = $args['comment']; //Comment Arg Usage
    $commentText = htmlspecialchars(($comment->text)); //Set Comment Text (special char exception)
    $user = $args ['user']; //User Arg Usage
    

    //Generate HTML Elements and Content
return <<<HTML
    <script type="text/javascript"> 
        function sendReport(){
            var conf = confirm("Submit Comment Report?");
            if(conf == true){ //If Confirm Report NO
                return conf;
            } else {
                return conf;
            }
        }
    </script>

    <div id="comment_$comment->commentId" class="comment">
        <div class="comment_user">$user->fullname</div>
        <div class="comment_time" style="font-size:small;">$comment->time</div>
        <div class="comment_text">$commentText</div>
        <div class="comment_report">
            <form name="repForm" id="repForm" action="/index.php?LOCATION=report" method="POST" onclick='return sendReport();'>
                <input type="submit" value="Report"/> <!-- Hidden Vars for POST -->
                <input type="hidden" id="offender" name="offender" value="$user->fullname"/>
                <input type="hidden" id="text" name="text" value="$commentText"/>
            </form>
        </div>
    </div>
HTML;
}
}

?>