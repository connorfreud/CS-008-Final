<!-- ************ Nav start ***************** -->
<nav>
    <ol>
        <?php
        print '<li class="';
        if($path_parts['filename']=='pats_home'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_home.php">Home</a>';
        print '</li>'; 
        
        print '<li class="';
        if($path_parts['filename']=='pats_roster'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_roster.php">Team Roster</a>';
        print '</li>';  
        
        
         print '<li class="';
        if($path_parts['filename']=='pats_gallery'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_gallery.php">Gallery</a>';
        print '</li>';  
        
        
        print '<li class="';
        if($path_parts['filename']=='pats_shop'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_shop.php">Shop</a>';
        print '</li>';  
        
        print '<li class="';
        if($path_parts['filename']=='pats_custom'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_custom.php">Custom</a>';
        print '</li>';
        
        print '<li class="';
        if($path_parts['filename']=='pats_blog'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_blog.php">Blog</a>';
        print '</li>';
        
         print '<li class="';
        if($path_parts['filename']=='pats_poll'){
            print 'activePage';
        }
        print '">';
        print '<a href="pats_poll.php">Poll</a>';
        print '</li>';
        ?>
    </ol>
</nav>
<!-- ************ Nav start ***************** -->
