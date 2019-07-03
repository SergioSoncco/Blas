<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class ImagesController extends AppController
{
	var $table = "false";

	public function index(){
	//	$dir = new Folder('./webroot/asd', true, 0755);
	//	 $dir = new Folder(WWW_ROOT.'asd');
//		$dir = new Folder('src/perrito', true, 0755); 
		$dir = new Folder();
		$dir->chmod(WWW_ROOT.'img', 0755, true);
		 $files = $dir->find('.*\.*',true);

		 $this->set('images',$files);
	}

	public function delete($img){

		$file = new File(WWW_ROOT.'img'.DS.$img);
		if($file->delete()){
		$this->Flash->sucess(__('IA SE BORRO'));
		} 
		return 	$this->redirect(['action'=>'index']);
	}

	public function add(){
		if($this->request->is('post')){
			if(!is_null($this->request->getData('image'))){
				$filename=$this->request->getData('image');
				$ext=	substr(strtolower(strrchr($filename['name'],'.')),1);

				$this->Flash->success(__('The extension image is {0}.',$ext));
				$this->Flash->success(__('The size image is {0}.',$filename['size']));

				if(intval($filename['size'])>0 &&
					(intval($filename['size'])<=35000 && in_array($ext,['png','jpg','gif','svg']))){

						$dir = new Folder(WWW_ROOT.'img');
						$dir->chmod(WWW_ROOT.'img', 0755, true);
						if(move_uploaded_file($filename['tmp_name'],WWW_ROOT.'img'.DS.$filename['name'])){
							$this->Flash->success(__('The image has upload sucessfully.'));

						}else{
							$this->Flash->error(__('The image has not upload.'));							
						}
						return $this->redirect(['action'=>'index']);
					}else{
						$this->Flash->error(__('The size image is invalid.'));
					}
					}else{
					$this->Flash->error(__('The image is null.'));
					

			}
		}
	}
}


