<?php
// file to modify: /var/www/html/dvwa/vulnerabilities/sqli/source/low.php
if( isset( $_GET[ 'Submit' ] ) ) {
    // Get input
    $id = $_GET[ 'id' ];

    // Prepare the statement
    // The '?' is a placeholder for our user input.
    $query = "SELECT first_name, last_name FROM users WHERE user_id = ? LIMIT 1;";
    $stmt = mysqli_prepare($GLOBALS["___mysqli_ston"], $query);

    // Bind the user input to the placeholder.
    // The "s" indicates that the variable is a string. The DB driver handles it safely.
    mysqli_stmt_bind_param($stmt, "s", $id);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the results
    $result = mysqli_stmt_get_result($stmt);

    // Get results
    while( $row = mysqli_fetch_assoc( $result ) ) {
        // Get values
        $first = $row["first_name"];
        $last  = $row["last_name"];

        // Feedback for end user
        echo "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
    }

    // Close the statement and the connection
    mysqli_stmt_close($stmt);
    mysqli_close($GLOBALS["___mysqli_ston"]);
}
?>
