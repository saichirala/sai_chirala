<?php
$file_name= "xml/Pages.xml";
if(file_exists($file_name))
{
	/* Open file for both reading and writng. 
	 * Place pointer at the beginning of the file.
	 */
	$handle = fopen($file_name, 'r+');

	if(!$handle)
	{	
		die("couldn't open file <i>$file_name</i>");
	}
	
	while(1)
	{
		//read line
		$line = fgets($handle);
		//if end of file reached then stop reading anymore
		if($line == null)break;
		
		//replace 
		if(preg_match("/<\/content>/", $line))
		{
			$new_line = str_replace("</content>", "<page src='pages/xyz.jpg'/></content>", $line);
		}
		else
		{
			//set file content to a string
			$str.= $line;
		}
	}
	
	//append new updated gpa to file content
	$str.= $new_line;
	
	//set pointer back to beginning
	rewind($handle);

	//delete everything in the file.
	ftruncate($handle, filesize($file_name));

	//write everything back to file with the updated gpa line
	fwrite($handle, $str);
	echo "success writing to file";
}
else
{
	echo "file <i>$file_name</i> doesn't exists";
}
fclose($handle);
?>