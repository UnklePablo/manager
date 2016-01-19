<div class="container-fluid">
  <div class="row">
    
    <div class="col-md-1 sidebar">
      <ul class="nav nav-sidebar">
       <?php
        // ---------------------------------------------------------------------------------
        // Menú lateral --------------------------------------------------------------------
        $sidebar = Schema::GetParam('sidebar');
        foreach ( $sidebar as $sid ) {
            if ( strtolower($sid['name']) == Schema::GetParam('module') ) $active = 'active';
            else $active = '';

          ?><li class="<?php echo $active; ?>"><a href="<?php echo $sid['url']; ?>" class="dropdown-toggle tip" data-mode="right" data-tip="<?php echo $sid['name']; ?>">
              <span class="glyphicon <?php echo $sid['icon']; ?>"></span> <span class="nameli"><?php echo $sid['name']; ?></span> <span class="badge"><?php echo rand(0,20); ?></span></a>
            </li>
          <?php
        }
        ?>
        <li><a href="#a" class="glyphicon glyphicon-eye-open LinkCloseOpen"><!-- --></a></li>
      </ul>
    </div>
   <div class="col-md-offset-1 col-md-11 main">
    <!-- <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> -->
        <h1 class="page-header"><?php echo Schema::GetParam('title_pag'); ?></h1>
        <?php 
        $return = Schema::GetParam('return');
        if ( $return ) {
        ?>
        <div class="row">
          <div class="col-xs-6 text-left">
            <ol class="breadcrumb">
              <?php 
                foreach ( $return as $line_r ) {
                  echo '<li><a href="#">'.$line_r.'</a></li>';
                }
              ?>
              <!-- <li><a href="#">Home</a></li>
              <li><a href="#">Library</a></li>
              <li class="active">Data</li> -->
            </ol>
          </div>
         
          <div class="col-xs-6 text-right">
               <div class="btn-group" role="group">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-question-sign"></span> Help</button>
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-flag"></span> Mark</button>
              </div>
          </div>
        </div>
        <?php } ?>

        <div id="content">