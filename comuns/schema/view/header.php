<?php
set_time_limit(1800);

$cache_expire    = 65; // 65 minuts
$cookie_lifetime = $cache_expire * 60; // 65 minuts, 3900 segons
$gc_maxlifetime  = $cookie_lifetime + 300; // 70 minuts, 4200 segons

$vars_sessio['session.gc_probability'][1] = 1;
$vars_sessio['session.gc_divisor'][1]     = 100;
$vars_sessio['session.gc_maxlifetime'][1] = $gc_maxlifetime;
//Cache
$vars_sessio['session.cache_expire'][1]  = $cache_expire;
$vars_sessio['session.cache_limiter'][1] = 'private, must-revalidate';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo Schema::GetParam('module').' - '.Schema::GetParam('title_head'); ?></title>
        <!-- Bootstrap -->
    <link href="<?php echo BASE_DIR; ?>dist/css/bootstrap.css" rel="stylesheet">
     <link href="<?php echo BASE_DIR; ?>dashboard.css" rel="stylesheet">
     <style>
      /* **********table ********* */
      table.table thead tr th {
        font-size: 15px;
        text-align: center;
      }
     </style>
  </head>
  
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <?php 
            $topbar = Schema::GetParam('topbar');
            
            foreach ( $topbar as $top ) {
              $subactions     = $top['subactions'];
              $num_subactions = count($subactions);
              $class_down     = $caret = '';
              if ( $num_subactions > 0 ) {
                $class_down = 'class="dropdown-toggle" data-toggle="dropdown" ';
                $caret      = '<span class="caret"></span>';
              }

              echo '<li>';
              echo '<a href="'.$top['url'].'" '.$class_down.' role="button"><span class="glyphicon '.$top['icon'].'"></span> <span class="liname">'.$top['name'].' '.$caret.'</span></a>';
              
              if ($num_subactions > 0) {
                 echo '<ul class="dropdown-menu" role="menu">';
                 foreach ($subactions as $sub) {
                    echo '<li><a href="'.$sub['url'].'"><span class="glyphicon '.$sub['icon'].'"></span> '.$sub['name'].'</a></li>';
                 }
                 echo '</ul>';
              }
              echo '</li>';
            }
            ?>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>