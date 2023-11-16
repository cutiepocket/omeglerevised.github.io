<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the IP address from the form
    $ipAddress = $_POST["ipAddress"];

    // Validate the IP address (you can enhance this validation)
    if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
        // Ban the IP by adding it to a file on the server
        $bannedIPsFile = 'banned-ips.txt';

        // Check if the IP is not already banned
        if (!isIPBanned($ipAddress, $bannedIPsFile)) {
            // Append the banned IP to the file
            file_put_contents($bannedIPsFile, $ipAddress . PHP_EOL, FILE_APPEND);
            echo "IP Address '$ipAddress' has been banned.";
        } else {
            echo "IP Address '$ipAddress' is already banned.";
        }
    } else {
        echo "Invalid IP Address.";
    }
}

// Function to check if an IP is already banned
function isIPBanned($ip, $file) {
    $bannedIPs = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $bannedIPs);
}
?>
