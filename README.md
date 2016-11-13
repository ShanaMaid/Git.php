# Git.php
you can use git by php throught this !


## Description
You can run git by php!Use 'exec' to archive!

## Requirements
You must have installed git!
If you use windows,you should set path!

## Example
```
	require_once("Git.php");

 	$git = new Git();// new Git("..")   new Git($path)
 	
 	$git->init();
 	$git->remote("add","origin","https://github.com/ShanaMaid/Git.php");
 	$git->pull("origin","master");
 	
 	
 	$git->add("-A");
 	$git->commit("-m","some msg");
 	$git->remote("rm","origin");
 	$git->push("origin","master");
 	$git->setPath($path);
 	

```
