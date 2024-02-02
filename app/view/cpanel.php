

<?php
$api_url = 'https://corporate.vip8.noc401.com:2083/execute/Email/list_pops_with_disk';
$username = 'scribbed';
$api_token = 'ELF3IOJ76KV1HV8207H4FXQIXXI13EDG'; // Use the generated API token here

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: cpanel ' . $username . ':' . $api_token
));

$response = curl_exec($curl);
curl_close($curl);

if ($response) {
    $data = json_decode($response, true);

    $specific_domain = 'princegeorgeroyalbank.com';
    $filtered_emails = [];

    // Process and filter the email accounts
    foreach ($data['data'] as $email_account) {
        if (strpos($email_account['email'], '@' . $specific_domain) !== false) {
            $filtered_emails[] = $email_account['email'];
        }
    }

    // Output the filtered email accounts
    print_r($filtered_emails);
    // print_r($data); // Process and display the data as needed
} else {
    echo "Error fetching data";
}
?>

<!-- updating  password -->

<?php


function validatePassword($password) {
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "Password must include at least one uppercase letter.";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "Password must include at least one lowercase letter.";
    }
    if (!preg_match("/\d/", $password)) {
        return "Password must include at least one number.";
    }
    if (!preg_match("/\W/", $password)) {
        return "Password must include at least one special character.";
    }
    return true;
}

// Example usage
$new_password = 'new_password_here'; // New password for the email account
$validation_result = validatePassword($new_password);
if ($validation_result === true) {
    // Proceed with changing the password
} else {
    echo $validation_result; // Display validation error
}


// Your cPanel credentials and API URL for changing password
$api_url = 'https://corporate.vip8.noc401.com:2083/execute/Email/passwd_pop';
$username = 'scribbed';
$api_token = 'ELF3IOJ76KV1HV8207H4FXQIXXI13EDG';
$email_user = 'test'; // The user part of the email address
$email_domain = 'bydayjobafrica.com'; // The domain part of the email address
$new_password = 'Teamwork@2025'; // New password for the email account

// Initialize cURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: cpanel ' . $username . ':' . $api_token
));
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
    'email' => $email_user,
    'domain' => $email_domain,
    'password' => $new_password
)));

// Execute the API request
$response = curl_exec($curl);
curl_close($curl);

if ($response) {
    $data = json_decode($response, true);
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    var_dump($data['status']); // Output the response
} else {
    echo "Error changing password";
}
?>




