<?php

class Message{
    public static function show() {

    if(isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        unset($_SESSION["msg"]); 
        return "<script>
                M.toast({
                    html: '$msg'
                });
                </script>
        ";
        }
    }
}

