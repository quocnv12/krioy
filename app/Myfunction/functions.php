<?php 
function Replace_TiengViet($str) { 

     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/i", 'a', $str); 

     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/i", 'e', $str); 

     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/i", 'i', $str); 

     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/i", 'o', $str); 

     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/i", 'u', $str); 

     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/i", 'y', $str); 

     $str = preg_replace("/(đ)/i", 'd', $str); 

      

     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str); 

     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $str); 

     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $str); 

     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str); 

     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str); 

     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str); 

     $str = preg_replace("/(Đ)/", 'd', $str); 

     $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');

     $str = str_replace(" ", "-", str_replace("&*#39;","",$str)); 
     //rewriteURL 

     return $str; 

     }

     function Select_Function($data, $select=0)
     {
         foreach ($data as  $val) {
              $id = $val['id'];
              $name = $val['name'];
              if ($select != 0 && $id == $select) {
                    echo "<option value='$id' selected = 'true'>$name</option>";
              } else {
                    echo "<option value='$id'>$name</option>";                            
         }
        }
    }

    function _substr($str, $length, $minword = 3)
    {
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word)
    {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        if (strlen($word) > $minword && strlen($sub) >= $length)
        {
          break;
        }
     }
        return $sub . (($len < strlen($str)) ? '...' : '');
    }

    function cut($str, $len) {
    $str = trim($str);
    if (strlen($str) <= $len) return $str;
    $str = substr($str, 0, $len);
    if ($str != "") {
        if (!substr_count($str, " ")) return $str." ...";
        while (strlen($str) && ($str[strlen($str) - 1] != " ")) $str = substr($str, 0, -1);
        $str = substr($str, 0, -1)." ...";
    }
    return $str;
}

?>