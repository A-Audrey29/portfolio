<?php

if ( class_exists( 'MeowPro_MWL_Core' ) && class_exists( 'Meow_MWL_Core' ) ) {
	function MWL_admin_notices() {
		echo '<div class="error"><p>Thanks for installing the Pro version of Meow Lightbox :) However, the free version is still enabled. Please disable or uninstall it.</p></div>';
	}
	add_action( 'admin_notices', 'MWL_admin_notices' );
	return;
}

spl_autoload_register(function ( $class ) {
  $necessary = true;
  $file = null;
  if ( strpos( $class, 'Meow_MWL' ) !== false ) {
    $file = MWL_PATH . '/classes/' . str_replace( 'meow_mwl_', '', strtolower( $class ) ) . '.php';
  }
  else if ( strpos( $class, 'MeowCommon_' ) !== false ) {
    $file = MWL_PATH . '/common/' . str_replace( 'meowcommon_', '', strtolower( $class ) ) . '.php';
  }
  else if ( strpos( $class, 'MeowCommonPro_' ) !== false ) {
    $necessary = false;
    $file = MWL_PATH . '/common/premium/' . str_replace( 'meowcommonpro_', '', strtolower( $class ) ) . '.php';
  }
  else if ( strpos( $class, 'MeowPro_MWL' ) !== false ) {
    $necessary = false;
    $file = MWL_PATH . '/premium/' . str_replace( 'meowpro_mwl_', '', strtolower( $class ) ) . '.php';
  }
  if ( $file ) {
    if ( !$necessary && !file_exists( $file ) ) {
      return;
    }
    require( $file );
  }
});

new Meow_MWL_Core();

?>