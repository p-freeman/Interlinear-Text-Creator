<!--variables from form

project_name
source_language
target_language
source_original
source_split
target_split
-->

<?php
function saveToFile($path, $filename, $content){
$fp = fopen("$path"."$filename", 'w+');
fwrite($fp, $content);
fclose($fp);
}

$project_name = $_POST['project_name'];
$source_language = $_POST['source_language'];
$target_language = $_POST['target_language'];
$song_name = $_POST['song_name'];
$interpret = $_POST['interpret'];
$music_video_url = $_POST['music_video_url'];
$explanation_text_url = $_POST['explanation_text_url'];
$source_original = $_POST['source_original'];
$source_split = $_POST['source_split'];
$target_split = $_POST['target_split'];

  //create folder with name
  $project_folder_name = strtolower(str_replace(" ", "_", $_POST['project_name']));
  mkdir("./$project_folder_name"); 
  
  include "phpqrcode/qrlib.php";

mkdir($project_folder_name."/images");
QRcode::png($music_video_url, $project_folder_name . '/images/qr_music_video_url.png');
QRcode::png($explanation_text_url, $project_folder_name . '/images/qr_explanation_text_url.png');
  
  //save source.txt-file
  saveToFile($project_folder_name."/", "source.txt", $source_original);
  echo("test<br>");

print_r($source_split);
//create and save the .int-file
//(containing one source-word and one target word per line)
$array_split_source_text = explode("\r\n", $source_split);
print_r($source_split);
$array_split_target_text = explode("\r\n", $target_split);
$complete_int_content = "";
for ($i=0; $i < count($array_split_source_text); $i++){
  echo "hello<br>";
  $complete_int_content .= $array_split_source_text[$i];
  $complete_int_content .= "\t";
$complete_int_content .= $array_split_target_text[$i];
if ($i != count($array_split_source_text)-1)
{
  $complete_int_content .= "\r\n";
}
  saveToFile($project_folder_name."/", $target_language.".int", $complete_int_content);
}


//TODO create interlinear .html-file

//split into paragraphs (end of paragraph is marked by \r\n\r\n)

/* $array_of_source_paragraphs = preg_split("/(\r\n){2,}/", $source_split);
print_r($array_of_source_paragraphs); */

echo "this isl \$source_split:";
echo "<pre>";
print_r($source_split);
echo "</pre>";

$pieces = explode("---", $source_split);
for($i=0; $i <count($pieces); $i++){
	echo("hello3") ;
	$paragraphs[$i] = explode("\r\n", trim($pieces[$i]));
	}
	echo "<pre>";
print_r($paragraphs);
echo "</pre>";

$pieces_target = explode("---", $target_split);
for($i=0; $i <count($pieces_target); $i++){
	echo("hello4");
	$paragraphs_target[$i] = explode("\r\n", trim($pieces_target[$i]));
	}
	
	echo "<pre>";
print_r($paragraphs_target);
echo "</pre>";


$intro_text_1_en_de = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_de = "How to use this Interlinear Text to learn German";

$intro_text_1_en_es = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_es= "How to use this Interlinear Text to learn Spanish";

$intro_text_1_de_en = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_en = "Wie man diesen Interlinearen Text benutzt um Englisch zu lernen";

$intro_text_1_de_es = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_es = "Wie man diesen Interlinearen Text benutzt um Spanisch zu lernen";

$intro_text_1_es_en= "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_en = "Cómo usar este texto inter-lineal para aprender inglés.";

$intro_text_1_es_de = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_de = "Cómo usar este texto inter-lineal para aprender alemán.";

switch($target_language){
	case "en":
	  switch ($source_language){
	     case "de":
	        $intro_text_1 = $intro_text_1_en_de;
            $intro_text_2 = $intro_text_2_en_de;
	     break;
	     case "es":
	        $intro_text_1 = $intro_text_1_en_es;
            $intro_text_2 = $intro_text_2_en_es;
	     break;
		}
	break;
	case "es":
	  switch ($source_language){
	     case "de":
	        $intro_text_1 = $intro_text_1_es_de;
            $intro_text_2 = $intro_text_2_es_de;
	     break;
	     case "en":
	        $intro_text_1 =  $intro_text_1_es_en;
            $intro_text_2 = $intro_text_2_es_en;
	     break;
		}
	break;
	case "de":
	switch ($source_language){
	     case "en":
	        $intro_text_1 = $intro_text_1_de_en;
            $intro_text_2 = $intro_text_2_de_en;
	     break;
	     case "es":
	        $intro_text_1 = $intro_text_1_de_es;
            $intro_text_2 = $intro_text_2_de_es;
	     break;
		}
	break;
}




$complete_html_content = "";

$complete_html_content .= '<html>
<head>
<title>'.$project_name.'</title>
<link rel="stylesheet" type="text/css" href="./css/main_text.css"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
  <div class="page_title">
  	<h1>
  	'.$interpret.': '.$song_name.'
      </h1>
  </div>
  <div class="intro">
  	<table>
			<tr>
				<td class="left">
					<div class="title">
			<b><u>'.$intro_text_1.'</u></b>
            </div>
			<div class="url">
			'.$music_video_url.'
			</div>
			<div class="qr_code">
				<img src="images/qr_music_video_url.png" height="100px" width="100px"/>
			</div>
		</div>
				</td>
				<td>
				<div class="title">
			<b><u>'.$intro_text_2.'</u></b>
			</div>
			<div class="url">
			'.$explanation_text_url.'
			</div>
			<div class="qr_code">
				<img src="images/qr_explanation_text_url.png" height="100px" width="100px"/>
			</div>
				</td>
			</tr>
			</table>
<hr>
  </div>
	
  <div class="content">';


/*  for ($j=0; $j<count($array_of_source_paragraphs); $j++){
    if (substr($array_of_source_paragraphs[$j], -6) == "[/img]"){
   $array_of_source_paragraphs_data[$j]["type"]="img";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-6);
    } elseif (substr($array_of_source_paragraphs[$j], -5) == "[/h1]"){
      $array_of_source_paragraphs_data[$j]["type"]="h1";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-5);
    } elseif (substr($array_of_source_paragraphs[$j], -5) == "[/h2]"){
      $array_of_source_paragraphs_data[$j]["type"]="h2";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-5);
    } elseif (substr($array_of_source_paragraphs[$j], -5) == "[/h3]"){
      $array_of_source_paragraphs_data[$j]["type"]="h3";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-5);
    } elseif (substr($array_of_source_paragraphs[$j], -4) == "[/p]"){
      $array_of_source_paragraphs_data[$j]["type"]="p";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-4);
    }
  }
  
  print_r($array_of_source_paragraphs_data); */
  
  echo "---";
  echo "<pre>";
  print_r($paragraphs[0]);
  echo "</pre>";
  echo "---";
  echo "<br>";
  echo "count \$paragraphs(0): " . count($paragraphs[0]);
  echo "<br>";
  echo "count \$paragraphs: " . count($paragraphs);
  echo "<br>";
  
  for ($j = 0; $j < count($paragraphs); $j++){
  	switch ($paragraphs[$j][0]){
  	   case "=h1=":
           echo "this is here";
           $complete_html_content .= "<div class=\"title\">";
          
           for ($k = 1; $k < count($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
         case "=h2=":
            $complete_html_content .= "<div class=\"subtitle_level_1\">";
          
           for ($k = 1; $k < count ($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
         case "=h3=":
           $complete_html_content .= "<div class=\"subtitle_level_2\">";
          
           for ($k = 1; $k < count ($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k][0]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k][0]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
          case "=p=":
           $complete_html_content .= "<div class=\"paragraph\">";
          
           for ($k = 1; $k < count ($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
         case "=br=":
            $complete_html_content .= "</br>";
            break;
            
          case "=brbr=":
            $complete_html_content .= "</br></br>";
            break;
            
          default:
          echo "here is the default";
          echo "<br>";
      }
      echo "does it go here?";
      echo "<br>";
  }
  
  $complete_html_content .= "</div></body></html>";
  
  /*
  $complete_html_content .= '
<div class="title">
  <div class="word_segment">
    <div class="source_word"></div>
    <div class="target_word"></div>
  </div>
</div>
<div class="text">
  <div class="word_segment">
    <div class="source_word"></div>
    <div class="target_word"></div>
  </div>';
  
$complete_html_content .= '</div>
</div>
</body>
</html>';
*/


saveToFile($project_folder_name."/", "int_". $target_language.".html", $complete_html_content);

mkdir($project_folder_name."/css");

copy("./css/main_text.css", $project_folder_name. "/css/main_text.css");

echo $complete_html_content;
echo "<pre>";
print_r($complete_html_content);
echo "</pre>";

echo '<a href="'. $project_folder_name. '/int_'. $target_language .'.html">Open Newly created HTML-file</a>';

?>