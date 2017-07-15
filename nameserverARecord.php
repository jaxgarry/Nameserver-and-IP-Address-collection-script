<?php

        $domainList = file_get_contents("INSERT FILE WITH DOMAIN LIST");

        $domains = explode("\n", $domainList);


        foreach ($domains as $domain) {
                $domain = trim($domain);
                $records = dns_get_record($domain);
                $aRecord = "NA";
                $authNS = "NA";
                foreach ($records as $record) {
                        sleep(1);
                        if ($record["type"] == "A") {
                                $aRecord = $record['ip'];
                        }
                        if ($record["type"] == "NS"){
                                $nsRecord = $record['target'];
                        }

                }
                echo "$domain, $aRecord, $nsRecord \n";
        }


?>
