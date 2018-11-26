<?php
  if(isset($_POST['submit']))
  {
     $file=$_FILES['file'];

  	$fileName = $_FILES['file']['name'];
  	$fileTmpName=$_FILES['file']['tmp_name'];
  	$fileSize = $_FILES['file']['size'];
  	$filetype = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];

  	$fileExt = explode('.',$fileName);
  	$fileActualExt = strtolower(end($fileExt));
  	$allowed = array('png','jpg','jpeg');

  	if(in_array($fileActualExt,$allowed))
  	{
       if($fileError==0)
       {
         if ($fileSize<1000000) {
         	$fileNewName=uniqid('',true).'.'.$fileActualExt;
         	$fileDestination = 'imageUploaded/'.$fileNewName;
         	move_uploaded_file($fileTmpName, $fileDestination);
         	header("Location:main.php?successfully subbmited");

         }
         else
         {
         	echo"file size is too big";
         }
       }
       else
       {
       	echo"error occur during file uploading";
       }
  	}
  	else
  	{
  		echo " file type is not acceptable";
  	}

  }



?>

