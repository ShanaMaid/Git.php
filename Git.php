<?php

	/**
	* Git
	*/
	class Git 
	{
		protected $currentDir;
		protected $targetDir;

		public function __construct(...$arguments)
		{
			$this->currentDir = dirname(__FILE__);
			if (sizeof($arguments)==1) {
				$this->targetDir  = $arguments[0];
				return true;
			}
			elseif (sizeof($arguments)==0) {
				$this->targetDir  = dirname(__FILE__);
			}
			else{
				error_log("Error: unexpected more arguments");
				exit();
				return true;
			}
		}

		public function toTargetDir(){
			$this->runcmd("cd $this->targetDir",__FUNCTION__);
		}

		public function toCurrentDir(){
			$this->runcmd("cd $this->currentDir",__FUNCTION__);
		}

		public function setPath($dir){
			$this->targetDir = $dir;
		}

		public function init(){
			$this->run("git init",__FUNCTION__);
			
		}

		public function add($str){
			$this->run("git add ".$str,__FUNCTION__);
		}

		public function commit($op,$msg,$more=""){
			$this->run("git commit $op \"$msg\" $more",__FUNCTION__);
		}

		public function pull($op,$branch){
			$this->run("git pull $op $branch",__FUNCTION__);
		}

		public function push($op,$branch){
			$this->run("git push $op $branch",__FUNCTION__);
		}

		public function remote($op,$branch,$url=""){
			$this->run("git remote $op $branch $url",__FUNCTION__);
		}

		public function run($command,$funName){
			$this->toTargetDir();
			$this->runcmd($command,$funName);
			$this->toCurrentDir();
		}

		private function runcmd($command,$funName){
			exec($command,$out,$status);
			if ($status) {
				error_log("Error: error in ".$funName);
				exit();
			}
			return true;
		}

		
	}
	
?>