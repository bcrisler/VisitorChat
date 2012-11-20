<?php
$i = 1;
foreach ($context->sites as $site) {
    // Reset $i to keep grid
	if ($i > 3) {
	    $i = 1;
	}
	
	$role = "none";
    
    foreach ($site->getMembers() as $member) {
        if ($member->getUID() != \UNL\VisitorChat\User\Service::getCurrentUser()->uid) {
            continue;
        }
        
        $role = $member->getRole();
    }
	
	if ($i == 1) {
        echo "<section class='grid4 first'>";
    } else {
		echo "<section class='grid4'>";
	}
				
    echo "<div class='zenbox bright'>
	          <h3><a href='" . $site->getURL() . "'>" . $site->getTitle() . "</a>".
		         "<a class='zen-header-link' href='" .
		         \UNL\VisitorChat\Controller::$URLService->generateSiteURL('sites/' . $site->getURL()) . "'>View Details</a>".
			 "</h3>".
         "<ul>
             <li>Your chat role: <strong>" . $role . "</strong></li>" .
         "</ul></div></section>";
    $i++;
}
?>