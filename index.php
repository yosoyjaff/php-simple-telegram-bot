<?php
$token = '';
$api = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);
function sendMessage($chatId, $response) {
    $url = $GLOBALS['api'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}
$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

$response = match ($message) {
    '/start' => '¡Hola! 👋🏼 Estoy aquí para ayudarte con tus compras 🛍️ ¿Necesitas encontrar algún producto en particular? 🤔 ¡No te preocupes! Simplemente pregúntame y te indicaré en qué pasillo puedes encontrarlo 🛒💡',
    'carne', 'queso', 'jamón' => 'El producto se encuentra en el pasillo 1.',
    'leche', 'yogurth', 'cereal' => 'El producto se encuentra en el pasillo 2.',
    'bebidas', 'jugos' => 'El producto se encuentra en el pasillo 3.',
    'pan', 'pasteles', 'tortas' => 'El producto se encuentra en el pasillo 4.',
    'detergente', 'lavaloza' => 'El producto se encuentra en el pasillo 5.',
    default => '😊 Por favor, ¡pregúntame sobre el producto que necesitas! 🛍️🤔 Yo te diré en qué pasillo puedes encontrarlo 🛒💡',
};
sendMessage($chatId, $response)
// set webhoot 
// delete <..>
// https://api.telegram.org/bot<token>/getUpdates/setwebhook?url=<you url >

?>

