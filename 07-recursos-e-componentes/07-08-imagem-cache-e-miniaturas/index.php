<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);


/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);

$thumb = new Source\Support\Thumb();

echo "<img src='{$thumb->make("images/2018/09/imagem.jpg", 300)}'/>";
echo "<img src='{$thumb->make("images/2018/09/imagem.jpg", 180, 180)}'/>";

// Exemplo de imagem que não existe para forçar um erro.
var_dump($thumb->make("image.jpg", 100));

echo "<img src='{$thumb->make("images/2018/09/imagem.png", 300)}'/>";
echo "<img src='{$thumb->make("images/2018/09/imagem.png", 180, 180)}'/>";

// Libera o cache das images.
$thumb->flush("images/2018/09/imagem.jpg");