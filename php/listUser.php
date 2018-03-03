<?php
require("pdo.php");

$tp=4;
if (isset($_POST["pag"])) $np=$_POST["pag"];	else $np=1;
$ini=($np-1)*$tp; // registo inicial a ser mostrado

$comando = $pdo->prepare("SELECT * FROM users ");
$comando->execute();
$num = $comando->rowCount();


$qp=$num/$tp+1;
$comando2 = $pdo->prepare("SELECT * FROM users LIMIT ".$ini.", ".$tp);
$comando2->execute();
$data = $comando2->fetchAll();

$output= '';

$output.='
<table class="mdl-data-table mdl-js-data-table ">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">ID</th>
      <th class="mdl-data-table__cell--non-numeric">Nome</th>
      <th class="mdl-data-table__cell--non-numeric">Password</th>
      <th class="mdl-data-table__cell--non-numeric">Opções</th>
    </tr>';

    if($num != 0 )
      foreach ($data as $data) {
        $output .='<tr>';
          $output .='<td class="mdl-data-table__cell--non-numeric">'.$data["id"].'</td>';
          $output .='<td class="mdl-data-table__cell--non-numeric">'.$data["name"].'</td>';
          $output .='<td class="mdl-data-table__cell--non-numeric">'.$data["password"].'</td>';
          $output .='
            <td class="mdl-data-table__cell--non-numeric">
              <button id="remove" data-code="'.$data["id"].'"class="mdl-color--red-600 mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
                <i class="material-icons" style="color: #fff;">delete</i>
              </button>
            </td>
          ';
        $output .='</tr>';
      }
    else {
        $output .='<tr>';
          $output .='<td colspan="4" style="text-align:center;" class="mdl-data-table__cell--non-numeric">Sem dados correntes.</td>';
        $output .='</tr>';
    }
$output.='
    </thead>
  <tbody>
';

for ($i=1; $i<$qp; $i++)
		 //$output.='<a class="" id="pagination" href="php/listUser.php?pag='.$i.'">'.$i.'</a>&nbsp&nbsp&nbsp';
     $output.='
       <button data-value="'.$i.'" style="font-size:14px; margin:10px;" id="pagination" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
        '.$i.'
       </button>
     ';
echo $output;


 ?>
