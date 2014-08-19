<?php

//$xml = simplexml_load_file(SITE_PATH."/1.xml");
//
////$i=0;foreach ($xml->Папки->КодПапки as $v) { $mas[$i][kod]=$v->string; $i++;}
//
//echo '<pre>';
//print_r($xml->Worksheet->Table);
//echo '</pre>';

  $csv_lines  = file("1.csv");


foreach ($csv_lines as $k=>$v)
{
    $csv_lines[$k]=iconv('windows-1251', 'UTF-8', $v);

}

  if(is_array($csv_lines))
  {
      //������ csv
      $cnt = count($csv_lines);
      for($i = 0; $i < $cnt; $i++)
      {
          $line = $csv_lines[$i];
          $line = trim($line);
          //��������� �� ��, ��� ����� ���� �������� ������ ������ �������
          $first_char = true;
          //����� �������
          $col_num = 0;
          $length = strlen($line);
          for($b = 0; $b < $length; $b++)
          {
              //���������� $skip_char ���������� ������������ �� ������ ������
              if($skip_char != true)
              {
                  //���������� ������������/�� ������������ ������
                  ///print $line[$b];
                  $process = true;
                  //���������� ������ ��������� ������� �� ������� �������
                  if($first_char == true)
                  {
                      if($line[$b] == '"')
                      {
                          $terminator = '";';
                          $process = false;
                      }
                      else
                          $terminator = ';';
                      $first_char = false;
                  }

                  //������������� ������ �������, ��������� �� �������
                  if($line[$b] == '"')
                  {
                      $next_char = $line[$b + 1];
                      //��������� �������
                      if($next_char == '"')
                          $skip_char = true;
                      //������ ����� �������
                      elseif($next_char == ';')
                      {
                          if($terminator == '";')
                          {
                              $first_char = true;
                              $process = false;
                              $skip_char = true;
                          }
                      }
                  }

                  //���������� ������� ����� � �������
                  if($process == true)
                  {
                      if($line[$b] == ';')
                      {
                          if($terminator == ';')
                          {

                              $first_char = true;
                              $process = false;
                          }
                      }
                  }

                  if($process == true)
                      $column .= $line[$b];

                  if($b == ($length - 1))
                  {
                      $first_char = true;
                  }

                  if($first_char == true)
                  {

                      $values[$i][$col_num] = $column;
                      $column = '';
                      $col_num++;
                  }
              }
              else
                  $skip_char = false;
          }
      }
  }
//echo '<pre>';
//var_dump($values);
//echo '</pre>';
$sh=0;
foreach ($values as $k=>$v)
{
 //  print_r($v);echo '<br>';


    $en=1;
    if ($v[2]=='Нет')$en=2;

    $v[3]=str_replace(" ","",$v[3]);
   // echo $v[4].'<br>';





/////////////////////////

    $pid=97;

 if ($sh!=0)
 {
     // проверяем категории //

     //echo $v[5].'<br>';
     $temp=trim ('>',$v[5]);
     if ($temp[1]){

     }
     else{
    $d=$db->select('SELECT * from '.DB_PREFIX.'shop_cat

    where name="'.trim ($temp[0]).'"');

     if ($d){
      $pid=$d[0]['id'];
     }
     else{
         $db->select('insert  '.DB_PREFIX.'shop_cat
       set
       name="'.trim ($temp[0]).'"
       pid=0,
       en=1,
       url="'.NormalizeString ($temp[0]).'"
           ');
     }

     }


     $db->select('REPLACE  '.DB_PREFIX.'shop_produkt  SET
     id='.$v[0].',
     pid=97,
     img="'.$v[6].'",
     name="'.$v[1].'",
     url="'.$v[0].'",
     price="'.$v[3].'",
     f_en='.$en.',
     en=1,
     descr="'.str_smoll($v[4],100).'",
     descr_ful="'.$v[4].'"
     ');

}
    $sh++;

}

echo 'тоаров - '.$sh.' ok';

exit();