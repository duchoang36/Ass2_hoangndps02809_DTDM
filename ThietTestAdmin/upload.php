<? 

function db_connect1() 
{ 
     global $db_link1; 
     @$db_link1 = mysql_connect("host1.vietnix.vn","cornerco","7q7tkMZj06") or die("Connection Error! $php_errormsg"); 
     if ($db_link1) @mysql_select_db("cornerco_testadmin") or die ("Error Select Database!"); 
     return $db_link1; 
} 
//upload progress goes here 
db_connect1(); 
if($goSave)//your button name 
{ 
    $checkFile=$HTTP_POST_FILES['ufile']['type'][0]; // will be check your image file type 
    if($checkFile=="image/gif" || $checkFile=="image/pjpeg" || $checkFile=="image/x-png") 
    { 
        $dir= "images/".$HTTP_POST_FILES['ufile']['name'][0]; // your directory target 
        copy($HTTP_POST_FILES['ufile']['tmp_name'][0], $dir); // your files will be copy to images/ directory 
        $insert_img = @mysql_query("INSERT INTO images(image_name, image_type, image_size)  
        VALUES ('".$HTTP_POST_FILES['ufile']['name'][0]."', '".$HTTP_POST_FILES['ufile']['type'][0]."', '".$HTTP_POST_FILES['ufile']['size'][0]."')"); 
        echo "Successfully"; 
        echo "<br><br><a href='javascript:history.go(-1)'>CONTINUE</a>"; 
    } 
    else 
    { 
        echo "Files are not allowed. / Your Filed is empty"; 
        echo "<br><br><a href='javascript:history.go(-1)'>CONTINUE</a>"; 
    }      
} 
else 
{ 
    echo" 
    <form id='formID' action='' method='post' name='iMan' enctype='multipart/form-data'> 
    Browse Files : <br> 
    <input type='file' name='ufile[]' id='ufile[]' /><br><br> 
    <input type='submit' name='goSave' value='Save and Upload'> 
    </form>"; 
} 
         
?>