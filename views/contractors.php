<?php
    get_header();

    
    // Get a list of all users with meta share_in_directory = on
    $contractors = new Contractors();
    
    $list = $contractors->find(); 
    
    ?>
    <table border="1" style="border: 1px dotted #000; width: 50%; margin:auto">
        
    <?php
    foreach ( $list AS $c ) {
        echo "\n\t<tr>";
        echo "<td valign='top' style='border: 1px dashed #000; width: 100px'>" . get_avatar( $c->email ) . "</td>";
        
        echo "<td valign='top' align='top' style='border: 1px solid #000; vertical-align: top'>";
        echo "<b>$c->display_name</b>";
        echo "<p style='font-size: 9px'>";
        
        $fields = array();
        
        if( 'on' == $c->i_do_design ) 
            $fields[] = 'Design';
        if( 'on' == $c->i_do_theming )
            $fields[] = 'Theming';
        if( 'on' == $c->i_do_development )
            $fields[] = 'Development';
        if( 'on' == 'i_do_user_training' ) 
            $fields[] = 'User Training';
        
        echo implode( ',', $fields );
        
        echo '</p>';
        
        echo "<p>$c->bio</p>";
        
        echo '<p style="font-size: 12px">'; // Social links
        echo "<a href='$c->website'>Website</a>";
        echo " <a href='$c->twitter_url'>Twitter</a>";
        echo " <a href='$c->facebook_url'>Facebook</a>";
        echo " <a href='$c->linkedin'>LinkedIn</a>";
        echo " <a href='$c->github_url'>Github</a>";
        echo " <a href='$c->wporg_url'>WordPress.org</a>";
        echo " <a href='$c->portfolio'>Portfolio</a>";
        echo '</p>';
        echo "</td>";
        echo "\n\t</tr>";
    }
    ?>
    </table>

<?php //
 /*   echo '<pre>';
    var_dump($list);
    echo '</pre>';*/
    
    
    

    
    
    get_footer();
?>