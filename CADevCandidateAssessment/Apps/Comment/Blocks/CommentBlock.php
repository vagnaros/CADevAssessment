<?php

namespace CADev\Apps\Comment\Blocks;

class CommentBlock implements \CADev\Base\CABlock {
    public function Process($args){
        $commentId = $args['commentId'];
        $comment = (new \CADev\Apps\Comment\Services\Get())->Get($commentId); //Get the Comment from Gen ID
        $user = (new \CADev\Apps\User\Services\Get())->Get($comment->userId); //Get the Matching user ID of Comment

        $pageArgs = ['comment' => $comment, 'user' => $user]; //Pass the page args into Var

        return $pageArgs; //Return Page Args as Var
    }
}
?>