// This is a shortcode that shows all of the tickets in the plugin support-tickets-v2
// The shortcode will have the following attributes:
// perpage (for paging) - Default 10
// orderby (column name) - Default 'id'
// search (SQL where Clause) - Default ''
function sc_ticket_list($atts)
{

    extract(shortcode_atts(array(
        'perpage' => 10,
        'orderby' => 'id',
        'search' => '',
    ), $atts) );

    $defaults = array(
        'perpage' => $atts['perpage'],
        'offset' => 0,
        'orderby' => $atts['orderby'],
        'status' => array(),
        'search' => $atts['search'] );

    $tickets = apply_filters( 'suptic_admin_tickets_on_edit_tickets',
        suptic_get_tickets( $defaults ), $defaults );

    $s = "<table> " .
        "<thead style='background-color:#1570A6'>" .
        "<tr>" .
        "<th scope='col' class='manage-column column-name' style='color:#fff'>". esc_html( __( 'Subject', 'suptic' ) )  . "</th>" .
        "<th scope='col' class='manage-column column-name' style='color:#fff'>". esc_html( __( 'Author', 'suptic' ) ) . "</th>" .
        "<th scope='col' class='manage-column column-name' style='color:#fff'>". esc_html( __( 'Updated', 'suptic' ) ) . "</th>".
        "<th scope='col' class='manage-column column-name' style='color:#fff'>". esc_html( __( 'Status', 'suptic' ) ) . "</th>".
        "</tr>" .
        "</thead>".
        "<tbody>";
    foreach ( (array) $tickets as $ticket )
    {
        $s .= "<tr>" .
            "<td><a href='". esc_attr( $ticket->url() ). "'><strong>" .  esc_html( $ticket->subject ) . "</strong></a>" .
            "<td>". esc_html( $ticket->author_name() ). "</td>".
            "<td>". suptic_human_time( $ticket->update_time ) . "</td>" .
            "<td>" . esc_html( $ticket->status ) . "</td>" .
            "</tr>";
    }
    $s .="</tbody></table>";

    return $s;
}


add_shortcode('cpticket_list', 'sc_ticket_list');
