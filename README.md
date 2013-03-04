sc_ticket_list
==============

Support Tickets Shortcode Worpress

This shortcode is to be put in the functions.php of the theme that you are using in wordpress. The plugin 
https://github.com/kezakez/Support-Tickets is required. (Support Tickets 2)

You will also need to comment out (or remove) the code that is in the includes/controllers.php that stops a non-user
from viewing the tickets when they click on one that is not theirs. That code is the following. 

//if ( ! $ticket->accessible() )
//	return $content . "\n\n" . '<p>' . esc_html( __( "You are not allowed to see this ticket.", 'suptic' ) ) . '</p>';

This may not be the most eleqount way of getting a list of tickets with this excellent plugin, however, this works for
my site and I am happy for you guys to change the code and make it better if you would like to.

Happy coding!

Dandalf.
