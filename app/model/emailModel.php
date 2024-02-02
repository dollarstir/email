<?php
class emailModel
{

    public static function getEmailListByDOmain(): array
    {

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

        $domains = ['rsmineralslogisticssecuritiesstorage.online', 'firstskycreditunion.com', 'alaslogistics.online', 'harrytindall.online']; // Array of domains
        $emailsByDomain = []; // Initialize an array to store emails by domain

        if ($response) {
            $data = json_decode($response, true);

            // Loop through each domain to filter emails
            foreach ($domains as $specific_domain) {
                $filtered_emails = []; // Reset for each domain

                // Process and filter the email accounts for the current domain
                foreach ($data['data'] as $email_account) {
                    if (strpos($email_account['email'], '@' . $specific_domain) !== false) {
                        $filtered_emails[] = $email_account['email'];
                    }
                }

                // Store the filtered emails for the current domain
                $emailsByDomain[$specific_domain] = $filtered_emails;
            }

            // Output the filtered email accounts for all domains
            return ($emailsByDomain);
        } else {
            return [];
        }
    }


    public static function getEmailList(): array
    {
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

        $domains = ['rsmineralslogisticssecuritiesstorage.online', 'firstskycreditunion.com', 'alaslogistics.online', 'harrytindall.online']; // Array of domains
        $allEmails = []; // Initialize an array to store all emails

        if ($response) {
            $data = json_decode($response, true);

            // Process and filter the email accounts for specified domains
            foreach ($data['data'] as $email_account) {
                foreach ($domains as $specific_domain) {
                    if (strpos($email_account['email'], '@' . $specific_domain) !== false) {
                        $allEmails[] = $email_account['email'];
                        break; // Break the inner loop once a match is found
                    }
                }
            }

            // Output all filtered email accounts in one array
            return $allEmails;
        } else {
            return [];
        }
    }
}
