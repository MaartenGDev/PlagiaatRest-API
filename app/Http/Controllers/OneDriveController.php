<?php


namespace App\Http\Controllers;


use App\Http\Support\CompareFile;
use App\Http\Support\OneDrive;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OneDriveController
{
    public function file(Request $request,$file,$content){

        $token = $request->headers->get('token');

        $token = 'EwBwAq1DBAAUGCCXc8wU/zFu9QnLdZXy+YnElFkAAVQoNzxoTADQkTVqLP5N+vwG9XQoFZ5FUQaEr4qneHoSgrvUmJe248tepKbqJ3HhtwcjvxvAD9jRetPMgsSM5mE/PXlMHn0gjzV6KiOa/Ft4tdmxqWIve4/0WJZrW7N4xAYNwnBfBIgNaqT1aWxwFw43NYO7w0HNCcpWBLoQO/RzrbVz3+u0UYs4Qt5NqAShC/9micES2u+1QVoZF66ky8JRHJEcBc8rOl8QCoAEZGo9b3/fEY1ZuAthZuEwuzcH0n3lKM0hOEl144UXblnz515OZHsrkTANFLCqB8TiQlxYJSpCFNoqQ3YDkZQMK9SECY3VSXlx/U9TP16sKLstogADZgAACOv65eIV0U98QAGsU7/8040q5zk13C/VyLue9fcJXuHXpXh+jPQ4gMgmcGL+dJiypd5sxVHRD7UyjeLT9UBCsWTgMNB8ipVlY2Jh7rmZww4MDeiRTjDF2e96ramwoOViTLnUoy4v/K+ZNZ9kYkPwH0bwUSL3Oj/2PaJhW1p6GK95wIt4zGc8CEgNAbe7m+Qcd1ZyiWWTLZCJmD5Xbav4CZ2igTtlyxNkvROtH5CjJlnAbXG0TZiP5dtzqHIR1UO1ehjCFXKDSlsl7ODs+0g1JEaHA+iVx6eslxBmKXWfVOf6LJJUw/GltFHUW3YsvclK/xqTlgbovfTX2DJdjDavaHz+h6wCiWX/0hJmaBLNmXf1OwpQJqTivKh4Tp+yhIFZ0WzbQ3ZcG2z7ZxvRe9GUEq7JTNtpEQhyHWguWUzyZAu2XCQhR+RMlrwWcXcB';

        $response = new Response(
            CompareFile::compare(
                OneDrive::file($token,$file),
                $content
            )
        );

        $response->headers->set('Access-Control-Allow-Origin','*');
        return $response;
    }
}