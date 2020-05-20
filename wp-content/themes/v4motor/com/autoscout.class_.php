<?php
   class Autoscout{
   			
		private $_idClient = 'd171833817ba95270a8fd1460aed9ab0b216172b';
			
   		function Autoscout(){
   		}
		public function getIdClient(){
			return $this->_idClient;
		}
		public function getHtml($url){
				
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$html = curl_exec($ch);
			if (!$html) {
				$html= 'cURL error number:'.curl_errno($ch).'<br />cURL error:'.curl_error($ch);
			}
			curl_close($ch);
			return $html;
		}
		public function getListProduct($filterBy,$objPag,$typeProduct,$pag){
			$html= $this->getHtml('https://.com/manager/index.php?soO=asc&soB='.$filterBy.'&soL='.$objPag.'&p=list&sci='.$this->_idClient.'&se[bo_ty]='.$typeProduct.'&dgpge='.$pag);
			
			$dom = new DOMDocument();
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			
			return $xpath;
		}
		public function getListProductTxt($filterBy,$objPag,$ver,$pag){
			//$html= $this->getHtml('https://secure.cpcms.autoscout24.com/index.php?p=list&lit=soO=asc&soB='.$filterBy.'&soL='.$objPag.'&dgpge='.$pag.'&sci='.$this->_idClient.'&new_search=1&do=1&se[make]=0&se[ver]='.$ver.'&se[fuel]=0&se[ar_ca]=0&se[bo_ty]=0&se[po_f]=0&se[po_t]=0&se[ag_f]=0&se[ag_t]=0&se[km_f]=0&se[km_t]=0&se[pr_f]=0&se[pr_t]=0');
			$html= $this->getHtml('https://secure.cpcms.autoscout24.com/manager/index.php?p=list&lit=&soO=asc&soB='.$filterBy.'&soL='.$objPag.'&dgpge='.$pag.'&sci='.$this->_idClient.'&new_search=1&do=1&se[make]=0&se[ver]='.$ver);
			
			$dom = new DOMDocument();
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			
			return $xpath;
		}
		public function getListProductString($string){
			//echo '++++++++++url:'.'https://secure.cpcms.autoscout24.com/manager/index.php?soO=asc&'.$string.'p=list&sci='.$this->_idClient;
			$html= $this->getHtml('https://secure.cpcms.autoscout24.com/manager/index.php?soO=asc&'.$string.'p=list&sci='.$this->_idClient);
			
			$dom = new DOMDocument();
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			
			return $xpath;
		}
		public function getProduct($id){
			$html= $this->getHtml('https://secure.cpcms.autoscout24.com/manager/index.php?p=detail&a='.$id.'&sci='.$this->_idClient);
			
			$dom = new DOMDocument();
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			
			return $xpath;
		}
		public function getGallery($id){
			$html= $this->getHtml('https://secure.cpcms.autoscout24.com/manager/index.php?p=cargallery&a='.$id.'&sci='.$this->_idClient);
			
			$dom = new DOMDocument();
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			
			return $xpath;
		}
   }
?>