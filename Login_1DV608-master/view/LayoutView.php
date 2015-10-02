<?php


class LayoutView {
  
  public function render($isLoggedIn, $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
            ' . $this->generateLinkBetweenSitesButton($isLoggedIn) . '
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  private function generateLinkBetweenSitesButton($isLoggedIn){
    if(!$isLoggedIn){

      if(isset($_GET["register"]))
      {
        return "<a href=?>Login Page</a>";
            //"<h2>Register new user</h2>";
      }
      else
      {
        return "<a href=?register>Registration Page</a>";
      }
      //return '<a href=?register>Registration Page</a>';
    }
  }
}
