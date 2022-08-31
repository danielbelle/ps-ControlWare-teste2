<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Teste2</title>
</head>

<body>
  <?php
  /**
   * O cURL retorna um json com os dados da API
   */
  $jsonResultado = '{
    "texto": [
        {
            "titulo": "Software",
            "descricao": "Soluções digitais especialmente desenhadas, auxiliamos a organização da operação de apuração e planejamento tributário, garantindo ganhos em competitividade e evitamos perdas financeiras."
        },
        {
            "titulo": "Serviços",
            "descricao": "Serviços que permitem às empresas agilidade na recuperação de dados com otimização de custos, num modelo de operação fiscal executado de forma transparente e que garante o compliance fiscal para o seu negócio."
        }
    ]
}';
  /**
   * texto que é retornado aleatório, nesta simulação a API manda os 2 textos mas o rand abaixo escolhe 1 aleatório 
   */
  $texto_recebido_aletatorio = rand(0, 1);

  /**
   * Solução do problema 2:
   */

  function utf8_strrev($str)
  {
    preg_match_all('/./us', $str, $ar);
    return join('', array_reverse($ar[0]));
  }

  function apresentarResultado($str)
  {
    print_r("Resposa 1-> O texto recebido foi o do : " . $str->titulo . ".<br> Descrição: " . $str->descricao);
    echo '<br>';
    echo '<br>';
    print_r("Resposta 2-> Pegando apenas a descrição do texto, temos :" . strlen($str->descricao) . " caracteres. mais " . strlen($str->titulo) . " do título.");
    echo '<br>';
    echo '<br>';
    print_r("Resposta 3-> Título: " . utf8_strrev($str->titulo) . "<br> Descrição: " . utf8_strrev($str->descricao) . " caracteres.");
  }


  $resultadoCurl = json_decode($jsonResultado);
  echo '<pre> O Texto recebido foi: ';
  print_r($resultadoCurl->texto[$texto_recebido_aletatorio]);
  echo '</pre>';


  if ($resultadoCurl->texto[$texto_recebido_aletatorio] == $resultadoCurl->texto[0]) {

    $txt_selecionado =  $resultadoCurl->texto[0];

    apresentarResultado($txt_selecionado);

  } elseif ($resultadoCurl->texto[$texto_recebido_aletatorio] == $resultadoCurl->texto[1]) {

    $txt_selecionado =  $resultadoCurl->texto[1];

    apresentarResultado($txt_selecionado);

  } else {
    echo 'erro';
  }



  ?>

  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</body>

</html>