<?php
	namespace WSBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	
	use AdminBundle\Entity\Faqmaster;


	class WSFAQsListController extends WSBaseController
	{
		/**
		*@Route("/ws/faqslist/{param}", defaults = {"param" = ""})
		*/

		public function faqslistAction($param)
		{
			try{
				$this->title = " FAQs list";
				$this->status = 200;
        		$this->message = true;
				$param = $this->requestAction($this->getRequest(), 0);
				$this->validateRule = array(
					array(
						'rule' => 'NOTNULL',
						'field' => array('language_id'), 	
						),
					);

					if($this->validateData($param)){
						$language_id = $param->language_id;

						$em = $this->getDoctrine()->getManager();

							if($language_id != '')
							{
								$faqs_list = $em->getRepository(Faqmaster::class)->findBy(
								[
									'language_id' => $language_id,
									'is_deleted' => 0
								]);	
							// }
							// else{
							// 	$faqs_list = $em->getRepository(Faqmaster::class)->findBy(
							// 		[
							// 		'is_deleted' => 0
							// 		]);	
							// }


							if(!empty($faqs_list)){
								foreach($faqs_list as $list)
								{
									$data [] = array(
										
										'faq_question' => $list->getFaq_question(),
										'faq_answer' => $list->getFaq_answer(),
										'language_id' => $list->getLanguage_id(),
										'main_faq_master_id' => $list->getMain_faq_master_id(),
										'faq_status' => $list->getFaq_status(),
									);
								$this->data = $data;
								$this->error = "SFD";
								}	
							}
						}else{
							$this->error = "NRF";
						}
					} else {
						$this->error = "PIM";
					}

			} catch (\Exeptiion $e){
				$this->error = "SFND";
				$this->status = 201;
				$this->message = false;
				$emptyObj = new Faqmaster();
				// $response = $emptyObj;
				$this->data = $emptyObj;	
						
			}		
			return $this->responseAction();
		}
	}
?>