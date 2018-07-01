<?php
if ( is_singular( array( '{post-type}' ))) { include (TEMPLATEPATH . '/single-{post-type}.php');
}
else { include (TEMPLATEPATH . '/single-default.php');
}
?>