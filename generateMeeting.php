<?php 

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(array('error' => 'Invalid request.'));
   exit;
}

$baseUrl = "https://meet.google.com/lookup/";

function sanitizeName($name) {
   return str_replace(" ", "-", preg_replace("/[^A-Za-z0-9 ]/", '-', $name));
}

if (isset($_POST['text']) && str_replace(" ", "", $_POST['text']) !== '') {
   $meetingName = sanitizeName($_POST['text']);
} else {
   $names = ["Frannie","Lilith","Silvia","Kata","Deanna","Dallas","Koralle","Eddie","Carol-jean","Verine","Daveen","Prudi","Magdaia","Cam","Isobel","Talya","Jori","Lurleen","Linnea","Madelin","Winni","Jemie","Chrystal","Linnet","Daphene","Janice","Lynde","Dre","Josselyn","Christin","Tim","Aidan","Ollie","Scarlet","Jacquette","Shaylyn","Tory","Juliana","Lin","Inna","Darryl","Margalo","Nikolia","Cathrine","Maighdiln","Gilemette","Constantia","Korry","Dorthea","Janean","Gilemette","Bobby","Ryann","Vallie","Maia","Carleen","Dixie","Philly","Grete","Gwendolin","Corliss","Honoria","Teresa","Isobel","Corenda","Jayme","Eve","Mimi","Cybil","Loren","Fanchette","Hester","Felice","Vanessa","Ronnie","Norine","Bernardine","Marita","Adella","Dorelia","Nertie","Robbin","Wendy","Corabella","Barbra","Tiffy","Nadeen","Raf","Cass","Pearla","Aubrette","Danielle","Julissa","Alanna","Libbey","Cathleen","Mathilda","Florella","Ansley","Mirella","Lauretta","Leonora","Constancia","Victoria","Joeann","Shayla","Wendye","Hendrika","Chiquia","Dorrie","Minnie","Harriette","Mame","Nicolette","Robbie","Robinia","Suzann","Astrix","Ursulina","Grier","Wilhelmina","Madelaine","Maureen","Tessy","Jenny","Leann","Wilma","Bonnibelle","Dre","Veda","Moyna","Maye","Cyb","Orella","Flora","Gael","Kathi","Gill","Gisele","Allyson","Demetria","Jobie","Terra","Veriee","Kevyn","Roseanna","Danell","Luella","Alvira","Herminia","Genvieve","Veronika","Adorne","Delcina","Elisha","Krissie","Adria","Rosalinde","Winifred","Davita","Janessa","Lorry","Madel","Agatha","Cristabel","Rosene","Jaynell","Debee","Cass","Aurore","Nicky","Marjorie","Rosa","Ina","Charla","Ellissa","Dore","Evy","Stefa","Jessica","Kitti","Imogen","Maressa","Jaclin","Robinia","Merralee","Joy","Eba","Raychel","Annie","Hyacinth","Tandy","Wandis","Alis","Fanechka","Kimberley","Rosalind","Lilas","Thelma","Cristie"];
   $roomName = implode("-", array_rand(array_flip($names), 3));
   $meetingName = $roomName."-".rand(100, 999);
}

$url = $baseUrl.$meetingName;

$arr = ["response_type" => "in_channel",
   "blocks" => [
      [
         "type" => "section", 
         "text" => [
            "type" => "mrkdwn", 
            "text" => "Join a meeting: \n ".$url
         ], 
         "accessory" => [
               "type" => "button", 
               "text" => [
                  "type" => "plain_text", 
                  "text" => "Join now", 
                  "emoji" => true 
               ], 
               "value" => "join-meeting", 
               "url" => $url, 
               "action_id" => "button-action" 
            ] 
      ] 
   ]
]; 

echo json_encode($arr);

?>