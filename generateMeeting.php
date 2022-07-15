<?php 

// https://jsontophp.com/
// mockaroo.com 
header('Content-Type: application/json; charset=utf-8');

$names = ["Frannie","Lilith","Silvia","Kata","Deanna","Dallas","Koralle","Eddie","Carol-jean","Verine","Daveen","Prudi","Magdaia","Cam","Isobel","Talya","Jori","Lurleen","Linnea","Madelin","Winni","Jemie","Chrystal","Linnet","Daphene","Janice","Lynde","Dre","Josselyn","Christin","Tim","Aidan","Ollie","Scarlet","Jacquette","Shaylyn","Tory","Juliana","Lin","Inna","Darryl","Margalo","Nikolia","Cathrine","Maighdiln","Gilemette","Constantia","Korry","Dorthea","Janean","Gilemette","Bobby","Ryann","Vallie","Maia","Carleen","Dixie","Philly","Grete","Gwendolin","Corliss","Honoria","Teresa","Isobel","Corenda","Jayme","Eve","Mimi","Cybil","Loren","Fanchette","Hester","Felice","Vanessa","Ronnie","Norine","Bernardine","Marita","Adella","Dorelia","Nertie","Robbin","Wendy","Corabella","Barbra","Tiffy","Nadeen","Raf","Cass","Pearla","Aubrette","Danielle","Julissa","Alanna","Libbey","Cathleen","Mathilda","Florella","Ansley","Mirella"];
$roomName = implode("-", array_rand(array_flip($names), 5));
 $arr = [
   "response_type" => "in_channel",
   "blocks" => [
         [
            "type" => "section", 
            "text" => [
               "type" => "mrkdwn", 
               "text" => "Join a meeting with the following link." 
            ], 
            "accessory" => [
                  "type" => "button", 
                  "text" => [
                     "type" => "plain_text", 
                     "text" => "Join now", 
                     "emoji" => true 
                  ], 
                  "value" => "join-meeting", 
                  "url" => "https://meet.google.com/lookup/".$roomName.time(), 
                  "action_id" => "button-action" 
               ] 
         ] 
      ] 
]; 
 
echo json_encode($arr);

?>