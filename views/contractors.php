<div class="contractor <?php echo ($evenOdd . " " . $id); ?>">        
    <?php
    echo ('<p class="avatar">' . get_avatar($c->email) . '</p>');
    echo ('<p class="display-name">' . $c->display_name . '</p>');

    echo ('<ul class="skills">');

    if ('on' == $c->i_do_design) {
	echo('<li class="design"> Design </li>');
    }
    if ('on' == $c->i_do_theming) {
	echo('<li class="theming"> Theming </li>');
    }
    if ('on' == $c->i_do_development) {
	echo('<li class="developement"> Development </li>');
    }
    if ('on' == $c->i_do_user_training) {
	echo ('<li class="user-training"> User Training </li>');
    }
    echo ('</ul>');

    echo ('<p class="bio">' . $c->bio . '</p>');


    echo ('<ul class="contractor-social">'); // Social links

    if (!empty($c->website))
	echo ('<li class="website"><a href="' . $c->website . '">Website</a></li>');
    if (!empty($c->twitter))
	echo ('<li class="twitter" > <a href="' . $c->twitter_url . '">Twitter</a></li>');
    if (!empty($c->facebook))
	echo ('<li class="facebook"> <a href="' . $c->facebook_url . '">Facebook</a></li>');
    if (!empty($c->linkedin))
	echo ('<li class="linkedin"> <a href="' . $c->linkedin . '">LinkedIn</a></li>');
    if (!empty($c->github))
	echo ('<li class="github"> <a href="' . $c->github_url . '">Github</a></li>');
    if (!empty($c->wporg))
	echo ('<li class="wporg"> <a href="' . $c->wporg_url . '">WordPress.org</a></li>');
    if (!empty($c->portfolio))
	echo ('<li class="portfolio"> <a href="' . $c->portfolio . '">Portfolio</a></li>');
    echo ('</ul>');
    ?>
    <span class="clearfix">&nbsp;</span>
</div>
