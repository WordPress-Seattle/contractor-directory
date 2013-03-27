<div class="contractor">        
    <?php
        echo '<p class="avatar">' . get_avatar( $c->email ) . '</p>';    
        echo '<p class="display-name">'.$c->display_name.'</p>';
        
        echo '<p class="skills">';
        
        if( 'on' == $c->i_do_design ) {
            echo('<span class="designer">Design</span>';
        }
        if( 'on' == $c->i_do_theming ){
            echo('<span class="theming">Theming</span>';
        }
        if( 'on' == $c->i_do_development ){
            echo('<span class="developement">Development</span>';
        }
        if( 'on' == $c->i_do_user_training ) {
            echo ('<span class="user-training">User Training</span>');
        }       
        echo '</p>';
        
        echo '<p class="bio">'.$c->bio.'</p>';
        
        echo '<ul class="contractor-social">'; // Social links
        echo '<li><a href="' . $c->website     .'">Website</a><li>';
        echo '<li> <a href="'. $c->twitter_url .'">Twitter</a><li>';
        echo '<li> <a href="'. $c->facebook_url.'">Facebook</a><li>';
        echo '<li> <a href="'. $c->linkedin    .'">LinkedIn</a><li>';
        echo '<li> <a href="'. $c->github_url  .'">Github</a><li>';
        echo '<li> <a href="'. $c->wporg_url   .'">WordPress.org</a><li>';
        echo '<li> <a href="'. $c->portfolio   .'">Portfolio</a><li>';
        echo '</ul>';
    
    ?>
    </div>